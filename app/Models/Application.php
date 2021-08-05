<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable =[
        // 'reg_id',
        // 'application_id',
        // 'step',
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
        'status',
    ];
}
