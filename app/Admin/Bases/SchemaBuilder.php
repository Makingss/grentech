<?php
namespace App\Admin\Bases;
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/2
 * Time: 16:28
 */
class SchemaBuilder
{
	public function getTableColumns($table = null)
	{
		$getTableArrbs = [];
		$getTables = \Illuminate\Support\Facades\DB::select('show full columns from ' . $table);
		foreach ($getTables as $key => $getTable) {
			if (is_object($getTable)) {
				$getTable = (array)$getTable;
				$getTableArrbs[$getTable['Field']] = $getTable['Comment'];
			} else {
				$getTableArrbs[] = $getTable;
			}
		}
		return $getTableArrbs;
	}

	public function getColumnsDefault($table = null)
	{
		$getTableArrbs = [];
		$getTables = \Illuminate\Support\Facades\DB::select('show full columns from ' . $table);
		foreach ($getTables as $key => $getTable) {
			if (is_object($getTable)) {
				$getTable = (array)$getTable;
				$getTableArrbs[$getTable['Field']] = $getTable['Type'];
			} else {
				$getTableArrbs[] = $getTable;
			}
		}
		return $getTableArrbs;
	}
}