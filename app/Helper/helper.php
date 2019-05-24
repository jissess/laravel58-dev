<?php
/**
 * 获取用户信息
 * @return mixed
 */
function getUser()
{
    return \Cache::store('array')->get('user');
}

/**
 * 返回正确信息
 * @param array $data
 * @param string $msg
 * @return \Illuminate\Http\JsonResponse
 */
function responseSuccess($data = [], $msg = '')
{
    if ($data instanceof \Illuminate\Pagination\AbstractPaginator) {
        $data = [
            'list' => $data->items(),
            'page' => [
                'total' => (int)$data->total(),
                'line' => (int)$data->perPage(),
                'cur' => (int)$data->currentPage(),
            ],

        ];
    }
    $def = [
        'code' => 200,
        'status' => true,
        'data' => [],
        'msg' => $msg,
    ];

    $def['data'] = (object)array_merge($def['data'], $data);

    return response()->json($def);
}

/**
 * 返回错误信息
 * @param string $msg
 * @param int $code
 * @param array $data
 * @return \Illuminate\Http\JsonResponse
 */
function responseFail($msg = '',  $data = [], $code = 500)
{
    return response()->json([
        'code' => $code,
        'status' => false,
        'msg' => $msg,
        'data' => (object)$data,
    ]);
}

/**
 * 抛出自定义错误信息
 * @param $msg
 * @param int $code
 * @throws \App\Exceptions\CustomHttpException
 */
function panic($msg, $code = 500)
{
    throw new \App\Exceptions\CustomHttpException($msg, $code);
}

/**
 * 获取url中的
 * @return string
 */
function getUrlSchema()
{
    return (isset($_SERVER['HTTPS']) && 'on' == strtolower($_SERVER['HTTPS'])) ? 'https' : 'http';
}
