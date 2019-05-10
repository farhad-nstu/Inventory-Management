<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{ 
    //protected $table = 'attendence';
    protected $fillable = [
        'id', 'employee_id', 'attendence_date','attendence_year', 'attendence', 'edit_date','attendence_month',
    ];
}
