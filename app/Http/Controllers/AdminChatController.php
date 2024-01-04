<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminChatController extends Controller
{
    public function index()
{
    $admins = Admin::all();
    $users = User::all();
    $chats = Chat::all();
    return view('adminchat.index', compact('chats','users','admins'));
}
public function getChatMessages($senderId)
    {
        // Retrieve chat messages from the database based on $senderId
        $chatMessages = Chat::where('sender_id', $senderId)->get();

        return view('partials.chat_messages', ['chatMessages' => $chatMessages]);
    }

    public function sendChat(Request $request)
    {
        $request->validate([
            'id_receiver' => 'required|exists:users,id',
            'message' => 'required',
        ]);
    
        Chat::create([
            'id_sender' => Auth::id(), // Set sender_id to the authenticated user's ID
            'id_receiver' => $request->receiver_id,
            'message' => $request->message,
            'date' => now(),
        ]);
    
        return redirect()->back();
    }

}
