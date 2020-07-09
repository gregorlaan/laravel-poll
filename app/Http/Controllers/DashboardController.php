<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $polls = Poll::where('user_id', $user->id)->paginate(5);

        return view('dashboard', compact('polls'));
    }
}
