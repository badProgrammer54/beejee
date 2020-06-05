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
		header('Location: http://beejee/main');
	}

	function action_sort()
	{
		switch ($_GET['data']) {
			case 'name':
				if ($_COOKIE['sort'] === '1') {
					setcookie('sort', 4, time() + 3600, '/');
				}
				else {
					setcookie('sort', 1, time() + 3600, '/');
				}
				break;
			case 'email':
					if ($_COOKIE['sort'] === '2') {
						setcookie('sort', 5, time() + 3600, '/');
					}
					else {
						setcookie('sort', 2, time() + 3600, '/');
					}
				break;
			case 'text':
					if ($_COOKIE['sort'] === '3') {
						setcookie('sort', 6, time() + 3600, '/');
					}
					else {
						setcookie('sort', 3, time() + 3600, '/');
					}
				break;
			case 'none':
				setcookie('sort', $_GET['data'], time() - 3600, '/');
				break;
			
			default:
				setcookie('sort', $_GET['data'], time() - 3600, '/');
				break;
		};
		
		header('Location: http://beejee/main');
	}

	function action_page()
	{
		$result = $this->model->getTasks($_GET['data']);
		$this->view->generate('main_view.php', 'template_view.php', ['tasks' => $result['tasks'], 'page_count' => $result['page_count'], 'page' => $_GET['data']]);
	}
}