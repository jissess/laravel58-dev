<?php

namespace App\Object;

class LoginUser
{
    protected $user_code;
    protected $user_id;
    protected $user_name;
    protected $photo;
    protected $gender;
    protected $user_no;

    public function __construct($userId, $user_no, $user_code, $user_name, $photo, $gender)
    {
        $this->user_id = $userId;
        $this->user_no = $user_no;
        $this->user_code = $user_code;
        $this->user_name = $user_name;
        $this->photo = $photo;
        $this->gender = $gender;
    }

    public static function make(array $data)
    {
        return new self(
            $data['id'],
            $data['user_no'],
            $data['user_code'],
            $data['user_name'],
            $data['photo'] ?? '',
            $data['gender']
        );
    }

    public function __get($name)
    {
        return $this->{$name} ?? '';
    }
}