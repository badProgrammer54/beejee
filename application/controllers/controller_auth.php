<?php

class Controller_Auth extends Controller
{
	function __construct()
	{
		$this->model = new Model_Auth();
		$this->view = new View();
	}

	function action_index()
	{	
		$this->view->generate('auth_view.php', 'template_view.php');
	}

	function action_sign() {
		$response = $this->model->signIn($_POST['login'], $_POST['password']);

		if ($response === '1') {
			header('Location: http://beejee/main');
		}
		else {
			$this->view->generate('auth_view.php', 'template_view.php', ['error_code' => $response]);
		}

	}

	function action_exit() {
		$this->model->exit();
		header('Location: http://beejee/main');
	}

}