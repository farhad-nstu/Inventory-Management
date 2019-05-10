<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address', 'shop', 'photo', 'type', 'accountholder', 'accountnumber', 'bankname', 'branchname', 'city'
    ];
}
