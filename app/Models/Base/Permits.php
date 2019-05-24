<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Permits extends Model
{
    protected $table = 'permits';

    protected $guarded = ['id'];
}
