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
        $polls = Poll::latest()->paginate(5);

        return view('dashboard', compact('polls'));
    }
}
