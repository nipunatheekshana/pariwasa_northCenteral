<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'grade',
        'school_name',
        'skills',
        'aesthetics',
        'extra_curiculars',
        'school_subjects',
        'school_address',
        'diploma_contactNum',
        'diploma_subjects',
        'diploma_higherEducation',
        'diploma_address',
        'uni_contact_num',
        'uni_subjects',
        'uni_address',
        'probation_officers_followUp',

    ];
}
