<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    protected $guarded = ['id'];
}
