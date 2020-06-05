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
		$result = $this->model->getTasks();
		$this->view->generate('main_view.php', 'template_view.php', ['tasks' => $result['tasks'], 'page_count' => $result['page_count'], 'page' => 1]);
	}

	function action_add() 
	{
		
		$this->model->addTask($_POST['name'], $_POST['email'], $_POST['text']);
		$result = $this->model->getTasks();
		$this->view->generate('main_view.php', 'template_view.php', ['tasks' => $result['tasks'], 'page_count' => $result['page_count'], 'page' => 1, 'success' => 1]);
	}

	function action_sort()
	{
		$this->model->sort($_GET['data']);
		header('Location: http://beejee/main');
	}

	function action_page()
	{
		$result = $this->model->getTasks($_GET['data']);
		$this->view->generate('main_view.php', 'template_view.php', ['tasks' => $result['tasks'], 'page_count' => $result['page_count'], 'page' => $_GET['data']]);
	}
}