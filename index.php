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
$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_SPECIAL_CHARS);
$makeID = filter_input(INPUT_POST, 'makeID', FILTER_SANITIZE_SPECIAL_CHARS) ?: filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_SPECIAL_CHARS);
$typeID = filter_input(INPUT_POST, 'typeID', FILTER_SANITIZE_SPECIAL_CHARS) ?: filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

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

    case "add_class":
        if ($class) {
            add_class($class);
            header("Location: .?action=list_classes");
            exit(); // Exits the script, making a break optional but good practice
        } else {
            $error_message = "Invalid class name. Please check the field and try again.";
            include("view/error.php");
            exit(); // Exits the script, making a break optional but good practice
        }
        break; // Good practice even after exit()

    case "add_make":
        if (!empty($make)) {
            add_make($make);
            header("Location: .?action=list_makes");
            exit(); // Exits the script, making a break optional but good practice
        } else {
            $error_message = "Invalid make name. Please check the field and try again.";
            include("view/error.php");
            exit(); // Exits the script, making a break optional but good practice
        }
        break; // Good practice even after exit()

        case "add_type":
            if (!empty($type)) {
                add_type($type);
                header("Location: .?action=list_types");
                exit(); // Exits the script, making a break optional but good practice
            } else {
                $error_message = "Invalid type name. Please check the field and try again.";
                include("view/error.php");
                exit(); // Exits the script, making a break optional but good practice
            }
            break; // Good practice even after exit()


        case "add_vehicle":
        if ($classID && $makeID && $typeID && $year && $model && $price) {
            add_vehicle($year, $model, $price, $classID, $makeID, $typeID);
            header("Location: .?action=list_vehicles" . $vehicleID);
            exit(); // Exits the script, making a break optional but good practice
        } else {
            $error_message = "Invalid vehicle data. Check all fields and try again.";
            include("view/error.php");
            exit(); // Exits the script, making a break optional but good practice
        }
        break; // Good practice even after exit()

    case "delete_class":
        if ($classID) {
            try {
                delete_class($classID);
                header("Location: .?action=list_classes");
                exit(); // Exits the script, making a break optional but good practice
            } catch (PDOException $e) {
                $error_message = "You cannot delete a class if vehicles exist in the category.";
                include('view/error.php');
                exit(); // Exits the script, making a break optional but good practice
            }
        }
        break; // Prevent fall-through
    case "delete_make":
        if ($makeID) {
            try {
                delete_make($makeID);
                header("Location: .?action=list_makes");
                exit(); // Exits the script, making a break optional but good practice
            } catch (PDOException $e) {
                $error_message = "You cannot delete a make if vehicles exist in the category.";
                include('view/error.php');
                exit(); // Exits the script, making a break optional but good practice
            }
        }
    break; // Prevent fall-through
    case "delete_type":
        if ($typeID) {
            try {
                delete_type($typeID);
                header("Location: .?action=list_types");
                exit(); // Exits the script, making a break optional but good practice
        } catch (PDOException $e) {
            $error_message = "You cannot delete a type if vehicles exist in the category.";
            include('view/error.php');
            exit(); // Exits the script, making a break optional but good practice
        }
    }
    break; // Prevent fall-through
    //This is also working, but the deletes for the others are not.
    case "delete_vehicle":
        if ($vehicleID) {
            delete_vehicle($vehicleID);
            header("Location: .?action=list_vehicles" . $vehicleID);
            exit(); // Exits the script, making a break optional but good practice
        } else {
            $error_message = "Missing or incorrect vehicle id.";
            include('view/error.php');
            exit(); // Exits the script, making a break optional but good practice
        }
        break; // Good practice even after exit()
    default:
        $classes = get_classes();
        $makes = get_makes();
        $types = get_types();
        $vehicles = get_autos($classID, $makeID, $typeID);
        include('view/adminList.php');
        // No break needed after default as it's the last case
}