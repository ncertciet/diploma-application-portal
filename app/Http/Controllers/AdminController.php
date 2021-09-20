<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){
        // $application = DB::select('select * from applications');
        // return view('applications',['applications'=>$application]);
    }

}
