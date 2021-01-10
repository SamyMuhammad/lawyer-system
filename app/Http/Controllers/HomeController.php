<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Issue;
use App\Models\Client;
use App\Models\ExpertIssue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::count();
        $clientsCount = Client::count();
        $issuesCount = Issue::count();
        $expertIssuesCount = ExpertIssue::count();
        
        return view('dashboard', [
            'usersCount' => $usersCount,
            'clientsCount' => $clientsCount,
            'issuesCount' => $issuesCount,
            'expertIssuesCount' => $expertIssuesCount,
        ]);
    }
}
