<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use UuidTrait;

    protected $fillable = [
    	'name',
    	'tariff'
    ];
}
