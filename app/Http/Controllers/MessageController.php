<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class MessageController extends Controller
{
		public function index($username) {
			$user = User::where('username', $username)->first();

			if ($user) {
					return view('pages.message', [
							'username' => $username,
							'name' => $user->name
					]);
			}
			
			abort('404');
			
		}

		public function store(Request $request) {
				$user = User::where('username', $request->to_username)->first();

				if ($user) {
						$request->merge(array_map('trim', $request->all()));

						$validatedData = $request->validate([
								'to_username' => 'required',
								'text' => 'min:10|max:240|required'
						]);


						try {
								Message::create($validatedData);
						} catch (\Exception $e) {
								return redirect()->back()->with('error', 'Sorry, message failed to send');
						}

						return redirect()->back()->with('success', 'Message sent successfully!');
				}
				
				return redirect()->back()->with('error', 'Sorry, message failed to send');
		}
}
