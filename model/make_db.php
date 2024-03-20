<?php
function get_makes()
{
    global $db;
    $query = 'SELECT * FROM makes ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_make_name($ID)
{
    if (!$ID) {
        return "All makes";
    }
    global $db;
    $query = 'SELECT * FROM makes WHERE ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $make = $make['make'];
    return $make;
}

function delete_make($ID)
{
    global $db;
    $query = 'DELETE FROM makes where ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make)
{
    global $db;
    $query = 'INSERT INTO makes ( Make ) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}