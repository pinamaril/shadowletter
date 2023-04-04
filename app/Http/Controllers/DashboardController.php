<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class DashboardController extends Controller
{
		public function index() {
				return view('pages.dashboard', [
						'messages' => Message::where('to_username', auth()->user()->username)->orderBy('created_at', 'desc')->paginate(10)
				]);
		}
		
		public function destroy($id)
		{
				$message = Message::find($id);

				if(auth()->user()->username === $message->to_username) {
						$message->delete();
						
						return redirect()->back()->with('success', 'Message has been deleted!');
				}

				return redirect()->back()->with('errorr', 'Message failed to deleted!');
		}
}
