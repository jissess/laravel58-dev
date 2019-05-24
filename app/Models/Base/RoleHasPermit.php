<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermit extends Model
{
    protected $table = 'role_has_permit';

    protected $guarded = ['id'];
}
