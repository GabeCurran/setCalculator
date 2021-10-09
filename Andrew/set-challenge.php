<?php
    session_start();
    $_SESSION['set1'] = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    $_SESSION['set2'] = array(5, 3, 1, 6, 5, 7, 8, 9, 4, 2);
    $_SESSION['set3'] = array(5, 8, 2, 5, 5, 2, 3, 6, 8, 4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="set-process.php">
        <label for="set-pick"><h1>Pick a Set</h1></label>
        <select id="set-pick" name="set-pick">
            <option value="set1"><?php echo "Set 1: "; foreach($_SESSION['set1'] as $num) { echo $num; echo " "; } ?></option>
            <option value="set2"><?php echo "Set 2: "; foreach($_SESSION['set2'] as $num) { echo $num; echo " "; } ?></option>
            <option value="set3"><?php echo "Set 3: "; foreach($_SESSION['set3'] as $num) { echo $num; echo " "; } ?></option>
        </select>

        <label for="operation-pick"><h1>Pick an Operation</h1></label>
        <select id="operation-pick" name="operation-pick">
            <option value="getSet">getSet()</option>
            <option value="exists">exists($n)</option>
            <option value="addNumber">addNumber($n)</option>
            <option value="remove">remove($n)</option>
            <option value="union">Union($set2)</option>
            <option value="Intersection">Intersection($set2)</option>
            <option value="printSet">printSet()</option>
            <option value="minus">minus($set2)</option>
        </select>
        <br><br>

        <label for="set-param"><h1>Pick the second set for paramater if needed</h1></label>
        <select id="set-param" name="set-param">
            <option value="set1"><?php echo "Set 1: "; foreach($_SESSION['set1'] as $num) { echo $num; echo " "; } ?></option>
            <option value="set2"><?php echo "Set 2: "; foreach($_SESSION['set2'] as $num) { echo $num; echo " "; } ?></option>
            <option value="set3"><?php echo "Set 3: "; foreach($_SESSION['set3'] as $num) { echo $num; echo " "; } ?></option>
        </select>
        <br><br>

        <label for="num-param"><h1>Pick the number for paramater if needed</h1></label>
        <input type="text" id="num-param" name="num-param">
        <br><br>

        <label for="submit">See Answer</label>
        <input id="submit" type="submit">
    </form>
    <br><br>
    <?php
        if(isset($_SESSION['answer'])) {
            echo "Answer: ";
            if(gettype($_SESSION['answer']) === 'array') {
                foreach ($_SESSION['answer'] as $num) {
                    echo $num;
                    echo " ";
                }
            } else if(gettype($_SESSION['answer']) === 'boolean') {
                echo var_dump($_SESSION['answer']);
            } else {
                echo $_SESSION['answer'];
            }
        }
        unset($_SESSION['answer']);
    ?>
</body>
</html>