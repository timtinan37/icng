<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
	use UuidTrait;

    protected $fillable = [
		'name',
		'address',
		'phone_number',
		'fax_number',
		'email',
    ];

    protected $casts = [
    	'id' => 'string'
    ];
}
