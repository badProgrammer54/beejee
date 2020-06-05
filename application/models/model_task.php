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
        $task = $smtp->fetch();

        return $task;
    }

    function done($id) {
        $db = parent::getDb();
        $sql = "UPDATE `tasks` SET `done` = '1' WHERE `id` = :id";
        $smtp = $db->prepare($sql);
        $smtp->execute([
            "id" => $id
        ]);
        $task = $smtp->fetch();
    }

    function save($id, $name, $email, $text) {
        $db = parent::getDb();
        // Отредактировали ли описание задачи
        $sql = "SELECT `text` FROM `tasks` WHERE `id` = :id";
        $smtp = $db->prepare($sql);
        $smtp->execute([
            "id" => $id
        ]);
        $old_text = $smtp->fetch(PDO::FETCH_ASSOC);
        $old_text = $old_text['text'];
        $is_edit = " ";

        if($old_text != $text) {
            $is_edit = ", `is_edit` = 1 ";
        }

        $sql = "UPDATE `tasks` SET `name` = :name, `email` = :email, `text` = :text $is_edit WHERE `id` = :id ";

        $smtp = $db->prepare($sql);
        $smtp->execute([
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "text" => $text,
        ]);

        $smtp->closeCursor();

    }
}