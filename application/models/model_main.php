<?php

class Model_Main extends Model
{

	function getTasks($page = 1) {
        $db = parent::getDb();

        // Получение кол-ва страниц
        $sql = "SELECT COUNT(`id`) FROM `tasks`";
        $page_count = $db->query($sql);
        $page_count = $page_count->fetch();
        $page_count = ceil($page_count['COUNT(`id`)']/ 3);

        // Подключение сортировки
        $sort = '';
        switch ($_COOKIE['sort']) {
            case '1':
            $sort = "ORDER BY `name` ASC"; 
            break;
            case '2':
            $sort = "ORDER BY `email` ASC"; 
            break;
            case '3':
            $sort = "ORDER BY `done` ASC"; 
            break;
            case '4':
            $sort = "ORDER BY `name` DESC"; 
            break;
            case '5':
            $sort = "ORDER BY `email` DESC"; 
            break;
            case '6':
            $sort = "ORDER BY `done` DESC"; 
            break;    
            default:
                $sort = '';
                break;
        }

        // Получения элементов для страницы
        $start = $page != 1 ? ($page - 1) * 3 : 0;
        $number = 3;
        $sql = "SELECT `id`, `name`, `email`, `text`, `done`, `is_edit` FROM `tasks` $sort LIMIT $start, $number";
        $smtp = $db->prepare($sql);
        $smtp->execute();
        $tasks = $smtp->fetchAll(PDO::FETCH_ASSOC);

        $result = [
            "tasks" => $tasks,
            "page_count" => $page_count,
        ];

        return $result;
    }

    function sort($sort) {
        
        switch ($sort) {
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
			case 'done':
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
    }

    function addTask($name, $email, $text) {
        $text = htmlspecialchars($text);
        $db = parent::getDb();
        $sql = "INSERT INTO `tasks` (`name`, `email`, `text`) VALUES (:name, :email, :text)";
        $smtp = $db->prepare($sql);
        $smtp->execute([
            "name" => $name,
            "email" => $email,
            "text" => $text,
        ]);
        $smtp->closeCursor();
        return "1";
    }


}