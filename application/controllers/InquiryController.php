<?php


namespace application\controllers;

use application\core\Controller;
use application\lib\Db;
use application\lib\Table;
use application\models\Query_set_new;


class InquiryController extends Controller{

	public function probationAction(){
		$db = new Db;
		$params = new Query_set;
		$data = $db->query($params->probation());
		$table = new Table;
		$temp = $table->getTable($data, 'Фамилия,Имя,Дата приема', 'last_name,first_name,created_at');
		$vars = ['probation' => $temp,];
		if (!empty($_POST)) {
			$this->view->location('/localhost');
		}
		$this->view->render('Испытательный срок', $vars);
	}

	public function dismissedAction(){
		$db = new Db;
		$params = new Query_set;
		$data = $db->query($params->dismissed());
		$table = new Table;
		$temp = $table->getTable($data, 'Фамилия,Имя,Дата увольнения,Причина увольнения', 'last_name,first_name,created_at,description');
		$vars = ['dismissed' => $temp,];
		if (!empty($_POST)) {
			$this->view->location('http://localhost');
		}
		$this->view->render('Уволенные', $vars);
	}


	public function last_hireAction(){
		$db = new Db;
		$params = new Query_set;
		$data = $db->query($params->last_hire());
		$table = new Table;
		$temp = $table->getTable($data, 'Фамилия Имя,Дата найма,Отдел', 'fl,created_at,description');
		debug($temp);
		$vars = ['last_hire' => $temp,];
		if (!empty($_POST)) {
			$this->view->location('/localhost');
		}
		$this->view->render('Последний найм', $vars);
	}



}