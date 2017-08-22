<?php
/**
 * Utility functions, parameter processing functions, and the renderTemplate functions...
 */

function sortAssocArray($array, $sortByKey) {
    $sortArray = array();
    foreach ($array as $i) {
        if (is_object($i)) {
            $i = (array) $i;
        }
        $sortArray[] = $i[$sortByKey];
    }
    array_multisort($sortArray, SORT_ASC, $array);
    return $array;
}


function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>"; 
    die;
}

function isLoggedIn() {
    $inSession = session_id();
    if (!empty($inSession)) {
        if (isset($_SESSION['loggedin'])) {
            return $_SESSION['loggedin'];
        }
    }
    return false;
}
 
function ensureLoggedIn() {
    if (!isLoggedIn()) {
        $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
        redirect('login');
        exit();
    }
}

/* NOT CUSTOMIZED FOR THIS PROJECT */
function ensureLoggedInUserIs($id) {
    ensureLoggedIn();
    if ($_SESSION['UserID'] != $id) {
        //Logger::instance() -> warn("User $id attempted unauthorized access to: " . $_SERVER['REQUEST_URI']);
        die("You aren't authorized for this action. This attempt has been logged.");
    }
}

function validate_present($elements) {
    $errors = '';
    foreach ($elements as $element) {
        if (!isset($_POST[$element]) || empty($_POST[$element])) {
            $errors .= "&bull;  Missing $element<br />\n";
        }
    }
    return $errors;
}

// Dump an array in a pretty format...
function dumpArray($elements) {
    $result = "<ol>\n";
    foreach ($elements as $key => $value) {
        if (is_array($value)) {
            $result .= "<li>Key <b>$key</b> is an array
                containing:\n" . dumpArray($value) . "</li>";
        } else {
            $value = nl2br(htmlspecialchars($value));
            $result .= "<li>Key <b>$key</b> has value <b>$value</b></li>\n";
        }
    }
    return $result . "</ol>\n";
}

// Function to safely fetch a value from an array, supplying a default
// if no key is present.
function safeGet($array, $key, $default=false) {
    if (isset($array[$key])) {
        $value = $array[$key];
        if (!is_array($value)) {
            $value = htmlspecialchars(trim($array[$key]));
        }
        if ($value) {
            return $value;
        }
    }
    return $default;
}

// Function to safely get a variable from an array by index, supplying
// a default if no key is present.
function safeParam($arr, $index, $default=false) {
    if ($arr && isset($arr[$index])) {
        return htmlentities($arr[$index]);
    }
    return $default;
}

// Dump a variable in a nice debug <div>...
function debug($something) {
    echo "<div class='debug'>\n";
    print_r($something);
    echo "\n</div>\n";
}

