<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return Message::with('users')->get();
    }

    public function store(Request $request)
    {
        $users = Auth::users();

        $message = $users->messages()->create([
        'message' => $request->input('message')
    ]);
    // send event to listeners
    broadcast(new MessageSentEvent($message, $users))->toOthers();

    return [
        'messages' => $message,
        'users' => $users,
    ];
    }
}
