<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Contracts\Activity;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';
    protected $guarded = ['id', 'created_at', 'updated_at'];

}
