<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
					        'firstname',
					        'age',
					        'sex',
							'phone_number',	
							'emailid',
						];
}
