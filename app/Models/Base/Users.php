<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $guarded = ['id'];
}
