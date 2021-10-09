<?php

session_start();

class Set {
    //A protected array of numbers 
    protected $nums;
    function __construct($set, $param = null) {
        $this->nums = $set;
        if($param !== null) {
            $this->param = $param;
        }
    }
    // Returns protected array of numbers
    function getSet() {
        return $this->nums;
    }
    // returns true if $n exists in the set
    function exists($n) {
        return in_array($n, $this->nums) ? true : false;
    }
    // adds $n to the set if it does not already exist in the set
    function addNumber($n) {
        if($this->exists($n)) {
            return $this->nums;
        } else {
            array_push($this->nums, $n);
            return $this->nums;
        }
    }
    // removes $n from the set if it exists and returns true. 
    // If the number does not exist, it returns false
    function remove($n) {
        if($this->exists($n)) {
            unset($this->nums[$n]);
            return true;
        } else {
            return false;
        }
    }
    // returns a new set that is the union of the first two sets
    function Union($set2) {
        return array_merge($this->nums, $set2);
    }
    // returns a new set that is the intersection of the two sets
    function Intersection($set2) {
        return array_intersect($this->nums, $set2);
    }
    // returns an HTML string to display it in browser
    function printSet() {
        $str = "";
        foreach($this->nums as $num) {
            $num = (string)$num;
            $str = $str . $num . " ";
        }
        return $str;
    }
    // returns a new set having the elements 
    // of set1 minus the matching ones from set2
    function minus($set2) {
        return array_diff($this->nums, $set2);
    }
}

if(isset($_POST['set-pick']) and isset($_POST['operation-pick'])) {
    $setPick = $_POST['set-pick'];
    // Create set based on what set they picked
    if (isset($_POST['set-param'])) {
        switch($setPick) {
            case "set1":
                $set = new Set($_SESSION['set1']);
                break;
            case "set2":
                $set = new Set($_SESSION['set2']);
                break;
            case "set3":
                $set = new Set($_SESSION['set3']);
                break;
            default:
                $set = new Set($_SESSION['set1']);
                break;
        }
    } 

    // Return the answer based off of the operation
    $oper = $_POST['operation-pick'];
    $set2 = $_POST['set-param'];

    switch($set2) {
        case $set2 === "set1":
            $set2 = $_SESSION['set1'];
            break;
        case $set2 === "set2":
            $set2 = $_SESSION['set2'];
            break;
        case $set2 === "set3":
            $set2 = $_SESSION['set3'];
            break;
        default:
            $set2 = $_SESSION['set1'];
            break;
    }

    $num = $_POST['num-param'];
    $answer;
    switch ($oper) {
        case $oper === "getSet":
            $answer = $set->getSet();
            break;
        case $oper === "exists":
            $answer = $set->exists($num);
            break;
        case $oper === "addNumber":
            $answer = $set->addNumber($num);
            break;
        case $oper === "remove":
            $answer = $set->remove($num);
            break;
        case $oper === "union":
            $answer = $set->Union($set2);
            break;
        case $oper === "Intersection":
            $answer = $set->Intersection($set2);
            break;
        case $oper === "printSet":
            $answer = $set->printSet();
            break;
        case $oper === "minus":
            $answer = $set->minus($set2);
            break;
    }
    $_SESSION['answer'] = $answer;
}
header('Location: set-challenge.php');
?>
