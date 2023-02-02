<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;
use application\lib\Table;
use application\models\QuerySet;

class InquiryController extends Controller
{

	public function probationAction()
	{
	    $db = new DB();
		$params = new QuerySet();
		$data = $db->query($params->probation());
		$table = new Table();
		$temp = $table->getTable($data, 'Фамилия,Имя,Дата приема', 'last_name,first_name,created_at');
		$vars = ['probation' => $temp,];

		if (!empty($_POST)) {
			$this->view->location('http://localhost');
		}
		$this->view->render('Испытательный срок', $vars);
	}

	public function dismissedAction()
	{
		if (!empty($_POST)) {
			$this->view->location('/');
		}
		$db = new DB();
		$params = new QuerySet();
		$data = $db->query($params->dismissed());
		$table = new Table();
		$temp = $table->getTable($data, 'Фамилия,Имя,Дата увольнения,Причина увольнения', 'last_name,first_name,created_at,description');
		$vars = ['dismissed' => $temp,];
		$this->view->render('Уволенные', $vars);
	}


	public function lastHireAction()
	{
		$db = new DB();
		$params = new QuerySet();
		$data = $db->query($params->lastHire());
		$table = new Table();
		$temp = $table->getTable($data, 'Фамилия Имя,Дата найма,Отдел', 'fl,created_at,description');
		$vars = ['lastHire' => $temp,];
		if (!empty($_POST)) {
			$this->view->location('http://localhost');
		}
		$this->view->render('Последний найм', $vars);
	}
}