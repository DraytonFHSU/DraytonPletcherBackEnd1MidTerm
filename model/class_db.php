<?php
function get_classes()
{
    global $db;
    $query = 'SELECT * FROM classes ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_class_name($ID)
{
    if (!$ID) {
        return "All classes";
    }
    global $db;
    $query = 'SELECT * FROM classes WHERE ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();
    $class = $class['Class'];
    return $class;
}

function delete_class($ID)
{
    global $db;
    $query = 'DELETE FROM classes where ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class)
{
    global $db;
    $query = 'INSERT INTO classes ( Class ) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closeCursor();
}