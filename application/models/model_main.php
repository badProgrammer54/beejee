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
            $sort = "ORDER BY `text` ASC"; 
            break;
            case '4':
            $sort = "ORDER BY `name` DESC"; 
            break;
            case '5':
            $sort = "ORDER BY `email` DESC"; 
            break;
            case '6':
            $sort = "ORDER BY `text` DESC"; 
            break;    
            default:
                $sort = '';
                break;
        }

        // Получения элементов для страницы
        $start = $page != 1 ? ($page - 1) * 3 : 0;
        $number = 3;
        $sql = "SELECT `id`, `name`, `email`, `text` FROM `tasks` $sort LIMIT $start, $number";
        $tasks = $db->query($sql);

        $result = [
            "tasks" => $tasks,
            "page_count" => $page_count,
        ];

        return $result;
    }

    function addTask($name, $email, $text) {
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