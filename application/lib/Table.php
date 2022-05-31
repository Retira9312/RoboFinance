<?php

namespace application\lib;

class Table
{
	public function getTable($data, $tab, $line)
	{
		$t_table = '';
		$table = '<table class="table">';
		$arr_t = explode(',', $tab);
		foreach ($arr_t as $word)
		{
    		$word = trim($word);
    		$t_table = $t_table.'<th>'.$word.'</th>';
    	}
		$table.='<tr>'.$t_table.'</tr> ';//формируем шапку

		$arr = explode(',', $line);
		while ($res = $data->fetch())
		{
			$table_t='';
			foreach ($arr as $word_t)
			{
				$wodr_t = trim($word_t);
				$table_t = $table_t.'<td>'.$res[$word_t].'</td>';
			}
			$table.='<tr>'.$table_t.'</tr>';//пошагово заполняем таблицу
			unset($table_t);//чищаем переменную, чтобы таблица не задваивалась
		}
		$table.='</table>';
		return $table;
	}
}