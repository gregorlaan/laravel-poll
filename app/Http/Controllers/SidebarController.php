<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function show()
    {
        $polls = $this->getAuthUserLatestPolls(5);
        
        return view('sidebar', compact('polls'));
    }

    public function getAuthUserLatestPolls($limit = true)
    {
        $user = auth()->user();
        $session = request()->session();

        if(!$user || session('sidebar-hide-latest-polls'))
            return [];

        $polls = Poll::where('user_id', $user->id)->latest()->take($limit)->get();

        return $polls;
    }

    // TODO: Fix displaying 'Add Your First Poll' when polls should be hidden but user has posts
    public function toggleAuthUserLatestPolls()
    {
        $key = 'sidebar-hide-latest-polls';
        $session = request()->session();

        if($session->has($key))
            $session->forget($key);
        else
            $session->put($key, true);

        return back();
    }
}
