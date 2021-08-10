<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'gender',
        'dob',
        'nationality',
        'sc_state',
        'study_centre',
        'p_address',
        'p_city',
        'p_state',
        'p_zip',
        'p_telephone',
        'p_mobile',
        'p_email',
        'occupation',
        'o_address',
        'o_city',
        'o_state',
        'o_zip',
        'eq_exam_x',
        'eq_board_x',
        'eq_year_x',
        'eq_marks_x',
        'eq_subject_x',
        'eq_exam_xii',
        'eq_board_xii',
        'eq_year_xii',
        'eq_marks_xii',
        'eq_subject_xii',
        'eq_exam_grad',
        'eq_board_grad',
        'eq_year_grad',
        'eq_marks_grad',
        'eq_subject_grad',
        'eq_exam_pgrad',
        'eq_board_pgrad',
        'eq_year_pgrad',
        'eq_marks_pgrad',
        'eq_subject_pgrad',
        'eq_exam_oth1',
        'eq_board_oth1',
        'eq_year_oth1',
        'eq_marks_oth1',
        'eq_subject_oth1',
        'eq_exam_oth2',
        'eq_board_oth2',
        'eq_year_oth2',
        'eq_marks_oth2',
        'eq_subject_oth2',
        'eq_exam_oth3',
        'eq_board_oth3',
        'eq_year_oth3',
        'eq_marks_oth3',
        'eq_subject_oth3',
        'pq_degree',
        'pq_board',
        'pq_year',
        'pq_marks',
        'pq_subject',
        'pq_degree1',
        'pq_board1',
        'pq_year1'.
        'pq_marks1',
        'pq_subject1',
        'pq_degree2',
        'pq_board2',
        'pq_year2',
        'pq_marks2',
        'pq_subject2',
        'pq_degree3',
        'pq_board3',
        'pq_year3',
        'pq_marks3',
        'pq_subject3',
        'work_exp_name',
        'work_exp_position',
        'work_exp_date_from',
        'work_exp_date_to',
        'work_exp_duty',
        'work_exp_name1',
        'work_exp_position1',
        'work_exp_date_from1',
        'work_exp_date_to1',
        'work_exp_duty1',
        'work_exp_name2',
        'work_exp_position2',
        'work_exp_date_from2',
        'work_exp_date_to2',
        'work_exp_duty2',
        'work_exp_name3',
        'work_exp_position3',
        'work_exp_date_from3',
        'work_exp_date_to3',
        'work_exp_duty3',
        'course',
        'course_institute',
        'course_year',
        'course_duration',
        'course1',
        'course_institute1',
        'course_year1',
        'course_duration1',
        'course2',
        'course_institute2',
        'course_year2',
        'course_duration2',
        'course3',
        'course_institute3',
        'course_year3',
        'course_duration3',
        'status',
    ];
}
