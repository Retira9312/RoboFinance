<?php

namespace application\models;

class QuerySet
{

	public function probation()
	{
		$inquiry = "SELECT user.first_name,user.last_name,user.created_at
					FROM `user` WHERE DATEDIFF(CURDATE(), created_at) <= 90 ORDER BY user.last_name";
		return $inquiry;
	}

	public function dismissed()
	{
		 $inquiry = "SELECT user.first_name, user.last_name,dismission_reason.description,user_dismission.created_at
		 			FROM `user`,`user_dismission`,`dismission_reason`
		 			WHERE user.id = user_dismission.user_id AND DATEDIFF(CURDATE(), user_dismission.update_at)>0 AND user_dismission.reason_id = dismission_reason.id ORDER BY user.last_name";
		 return $inquiry;
	}

	public function lastHire()
	{
		$inquiry = "SELECT concat( u.last_name,' ',u.first_name) as fl, u.created_at, d.description
					FROM user_position up1
					LEFT JOIN user_position up2 on up2.department_id = up1.department_id AND up2.id > up1.id
					JOIN department d on up1.department_id=d.id
					JOIN user u on up1.user_id = u.id
					WHERE up2.user_id is NULL";
		return $inquiry;
	}
}
