<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function store(Request $request) {
				$validatedData = $request->validate([
						'name' => 'required|max:50',
						'username' => 'required|min:4|max:20|unique:users',
						'password' => 'required|min:8|max:255'
				]);

				$validatedData['password'] = Hash::make($validatedData['password']);

				try {
						User::create($validatedData);
				} catch (\Exception $e) {
						return redirect()->back()->with('error', 'Registration was failed!');
				}

				return redirect('/login')->with('success', 'Registration was successful!');;
	}
}
