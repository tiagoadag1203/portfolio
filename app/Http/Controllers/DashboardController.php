<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.dashboard', compact('messages'));
    }
}
