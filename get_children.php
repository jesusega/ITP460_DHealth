<?php
    // Include config.php
    require_once('config.php');
    // Include messages.php
    require_once('messages.php');

    // Starting the session
    session_start();

    // Get AJAX filter variable (mrn)
    $mrn = json_decode(json_encode($_GET['filter']), true);

    // Array of children
    $children = array();

    // Get JSON info using mrn
    for($i = 0; $i < count($mrn); $i++) {
        $results = json_decode(file_get_contents('https://ped-akido.herokuapp.com/patients?mrn=' . $mrn[$i]), true);
        $jsonChild = $results['patients'][0];
        array_push($children, $jsonChild);
    }

    echo json_encode($children);
?>