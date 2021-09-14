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

         }else if($application->step === '4'){
            return redirect(route('application.form.step5'));

         }else if($application->step === '5'){
            return redirect(route('application.form.step6'));

         }else if($application->step === '6'){
            return redirect(route('application.thankyou'));
            //return view('applicant.application.thankyou')
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
				return redirect(route('application.form.step1'))->with('failed',"Operation failed");
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
				return redirect(route('application.form.step2'))->with('failed',"Operation failed");
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
				return redirect(route('application.form.step3'))->with('failed',"Operation failed");
			}
		}


    }

    public function step4(Request $request)
    {
        $reg_id = Auth::user()->reg_id;

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();
        $application_id = $application->application_id;

        // dd($application);

        $rules = [
            'disability' =>'required',
            'disability_content' => 'required_if:disability,Yes',
            'disability_certificate' => 'required_if:disability,Yes|max:5120|mimes:doc,docx,jpg,jpeg,png,pdf',
            'category' => 'required',
            'category_certificate' => 'required_if:category,SC,ST,OBC,EWS|max:5120|mimes:doc,docx,jpg,jpeg,png,pdf',
            'candidate_sign' => 'required|max:5120|mimes:jpg,jpeg,png',
            'candidate_photo' => 'required|max:5120|mimes:jpg,jpeg,png',
            'document' => 'required|max:5120|mimes:doc,docx,pdf',
            'forwarding_letter' => 'max:5120|mimes:doc,docx,pdf,jpg,jpeg,png',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('application.form.step4'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
            $application->fill( $data );

            $application->step = '4';

            $path_dis_certificate = '';
            if($request->hasFile('disability_certificate')){
                $fileValue     = $request->disability_certificate;
                $getFileExt   = $fileValue->getClientOriginalExtension();
                $custom_file_name = $application_id.'-disability-certificate'.'.'.$getFileExt;
                $path_dis_certificate = $request->file('disability_certificate')->storeAs($application_id, $custom_file_name);
                // dd($path_dis_certificate);
            }

            $path_cat_certificate = '';
            if($request->hasFile('category_certificate')){
                $fileValue     = $request->disability_certificate;
                $getFileExt   = $fileValue->getClientOriginalExtension();
                $custom_file_name = $application_id.'-category-certificate'.'.'.$getFileExt;
                $path_cat_certificate = $request->file('category_certificate')->storeAs($application_id, $custom_file_name);
            }

            $path_sign = '';
            if($request->hasFile('candidate_sign')){
                $fileValue     = $request->candidate_sign;
                $getFileExt   = $fileValue->getClientOriginalExtension();
                $custom_file_name = $application_id.'-signature'.'.'.$getFileExt;
                $path_sign = $request->file('candidate_sign')->storeAs($application_id, $custom_file_name);
            }

            $path_photo = '';
            if($request->hasFile('candidate_photo')){
                $fileValue     = $request->candidate_photo;
                $getFileExt   = $fileValue->getClientOriginalExtension();
                $custom_file_name = $application_id.'-photo'.'.'.$getFileExt;
                $path_photo = $request->file('candidate_photo')->storeAs($application_id, $custom_file_name);
            }

            $path_doc = '';
            if($request->hasFile('document')){
                $fileValue     = $request->document;
                $getFileExt   = $fileValue->getClientOriginalExtension();
                $custom_file_name = $application_id.'-document'.'.'.$getFileExt;
                $path_doc = $request->file('document')->storeAs($application_id, $custom_file_name);
            }

            $path_f_letter = '';
            if($request->hasFile('forwarding_letter')){
                $fileValue     = $request->forwarding_letter;
                $getFileExt   = $fileValue->getClientOriginalExtension();
                $custom_file_name = $application_id.'-forwarding_letter'.'.'.$getFileExt;
                $path_f_letter = $request->file('forwarding_letter')->storeAs($application_id, $custom_file_name);
            }

            $application->disability_certificate = $path_dis_certificate;
            $application->category_certificate = $path_cat_certificate;
            $application->candidate_sign = $path_sign;
            $application->candidate_photo = $path_photo;
            $application->document = $path_doc;
            $application->forwarding_letter = $path_f_letter;
            

                switch($request->input('action')) {
                    case 'save':
                        // Save model
                        // dd($application);
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Step 4 is saved successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
				        return redirect(route('application.form.step5'))->with('status',"Step 4 is saved successfully");
                        break;
                }


			}
			catch(Exception $e){
				return redirect(route('application.form.step4'))->with('failed',"Operation failed");
			}
		}


    }


    public function step5(Request $request)
    {
        $reg_id = Auth::user()->reg_id;

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();
        $application_id = $application->application_id;

        // dd($application);

        $rules = [
            'ref_name1' =>'',
            'ref_add1' =>'',
            'ref_pin1' =>'',
            'ref_phone1' =>'',
            'ref_mobile1' =>'',
            'ref_email1' =>'',
            'ref_name2' =>'',
            'ref_add2' =>'',
            'ref_pin2' =>'',
            'ref_phone2' =>'',
            'ref_mobile2' =>'',
            'ref_email2' =>'',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('application.form.step5'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
            // dd($data);
			try{
            $application->fill( $data );

            // dd($application);

            $application->step = '5';

                switch($request->input('action')) {
                    case 'save':
                        // Save model
                        // dd($application);
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Step 5 is saved successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
                        // return view('applicant.application.form-step6')->with($application);
				        //return view('applicant.application.form-step6')->with('application', $application)->with('status',"Step 5 is saved successfully");
                        return redirect(route('application.form.step6'))->with('status',"Step 5 is saved successfully");
                        break;
                }


			}
			catch(Exception $e){
				return redirect(route('application.form.step5'))->with('failed',"Operation failed");
			}
		}


    }

       
    public function step6(Request $request)
    {
        $reg_id = Auth::user()->reg_id;

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();
        $application_id = $application->application_id;

        // dd($application);

        $rules = [
            'agree1' =>'required',
            'agree2' =>'required',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('application.form.thankyou'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
            $application->fill( $data );

            $application->step = '6';
            $application->status = 'completed';
            $application->submit_date = date('d-m-Y');

                switch($request->input('action')) {
                    case 'save':
                        // Save model
                        // dd($application);
                        $application->save();
				        return redirect(route('application.thankyou'))->with('status',"Application Submited successfully");
                        break;
                }

 
			}
			catch(Exception $e){
				return redirect(route('application.form.thankyou'))->with('failed',"Operation failed");
			}
		}


    }


    public function formedit(Request $request)
    {
        $reg_id = Auth::user()->reg_id;

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();
        $application_id = $application->application_id;
         $rules = [
            //  step 1
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

            //  step 2
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
            
            //  step 3
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

            //  step 4
            'disability' =>'required',
            'disability_content' => 'required_if:disability,Yes',
            'disability_certificate' => 'max:5120|mimes:doc,docx,jpg,jpeg,png,pdf',
            'category' => 'required',
            'category_certificate' => 'max:5120|mimes:doc,docx,jpg,jpeg,png,pdf',
            'candidate_sign' => 'max:5120|mimes:jpg,jpeg,png',
            'candidate_photo' => 'max:5120|mimes:jpg,jpeg,png',
            'document' => 'max:5120|mimes:doc,docx,pdf',
            'forwarding_letter' => 'max:5120|mimes:doc,docx,pdf,jpg,jpeg,png',

            //  step 5
            'ref_name1' =>'',
            'ref_add1' =>'',
            'ref_pin1' =>'',
            'ref_phone1' =>'',
            'ref_mobile1' =>'',
            'ref_email1' =>'',
            'ref_name2' =>'',
            'ref_add2' =>'',
            'ref_pin2' =>'',
            'ref_phone2' =>'',
            'ref_mobile2' =>'',
            'ref_email2' =>'',
		];

        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect(route('application.form.formedit'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
            // dd($data);
			try{
            $application->fill( $data );
            
            
            
            if ($_FILES['disability_certificate']['size'] == 0){
                //For empty result
            }
            else{    
                $path_dis_certificate = '';
                if($request->hasFile('disability_certificate')){
                    $fileValue     = $request->disability_certificate;
                    $getFileExt   = $fileValue->getClientOriginalExtension();
                    $custom_file_name = $application_id.'-disability-certificate'.'.'.$getFileExt;
                    $path_dis_certificate = $request->file('disability_certificate')->storeAs($application_id, $custom_file_name);
                }
            }

            if ($_FILES['category_certificate']['size'] == 0){
                //For empty result
            }
            else{
                $path_cat_certificate = '';
                if($request->hasFile('category_certificate')){
                    $fileValue     = $request->disability_certificate;
                    $getFileExt   = $fileValue->getClientOriginalExtension();
                    $custom_file_name = $application_id.'-category-certificate'.'.'.$getFileExt;
                    $path_cat_certificate = $request->file('category_certificate')->storeAs($application_id, $custom_file_name);
                }
            }

            if ($_FILES['candidate_sign']['size'] == 0){
                //For empty result
            }
            else{
                $path_sign = '';
                if($request->hasFile('candidate_sign')){
                    $fileValue     = $request->candidate_sign;
                    $getFileExt   = $fileValue->getClientOriginalExtension();
                    $custom_file_name = $application_id.'-signature'.'.'.$getFileExt;
                    $path_sign = $request->file('candidate_sign')->storeAs($application_id, $custom_file_name);
                }
            }

            if ($_FILES['candidate_photo']['size'] == 0){
                //For empty result
            }
            else{
                $path_photo = '';
                if($request->hasFile('candidate_photo')){
                    $fileValue     = $request->candidate_photo;
                    $getFileExt   = $fileValue->getClientOriginalExtension();
                    $custom_file_name = $application_id.'-photo'.'.'.$getFileExt;
                    $path_photo = $request->file('candidate_photo')->storeAs($application_id, $custom_file_name);
                }
            }

            if ($_FILES['document']['size'] == 0){
                //For empty result
            }
            else{
                $path_doc = '';
                if($request->hasFile('document')){
                    $fileValue     = $request->document;
                    $getFileExt   = $fileValue->getClientOriginalExtension();
                    $custom_file_name = $application_id.'-document'.'.'.$getFileExt;
                    $path_doc = $request->file('document')->storeAs($application_id, $custom_file_name);
                }
            }    


            if ($_FILES['forwarding_letter']['size'] == 0){
                //For empty result
            }
            else{
                $path_f_letter = '';
                if($request->hasFile('forwarding_letter')){
                    $fileValue     = $request->forwarding_letter;
                    $getFileExt   = $fileValue->getClientOriginalExtension();
                    $custom_file_name = $application_id.'-forwarding_letter'.'.'.$getFileExt;
                    $path_f_letter = $request->file('forwarding_letter')->storeAs($application_id, $custom_file_name);
                }
            }



       
            
            if ($_FILES['disability_certificate']['size'] == 0){
                //For empty result
            }
            else{
                $application->disability_certificate = $path_dis_certificate;
            }
            
            if ($_FILES['category_certificate']['size'] == 0){
                //For empty result
            }
            else{
                $application->category_certificate = $path_cat_certificate;
            }
            
            if ($_FILES['candidate_sign']['size'] == 0){
                //For empty result
            }
            else{
                $application->candidate_sign = $path_sign;
            }

            if ($_FILES['candidate_photo']['size'] == 0){
                //For empty result
            }
            else{
                $application->candidate_photo = $path_photo;
            }
            
            if ($_FILES['document']['size'] == 0){
                //For empty result
            }
            else{
                $application->document = $path_doc;
            }

            if ($_FILES['forwarding_letter']['size'] == 0){
                //For empty result
            }
            else{
                $application->forwarding_letter = $path_f_letter;
            }

            // dd($application);

            // $application->step = '5';

                switch($request->input('action')) {
                    case 'save':
                        // Save model
                        // dd($application);
                        $application->save();
				        return redirect(route('applicant.dashboard'))->with('status',"Details updated successfully");
                        break;

                    case 'save-continue':
                        // Preview model
                        $application->save();
                        // return view('applicant.application.form-step6')->with($application);
				        return redirect(route('application.form.step6'))->with('status',"Details updated successfully, Please Check all details before submit");
                        break;
                }


			}
			catch(Exception $e){
				return redirect(route('application.form.formedit'))->with('failed',"Operation failed");
			}
		}


    }


    public function downloadPdf()
    {
        $reg_id = Auth::user()->reg_id;

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();

        // share data to view
        view()->share('applicant.application.receipt',$application);
        $pdf = PDF::loadView('applicant.application.receipt', ['application' => $application]);
        return $pdf->download('receipt.pdf');


    }

    public function PdfApplications()
    {
        $reg_id = Auth::user()->reg_id;

        /** @var Application $application */
        $application = Application::query()->where('reg_id', $reg_id)->first();

        // share data to view
        view()->share('applicant.application.export-application',$application);
        $pdf = PDF::loadView('applicant.application.export-application', ['application' => $application]);
        return $pdf->download('export-application.pdf');
    }


}
