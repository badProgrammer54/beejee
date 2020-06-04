<?php

class Controller_Task extends Controller
{
	function __construct()
	{
		$this->model = new Model_Task();
		$this->view = new View();
	}

	function action_index()
	{	
		$this->view->generate('task_view.php', 'template_view.php');
	}

	function action_edit()
	{
		
		$task = $this->model->getTask($_GET['id']);
		$this->view->generate('task_view.php', 'template_view.php', ['task' => $task]);
	}
}