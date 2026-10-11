<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $data = [
            'totalUsers' => User::count(),
            'totalEmployees' => 50, 
            'totalDepartments' => 5, 
            'user' => auth()->user(),
        ];

        return view('dashboard', $data);
    }
}