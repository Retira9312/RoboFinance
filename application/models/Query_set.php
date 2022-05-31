<?php

namespace application\controllers;

class Query_set
{

	public function probation()
	{
		$inquiry = "SELECT user.first_name,user.last_name,user.created_at FROM `user` WHERE DATEDIFF(CURDATE(), created_at) <= 90 ORDER BY user.last_name";
		return $inquiry;
	}

	public function dismissed()
	{
		 $inquiry = "SELECT user.first_name, user.last_name,dismission_reason.description,user_dismission.created_at FROM `user`,`user_dismission`,`dismission_reason` WHERE user.id = user_dismission.user_id AND DATEDIFF(CURDATE(), user_dismission.update_at)>0 AND user_dismission.reason_id = dismission_reason.id ORDER BY user.last_name";
		 return $inquiry;

	}
	public function last_hire()
	{
		$inquiry = "SELECT   p.description, concat( u.last_name,' ',u.first_name) as fl, u.created_at FROM (SELECT up.department_id, d.description, max(up.user_id) as uid FROM user_position up left join department d on up.department_id=d.id group by up.department_id) p join user u on p.uid = u.id";
		return $inquiry;
	}
}
