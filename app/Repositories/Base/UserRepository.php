<?php

namespace App\Repositories\Base;

use App\Exceptions\CustomHttpException;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Contracts\RepositoryInterface;
use App\Models\Base\User;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\Base;
 */
class UserRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 用户登录
     * @param $input
     * @return mixed
     */
    public function check($input)
    {
        $findRes = $this->model
            ->where(['user_code' => $input['code']])
            ->where('status', '<>', User::STATUS_DEL)->first();
        //用户信息查询
        if (!$findRes) {
            panic('用户不存在');
        }
        //检查密码信息
        if (!Hash::check($input['pwd'], $findRes->password)) {
            panic('用户名或密码错误');
        }

        return $findRes;

    }

}
