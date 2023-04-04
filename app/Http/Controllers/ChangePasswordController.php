<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
		public function changePassword(Request $request)
		{
				$request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'password' => ['required', 'min:8'],
        ]);

        Auth::user()->update(['password' => Hash::make($request->password)]);

        return redirect('/change-password')->with('success', 'Password has been changed!');
		}
}
