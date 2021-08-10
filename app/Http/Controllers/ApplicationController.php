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
            return redirect(route('application.form.step1'));
        }

        else if ($application->step === '1'){
            return redirect(route('application.form.step2'));

        }else if($application->step === '2'){
            return redirect(route('application.form.step3'));
            
        }else if($application->step === '3'){
        return redirect(route('application.form.step4'));
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
				$application = new Application($data);
                $application->step = '1';
                $application->application_id = rand(0, 999999).date('dmy');
                $application->reg_id = Auth::user()->reg_id;


                switch ($request->input('action')) {
                    case 'save':
                        // Save model
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Step 1 is saved successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
				        return redirect(route('application.form.step2'))->with('status',"Step 1 is saved successfully");
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

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();

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
            'eq_exam_pgrad'=> 'required',
            'eq_board_pgrad'=> 'required',
            'eq_year_pgrad'=> 'required',
            'eq_marks_pgrad'=> 'required',
            'eq_subject_pgrad'=> 'required',
            'eq_exam_oth1'=> '',
            'eq_board_oth1'=> '',
            'eq_year_oth1'=> 'nullable|digits:4',
            'eq_marks_oth1'=> '',
            'eq_subject_oth1'=> '',
            'eq_exam_oth2'=> '',
            'eq_board_oth2'=> '',
            'eq_year_oth2'=> '',
            'eq_marks_oth2'=> '',
            'eq_subject_oth2'=> '',
            'eq_exam_oth3'=> '',
            'eq_board_oth3'=> '',
            'eq_year_oth3'=> '',
            'eq_marks_oth3'=> '',
            'eq_subject_oth3'=> ' ',
            'pq_degree'=> 'required',
            'pq_board'=> 'required',
            'pq_year'=> 'required',
            'pq_marks'=> 'required',
            'pq_subject'=> 'required',
            'pq_degree1'=> '',
            'pq_board1'=> '',
            'pq_year1'=> '',
            'pq_marks1'=> '',
            'pq_subject1'=> '',
            'pq_degree2'=> '',
            'pq_board2'=> '',
            'pq_year2'=> '',
            'pq_marks2'=> '',
            'pq_subject2'=> '',
            'pq_degree3'=> '',
            'pq_board3'=> '',
            'pq_year3'=> '',
            'pq_marks3'=> '',
            'pq_subject3'=> '',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('application.form.step2'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
            $application->fill( $data );
            $application->step = '2';

                switch($request->input('action')) {
                    case 'save':
                        // Save model
                        // dd($application);
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Step 2 is saved successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
				        return redirect(route('application.form.step3'))->with('status',"Step 2 is saved successfully");
                        break;
                }


			}
			catch(Exception $e){
				return redirect(route('applicantion.form.step2'))->with('failed',"Operation failed");
			}
		}


    }


    public function step3(Request $request)
    {
        $reg_id = Auth::user()->reg_id;

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();

        $rules = [
            'work_exp_name'=> 'required',
            'work_exp_position'=> 'required',
            'work_exp_date_from'=> 'required',
            'work_exp_date_to'=> 'required',
            'work_exp_duty'=> 'required',
            'work_exp_name1'=> '',
            'work_exp_position1'=> '',
            'work_exp_date_from1'=> '',
            'work_exp_date_to1'=> '',
            'work_exp_duty1'=> '',
            'work_exp_name2'=> '',
            'work_exp_position2'=> '',
            'work_exp_date_from2'=> '',
            'work_exp_date_to2'=> '',
            'work_exp_duty2'=> '',
            'work_exp_name3'=> '',
            'work_exp_position3'=> '',
            'work_exp_date_from3'=> '',
            'work_exp_date_to3'=> '',
            'work_exp_duty3'=> '',
            'course'=> 'required',
            'course_institute'=> 'required',
            'course_year'=> 'required',
            'course_duration'=> 'required',
            'course1'=> '',
            'course_institute1'=> '',
            'course_year1'=> '',
            'course_duration1'=> '',
            'course2'=> '',
            'course_institute2'=> '',
            'course_year2'=> '',
            'course_duration2'=> '',
            'course3'=> '',
            'course_institute3'=> '',
            'course_year3'=> '',
            'course_duration3'=> '',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('application.form.step3'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
            $application->fill( $data );
            $application->step = '3';

                switch($request->input('action')) {
                    case 'save':
                        // Save model
                        // dd($application);
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Step 3 is saved successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
				        return redirect(route('application.form.step4'))->with('status',"Step 3 is saved successfully");
                        break;
                }


			}
			catch(Exception $e){
				return redirect(route('applicantion.form.step3'))->with('failed',"Operation failed");
			}
		}


    }

}
