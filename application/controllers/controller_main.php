<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{	
		$tasks = $this->model->getTasks();
		$this->view->generate('main_view.php', 'template_view.php', ['tasks' => $tasks]);
	}

	function action_add() 
	{

		$this->model->addTask($_POST['name'], $_POST['email'], $_POST['text']);
		$this->action_index();
	}
}