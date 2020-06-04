<?php

class Model_Main extends Model
{

    function __construct()
    {
    }

	function getTasks() {
        $db = parent::getDb();
        $sql = "SELECT `id`, `name`, `email`, `text` FROM `tasks`";
        $tasks = $db->query($sql);
        return $tasks;
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
        return "1";
    }
}