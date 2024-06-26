<?php
function get_autos($classID, $makeID, $typeID, $sortBy) {
    global $db;
    $query = 'SELECT V.vehicleID, V.year, v.model, v.price, C.Class, M.Make, T.Type From vehicles V
    LEFT JOIN classes C ON V.class_id = C.ID
    LEFT JOIN makes M ON V.make_id = M.ID
    LEFT JOIN types T ON V.type_id = T.ID';

    if ($classID) {
        $query .= ' WHERE V.class_id = :ID ';           
    } else if ($makeID) {
        $query .= ' WHERE V.make_id = :ID '; 
    } else if ($typeID) {
        $query .= ' WHERE V.type_id = :ID '; 
    }
    if($sortBy == 'V.price' || $sortBy == 'V.year')
    $query .= ' ORDER BY ' . $sortBy . ' Desc'; 
    else
    $query .= ' ORDER BY V.price Desc'; 
    $statement = $db->prepare($query);
    if ($classID) {
         $statement->bindValue(':ID', $classID);
    }
    if ($makeID) {
        $statement->bindValue(':ID', $makeID);
    }
    if ($typeID) {
    $statement->bindValue(':ID', $typeID);
    }
    $statement->execute();
    $vehicleID = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicleID;
}

// function get_autos($classID, $makeID, $typeID) {
//     global $db;
//     if ($classID) {
//         $query = 'SELECT V.vehicleID, V.year, v.model, v.price, C.Class, M.Make, T.Type From vehicles V
//              LEFT JOIN classes C ON V.class_id = C.ID
//              WHERE V.class_id = :classID ORDER BY V.price Desc';             
//     } else if ($makeID) {
//         $query = 'SELECT V.vehicleID, V.year, v.model, v.price, C.Class, M.Make, T.Type From vehicles V
//         LEFT JOIN makes M ON V.make_id = M.ID
//         WHERE V.make_id = :makeID ORDER BY V.price Desc';
//     } else if ($typeID) {
//         $query = 'SELECT V.vehicleID, V.year, v.model, v.price, C.Class, M.Make, T.Type From vehicles V
//         LEFT JOIN types T ON T.type_id = T.ID
//         WHERE V.type_id = :typeID ORDER BY V.price Desc';
//     } else {
//         $query = 'SELECT V.vehicleID, V.year, V.model, V.price
//         C.Class, M.Make, T.Type From vehicles V
//         LEFT JOIN classes C ON V.class_id = C.ID
//         WHERE V.class_id = :classID
//         LEFT JOIN makes M ON V.make_id = M.ID
//         WHERE V.make_id = :makeID
//         LEFT JOIN types T ON T.type_id = T.ID
//         WHERE V.type_id = :typeID
//         ORDER BY price Desc';
//     }    
//     $statement = $db->prepare($query);
//     if ($classID) {
//          $statement->bindValue(':ID', $classID);
//     }
//     if ($makeID) {
//         $statement->bindValue(':ID', $makeID);
//     }
//     if ($typeID) {
//     $statement->bindValue(':ID', $typeID);
//     }
//     $statement->execute();
//     $vehicleID = $statement->fetchAll();
//     $statement->closeCursor();
//     return $vehicleID;
// }

function delete_vehicle($vehicleID) //Admin Only
{
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicleID = :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $classID, $makeID, $typeID)
{
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, class_ID, make_ID, type_ID) VALUES (:year, :model, :price, :classID, :makeID, :typeID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':classID', $classID);
    $statement->bindValue(':makeID', $makeID);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();
    $statement->closeCursor();
}