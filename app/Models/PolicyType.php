<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class PolicyType extends Model
{
	use UuidTrait;

    protected $fillable = [
    	'name',
    	'unique_code'
    ];
    protected $casts = [
    	'id' => 'string'
    ];
}
