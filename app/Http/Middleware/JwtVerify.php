<?php

namespace App\Http\Middleware;

use App\Models\Base\User;
use Closure, Cache;
use App\Object\LoginUser;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $token = JWTAuth::parseToken();
            //解析获取jwt
            $userInfo = $token->getPayload()->get('sub');

            //查询用户是否存在，不存在，则剔除此用户
            $userRes = User::where(['id' => $userInfo->id])
                ->where('status', '<>', User::STATUS_DEL)->first();

            if (!$userRes) {
                panic('用户信息出错,请重新登录', 401);
            }
            //写入用户信息
            $loginUser = LoginUser::make($userRes->toArray());

            Cache::store('array')->put('user', $loginUser, 1);

        } catch (TokenExpiredException $e) {
            panic('登录信息过期:' . $e->getMessage(), 401);
        } catch (TokenInvalidException $e) {
            panic('登录无效:' . $e->getMessage(), 401);
        } catch (JWTException $e) {
            panic('缺少信息:' . $e->getMessage(), 401);
        } catch (\Exception $e) {
            panic($e->getMessage(), 401);
        }

        return $next($request);
    }
}
