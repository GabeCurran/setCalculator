<?php
session_start();

$firstSet = $_POST['setDropdown'];
$secondSet = $_POST['secondSetDropdown'];
$userNumber = $_POST['pickNumber'];
$operation = $_POST['operationDropdown'];

if($firstSet == 'set1') {
    $firstSet = $_SESSION['set1'];
} 
else if ($firstSet == 'set2') {
    $firstSet = $_SESSION['set2'];
} 
else if ($firstSet == 'set3') {
    $firstSet = $_SESSION['set3'];
}

if($secondSet == 'set1') {
    $secondSet = $_SESSION['set1'];
} 
else if ($secondSet == 'set2') {
    $secondSet = $_SESSION['set2'];
} 
else if ($secondSet == 'set3') {
    $secondSet = $_SESSION['set3'];
}

class Set {

    // protected array of numbers
    protected $firstSet;
    function __construct($firstSet) {
        $this->firstSet = $firstSet;
    }

    // getSet() returns array
        function getSet($firstSet) {
            return $firstSet;
        }

    // exists($n) returns true if $n exists in the set. 
        function exists($n, $firstSet) {
            return in_array($n, $firstSet) ? true : false;
        }

    // addNumber($n) that adds $n to the set if it does not already exist in the set.
        function addNumber($n, $firstSet) {
            if($this->exists($n, $firstSet) == true) {
                return $firstSet;
            } else {
                $addArr = $firstSet;
                array_push($addArr, $n);
                return $addArr;
            }
        }

    // remove($n) removes $n from the set if it exists and returns true. If the number does not exist, it returns false.
        function remove($n, $firstSet) {
            if($this->exists($n, $firstSet) == true) {
                $remArr = $firstSet;
                unset($remArr[$n]);
                return 'true';
            } else {
                return 'false';
            }
        }
    // Union($set2) returns a new set that is the union of the first two set
        function union($firstSet, $secondSet) {
            return array_merge($firstSet, $secondSet);
        }
    // Intersection($set2) returns a new set that is the intersection of the two sets
        function intersection($firstSet, $secondSet) {
            return array_intersect($firstSet, $secondSet);
        }
    // printSet() that returns an HTML string to display it in browser.
        function printSet($firstSet) {
            $htmlStr = "";
            foreach($firstSet as $i) {
                $i = (string)$i;
                $htmlStr = $htmlStr.$i." ";
            }
            return $htmlStr;
        }

    // Set will have -minus($set2) - returns a new set having the elements of set1 minus the matching ones from set2.
        function minus($firstSet, $secondSet) {
            return array_diff($firstSet, $secondSet);
        }
    // Hardcode at least three sets in a php file. Or write code to generate them randomly
}

$userSet = new Set($firstSet);

switch($operation) {
    case $operation == 'getSet':
        $answer = $userSet->getSet($firstSet);
        break;

    case $operation == 'exists':
        $answer = $userSet->exists($userNumber, $firstSet);
        break;

    case $operation == 'addNumber':
        $answer = $userSet->addNumber($userNumber, $firstSet);
        break;

    case $operation == 'remove':
        $answer = $userSet->remove($userNumber, $firstSet);
        break;

    case $operation == 'union':
        $answer = $userSet->union($firstSet, $secondSet);
        break;

    case $operation == 'intersection':
        $answer = $userSet->intersection($firstSet, $secondSet);
        break;

    case $operation == 'printSet':
        $answer = $userSet->printSet($firstSet);
        break;

    case $operation == 'minus':
        $answer = $userSet->minus($firstSet, $secondSet);
        break;
}

$_SESSION['answer'] = $answer;
header('Location: index.php');
exit;

?>