<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;

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
    public function index(Request $request)
    {

        
        $user = FacadesAuth::user();
    
        // dd($user);
        if ($user->type === 'admin') {

            return redirect(route('admin.dashboard'));

        } else if ($user->type === 'rie') {

            return redirect(route('stydy-centre.dashboard'));

        } else if ($user->type === 'user') {

            return redirect(route('applicant.dashboard'));

        }else{
            return redirect(route('login'));
        }



        
    }
}
