<?php

class Model_Task extends Model
{

	function getTask($id) {
        $db = parent::getDb();
        $sql = "SELECT `id`, `name`, `email`, `text` FROM `tasks` WHERE `id` = :id";
        $smtp = $db->prepare($sql);
        $smtp->execute([
            "id" => $id
        ]);
        $task = $smtp->fetch(PDO::FETCH_ASSOC);

        return $task;
    }
}