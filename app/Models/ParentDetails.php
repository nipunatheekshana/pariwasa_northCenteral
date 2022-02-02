<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentDetails extends Model
{
    use HasFactory;
    protected $table = 'parents';

    protected $fillable = [
        'child_id',
        'mothers_name',
        'mothers_name_initial',
        'mothers_DOB',
        'mothers_tp_no',
        'mothers_job',
        'mothers_religion',
        'mothers_address',
        'mothers_education_qulifications',
        'fathers_name',
        'fathers_name_initial',
        'fathers_DOB',
        'fathers_tp_no',
        'fathers_job',
        'fathers_address',
    ];
}
