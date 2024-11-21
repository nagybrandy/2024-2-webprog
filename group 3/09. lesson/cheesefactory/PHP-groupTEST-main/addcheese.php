<?php 
 $errors = [];
 $data = [];
 $input = $_GET;

 $is_valid = validate($data, $errors, $input);
 function validate(&$data, &$errors, $input) {
     // CREATE VALIDATION LOGIC HERE!

     return count($errors) === 0;
 }

  // Add to the JSON if valid!
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Cheese Arrived!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>New Cheese Arrived!</h1>

    <form action="addcheese.php" method="get" novalidate> 
        <h4>Cheese Name</h4>
        <input type="text" name="name">
        
        <h4>Place of Origin</h4>
        <select name="origin">
            <option value="gr">Greece</option>
            <option value="fr">France</option>
            <option value="it">Italy</option>
            <option value="ger">Germany</option>
        </select>
        
        <h4>Type</h4>
        <input type="text" name="type">
        
        <h4>Age (in months)</h4>
        <input type="number" name="age_m">
        
        <input type="submit" value="Submit">
    </form>
    <div id="results">
        <!-- Display this if valid -->
        <h2>Successful Addition! 😍</h2>
        <a href='index.php'>Back to homepage</a>

        <!-- Display this if not valid -->
        <h2>Failed Addition! 😢😭</h2>
        <ul id="errors">
            <li>Provide a name with at least 4 characters without spaces!</li> <!-- plain -->
            <li>Provide the type!</li> <!-- regex -->
            <li>Provide the age of the cheese!</li> <!-- filter_var -->
        </ul>
    </div>

    <ul id="help">
            <li><a href="addcheese.php?name=&origin=gr&type=&age_m=">❌cheesename ❌cheesetype ❌cheeseage</a></li>
            <li><a href="addcheese.php?name=Feta&origin=gr&type=&age_m=">✅cheesename ❌cheesetype ❌cheeseage</a></li>
            <li><a href="addcheese.php?name=Feta&origin=gr&type=white&age_m=">✅cheesename ✅cheesetype ❌cheeseage</a></li>
            <li><a href="addcheese.php?name=Feta&origin=gr&type=white&age_m=3">✅cheesename ✅cheesetype ✅cheeseage</a></li>
    </ul>
</body>
</html>
