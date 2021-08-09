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


    public function step2(Request $request)
    {
        $reg_id = Auth::user()->reg_id;

        $application = DB::table('applications')->where('reg_id', $reg_id)->first();

        $rules = [
            'eq_exam_x'=> 'required',
            'eq_board_x'=> 'required',
            'eq_year_x'=> 'required',
            'eq_marks_x'=> 'required',
            'eq_subject_x'=> 'required',
            'eq_exam_xii'=> 'required',
            'eq_board_xii'=> 'required',
            'eq_year_xii'=> 'required',
            'eq_marks_xii'=> 'required',
            'eq_subject_xii'=> 'required',
            'eq_exam_grad'=> 'required',
            'eq_board_grad'=> 'required',
            'eq_year_grad'=> 'required',
            'eq_marks_grad'=> 'required',
            'eq_subject_grad'=> 'required',
            'eq_exam_pgrad'=> ' ',
            'eq_board_pgrad'=> ' ',
            'eq_year_pgrad'=> ' ',
            'eq_marks_pgrad'=> ' ',
            'eq_subject_pgrad'=> ' ',
            'eq_exam_oth1'=> ' ',
            'eq_board_oth1'=> ' ',
            'eq_year_oth1'=> ' ',
            'eq_marks_oth1'=> ' ',
            'eq_subject_oth1'=> ' ',
            'eq_exam_oth2'=> ' ',
            'eq_board_oth2'=> ' ',
            'eq_year_oth2'=> ' ',
            'eq_marks_oth2'=> ' ',
            'eq_subject_oth2'=> ' ',
            'eq_exam_oth3'=> ' ',
            'eq_board_oth3'=> ' ',
            'eq_year_oth3'=> ' ',
            'eq_marks_oth3'=> ' ',
            'eq_subject_oth3'=> ' ',
            'pq_degree'=> 'required',
            'pq_board'=> 'required',
            'pq_year'=> 'required',
            'pq_marks'=> 'required',
            'pq_subject'=> 'required',
            'pq_degree1'=> ' ',
            'pq_board1'=> ' ',
            'pq_year1'=> ' ',
            'pq_marks1'=> ' ',
            'pq_subject1'=> ' ',
            'pq_degree2'=> ' ',
            'pq_board2'=> ' ',
            'pq_year2'=> ' ',
            'pq_marks2'=> ' ',
            'pq_subject2'=> ' ',
            'pq_degree3'=> ' ',
            'pq_board3'=> ' ',
            'pq_year3'=> ' ',
            'pq_marks3'=> ' ',
            'pq_subject3'=> ' ',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('applicantion.form.step2'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
            $application->eq_exam_x = $data['eq_exam_x'];
            $application->eq_year_x= $data['eq_year_x'];
            $application->eq_marks_x= $data['eq_marks_x'];
            $application->eq_subject_x= $data['eq_subject_x'];
            $application->eq_exam_xii= $data['eq_exam_xii'];
            $application->eq_board_xii= $data['eq_board_xii'];
            $application->eq_year_xii= $data['eq_year_xii'];
            $application->eq_marks_xii= $data['eq_marks_xii'];
            $application->eq_subject_xii= $data['eq_subject_xii'];
            $application->eq_exam_grad= $data['eq_exam_grad'];
            $application->eq_board_grad= $data['eq_board_grad'];
            $application->eq_year_grad= $data['eq_year_grad'];
            $application->eq_marks_grad= $data['eq_marks_grad'];
            $application->eq_subject_grad= $data['eq_subject_grad'];
            $application->eq_exam_pgrad= $data['eq_exam_pgrad'];
            $application->eq_board_pgrad= $data['eq_board_pgrad'];
            $application->eq_year_pgrad= $data['eq_year_pgrad'];
            $application->eq_marks_pgrad= $data['eq_marks_pgrad'];
            $application->eq_subject_pgrad= $data['eq_subject_pgrad'];
            $application->eq_exam_oth1= $data['eq_exam_oth1'];
            $application->eq_board_oth1= $data['eq_board_oth1'];
            $application->eq_year_oth1= $data['eq_year_oth1'];
            $application->eq_marks_oth1= $data['eq_marks_oth1'];
            $application->eq_subject_oth1= $data['eq_subject_oth1'];
            $application->eq_exam_oth2= $data['eq_exam_oth2'];
            $application->eq_board_oth2= $data['eq_board_oth2'];
            $application->eq_year_oth2= $data['eq_year_oth2'];
            $application->eq_marks_oth2= $data['eq_marks_oth2'];
            $application->eq_subject_oth2= $data['eq_subject_oth2'];
            $application->eq_exam_oth3= $data['eq_exam_oth3'];
            $application->eq_board_oth3= $data['eq_board_oth3'];
            $application->eq_year_oth3= $data['eq_year_oth3'];
            $application->eq_marks_oth3= $data['eq_marks_oth3'];
            $application->eq_subject_oth3= $data['eq_subject_oth3'];
            $application->pq_degree= $data['pq_degree'];
            $application->pq_board= $data['pq_board'];
            $application->pq_year= $data['pq_year'];
            $application->pq_marks= $data['pq_marks'];
            $application->pq_subject= $data['pq_subject'];
            $application->pq_degree= $data['pq_degree'];
            $application->pq_board1= $data['pq_board1'];
            $application->pq_year1= $data['pq_year1'];
            $application->pq_marks1= $data['pq_marks1'];
            $application->pq_subject1= $data['pq_subject1'];
            $application->pq_degree2= $data['pq_degree2'];
            $application->pq_board2= $data['pq_board2'];
            $application->pq_year2= $data['pq_year2'];
            $application->pq_marks= $data['pq_marks'];
            $application->pq_subject2= $data['pq_subject2'];
            $application->pq_degree3= $data['pq_degree3'];
            $application->pq_board3= $data['pq_board3'];
            $application->pq_year3= $data['pq_year3'];
            $application->pq_marks3= $data['pq_marks3'];
            $application->pq_subject3= $data['pq_subject3'];
            $application->step = '2';
                
                switch($request->input('action')) {
                    case 'save':
                        // Save model
                        // dd($application);
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Save successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
				        return redirect(route('applicantion.form.step3'))->with('status',"Save successfully");
                        break;
                }


			}
			catch(Exception $e){
				return redirect(route('applicantion.form.step2'))->with('failed',"Operation failed");
			}
		}


    }

}