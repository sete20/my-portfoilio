<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    // public $table = 'contacts';
public $fillable  = ['name','subject','email','message'];
    // protected $fillable = ['last_name','first_name','email','message'];

}
