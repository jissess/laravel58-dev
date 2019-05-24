<?php

namespace App\Http\Controllers\Base;

use App\Repositories\Base\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class LoginController extends Controller
{
    protected $userRepository;

    const ARRU = ['code', 'pwd'];

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $userArr = $request->only(self::ARRU);

        if (count($userArr) != count(self::ARRU) || empty($userArr['code']) || empty($userArr['pwd'])) {
            return responseFail('请填入正确的用户名和密码');
        }
        $checkRes = $this->userRepository->check($userArr);

        $token = $this->jwtToken($checkRes);

        return responseSuccess(['token' => $token]);

    }

    /**
     * 生成token
     * @param $checkRes
     * @return mixed
     */
    private function jwtToken($checkRes)
    {
        //生成参数配置
        $times = time();
        $customClaims = [
//            'iss' => env('JWT_ISS', "pack.com"),
//            'iat' => $times,
//            'nbf'=>$this->timestamp,
//            'jti'=>$this->timestamp,
            'exp' => $times + env('JWT_EXP', 86400),
            'sub' => [
                "id" => $checkRes->id,
            ]
        ];

        $playLoad = JWTFactory::customClaims($customClaims)->make();

        return JWTAuth::encode($playLoad)->get();
    }

    /**
     * 退出账号
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return responseSuccess([]);
    }
}
