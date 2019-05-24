<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Models\Base;
 */
class User extends Model implements Transformable
{
    use TransformableTrait;

    CONST STATUS_ONE = 1;
    CONST STATUS_BAN = 2;
    CONST STATUS_DEL = -1;

    protected $table = 'users';

    protected $guarded = ['id'];

}
