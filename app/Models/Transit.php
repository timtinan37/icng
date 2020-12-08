<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    use UuidTrait;

    protected $fillable = [
    	'name',
    ];
}
