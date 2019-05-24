<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;

class SeederHelper
{
	public static function getSeedJson($file)
	{
		$path = storage_path("long/seeddata/{$file}.json");
		if (! file_exists($path)) {
			throw new \Exception("{$path} 文件不存在\n");
		}

		$data = json_decode(file_get_contents($path));

		if (empty($data->data) || ! is_array($data->data)) {
			throw new \Exception("{$path} json格式错误\n");
		}

		array_walk($data->data, function(&$row) {
			$row = (array) $row;
		});

		return $data->data;
	}

	public static function do(Model $model, array $data = [])
	{
		$table = $model->getTable();
		$data = $data ?: $data = self::getSeedJson($table);

		if ($model->count() > 0) {
			echo "{$table} 已存在数据 \n";
			return ;
		}

		if ($model->insert($data)) {
			echo "{$table} ok\n";
		} else {
			echo "{$table} err \n";
		}
	}
}