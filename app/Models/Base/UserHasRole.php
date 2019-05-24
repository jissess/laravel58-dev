<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class UserHasRole extends Model
{
    protected $table = 'user_has_role';

    protected $guarded = ['id'];
}
