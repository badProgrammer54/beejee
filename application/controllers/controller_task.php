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
		$task = $this->model->getTask($_GET['data']);
		$this->view->generate('task_view.php', 'template_view.php', ['task' => $task]);
	}

	function action_done()
	{
		$task = $this->model->done($_GET['data']);
		header('Location: http://beejee/main');
	}

	function action_save()
	{
		if(isset($_COOKIE['user'])) {
			$this->model->save($_POST['id'], $_POST['name'], $_POST['email'], $_POST['text']);
			$task = $this->model->getTask($_POST['id']);
			$this->view->generate('task_view.php', 'template_view.php', ['task' => $task, 'success' => '1']);
		}
		else {
			$task = $this->model->getTask($_POST['id']);
			$this->view->generate('task_view.php', 'template_view.php', ['task' => $task, 'error' => '1']);
		}
	}
}