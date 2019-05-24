<?php

namespace App\Exceptions;

use Exception;

class CustomHttpException extends Exception
{
    /**
     * 报告异常
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * 转换异常为 HTTP 响应
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return responseFail($this->getMessage(),[],$this->getCode());
    }
}