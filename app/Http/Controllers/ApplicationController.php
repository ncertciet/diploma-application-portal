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

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reg_id = Auth::user()->reg_id;
//        dd($reg_id);
        $application = DB::table('applications')->where('reg_id', $reg_id)->first();
//        dd($application);

        if(empty($application)){
            return view('applicant.application.form-step1');
        }

        if($application->step === ''){
            return redirect(route('applicantion.form.step1'));
        }

        else if ($application->step === '1'){
            return redirect(route('applicantion.form.step2'));
        }else{

        }


    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = [
			'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'sc_state' => 'required',
            'study_centre' => 'required',
            'p_address' => 'required',
            'p_city' => 'required',
            'p_state' => 'required',
            'p_zip' => 'required|digits:6',
            'p_telephone'=> '',
            'p_mobile' => 'required|digits:10',
            'p_email' => 'required',
            'occupation' => 'required',
            'o_address' => 'required',
            'o_city' => 'required',
            'o_state' => 'required',
            'o_zip' => 'required|digits:6',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('applicantion.form.step1'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$application = new Application;
                $application->name = $data['name'];
                $application->gender = $data['gender'];
				$application->dob = $data['dob'];
                $application->nationality = $data['nationality'];
                $application->sc_state = $data['sc_state'];
                $application->study_centre = $data['study_centre'];
                $application->p_address = $data['p_address'];
                $application->p_city = $data['p_city'];
                $application->p_state = $data['p_state'];
                $application->p_zip = $data['p_zip'];
                $application->p_telephone = $data['p_telephone'];
                $application->p_mobile = $data['p_mobile'];
                $application->p_email = $data['p_email'];
                $application->occupation = $data['occupation'];
                $application->o_address = $data['o_address'];
                $application->o_city = $data['o_city'];
                $application->o_state = $data['o_state'];
                $application->o_zip = $data['o_zip'];
                $application->step = '1';
                $application->application_id = rand(0, 999999).date('dmy');
                $application->reg_id = Auth::user()->reg_id;


                switch ($request->input('action')) {
                    case 'save':
                        // Save model
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Save successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
				        return redirect(route('applicantion.form.step2'))->with('status',"Save successfully");
                        break;
                }


			}
			catch(Exception $e){
				return redirect(route('applicantion.form.step1'))->with('failed',"Operation failed");
			}
		}


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }


//     public function step1(Request $request)
//     {
//         $data = $request->validate([
//             'name' => 'required',
//             'gender' => 'required',
//             'dob' => 'required',
//             'nationality' => 'required',
//             'sc_state' => 'required',
//             'study_centre' => 'required',
//             'p_address' => 'required',
//             'p_city' => 'required',
//             'p_state' => 'required',
//             'p_zip' => 'required|digits:6',
//             'p_telephone'=> '',
//             'p_mobile' => 'required|digits:10',
//             'p_email' => 'required',
//             'occupation' => 'required',
//             'o_address' => 'required',
//             'o_city' => 'required',
//             'o_state' => 'required',
//             'o_zip' => 'required|digits:6',
//         ]);

//         dd($data);

//         $application = new Application;
//         $application->step = '1';
//         $application->application_id = rand(0, 999999).date('dmy');
//         $application->reg_id = Auth::user()->reg_id;



//         $application->saveOrFail();
//         return redirect(route('applicant.dashboard'));
//     }
}
