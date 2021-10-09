<?php
    session_start();
    $_SESSION['set1'] = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $_SESSION['set2'] = [3, 5, 1, 2, 4, 1];
    $_SESSION['set3'] = [9, 8, 7, 6, 5, 4, 3, 2, 1, 0];
    
    print_r($_SESSION['set1']);
    echo '<br>';

    print_r($_SESSION['set2']);
    echo '<br>';

    print_r($_SESSION['set3']);
    echo '<br>';

    require 'index.view.php';
    
    $answer = '';
    if(isset($_SESSION['answer'])) {
        $answer = $_SESSION['answer'];
        print_r($answer);
        unset($_SESSION['answer']);
    }
    
?>