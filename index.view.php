<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Set Calculator</title>
</head>
<body>
    <form method="post" action="setCalculator.php">
        <label for="setDropdown">Pick a set!</label>
        <select name='setDropdown' id='setDropdown'>
            <option value="set1">Set One</option>
            <option value="set2">Set Two</option>
            <option value="set3">Set Three</option>
        </select>

        <label for="secondSetDropdown">Pick a second set!</label>
        <select name='secondSetDropdown' id='secondSetDropdown'>
            <option value="set1">Set One</option>
            <option value="set2">Set Two</option>
            <option value="set3">Set Three</option>
        </select>

        <label for="pickNumber">Pick a number!</label>
        <input type='number' name='pickNumber' id='pickNumber' value="0">
        
        <label for="operationDropdown">Pick an operator to perform!</label>
        <select name='operationDropdown' id='operationDropdown'>
            <option value="getSet">Get Set</option>
            <option value="exists">Exists</option>
            <option value="addNumber">Add Number</option>
            <option value="remove">Remove</option>
            <option value="union">Union</option>
            <option value="intersection">Intersection</option>
            <option value="printSet">Print Set</option>
            <option value="minus">Minus</option>
        </select>

        <input type='submit' value='submit' id='submit'>

    </form>
</body>
</html>