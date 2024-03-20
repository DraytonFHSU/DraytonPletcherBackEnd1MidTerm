<?php

//Drayton Pletcher
//Back-end web development 1
//Mid-Term

require_once('model/database.php');
require_once('model/class_db.php');
require_once('model/inventory_db.php');
require_once('model/make_db.php');
require_once('model/type_db.php');

// Filter input to prevent XSS and SQL Injection
$vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_SANITIZE_SPECIAL_CHARS) ?: filter_input(INPUT_GET, 'vehicleID', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);

$classID = filter_input(INPUT_POST, 'classID', FILTER_SANITIZE_SPECIAL_CHARS) ?: filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
$class = filter_input(INPUT_POST, 'class', FILTER_VALIDATE_INT);
$makeID = filter_input(INPUT_POST, 'makeID', FILTER_SANITIZE_SPECIAL_CHARS) ?: filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
$make = filter_input(INPUT_POST, 'make', FILTER_VALIDATE_INT);
$typeID = filter_input(INPUT_POST, 'typeID', FILTER_SANITIZE_SPECIAL_CHARS) ?: filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_VALIDATE_INT);

// Determine the action to take, defaulting to listing the to do's if none specified
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_toDos';

switch ($action) {
    case "list_classes":
        $classes = get_classes();
        include('view/classList.php');
        break; // Prevent fall-through
    case "list_makes":
        $makes = get_makes();
        include('view/makeList.php');
        break; // Prevent fall-through
    case "list_types":
        $types = get_types();
        include('view/typeList.php');
        break; // Prevent fall-through


    default:
        $classes = get_classes();
        $makes = get_makes();
        $types = get_types();
        $vehicles = get_autos($vehicleID);
        include('view/inventoryList.php');
        // No break needed after default as it's the last case
}