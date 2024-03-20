<?php
function get_types()
{
    global $db;
    $query = 'SELECT * FROM types ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_type_name($ID)
{
    if (!$ID) {
        return "All types";
    }
    global $db;
    $query = 'SELECT * FROM types WHERE ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();
    $type = $type['Type'];
    return $type;
}

function delete_type($ID)
{
    global $db;
    $query = 'DELETE FROM types where ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type)
{
    global $db;
    $query = 'INSERT INTO types ( Type ) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}