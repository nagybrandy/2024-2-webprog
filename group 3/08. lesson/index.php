<?php
   // var_dump($_GET["bgcolor"]);
   $errors = []; //error messages
   $data = []; //valid data will be saved here

   function validate($input, &$errors, &$data){
    if(!isset($input['name']) || !strlen(trim($input['name'])) > 0){
        $errors []= "Enter your name!";
    } else if(strlen(trim($input['name'])) < 3) {
        $errors []= "Your name should be at least 3 characters long!";
    } else {
        $data['name'] = $input['name'];
    }
    
    if(!isset($input['email']) || !strlen(trim($input['email'])) > 0){
        $errors []= "Enter your email!";
    } else if(!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        $errors []= "Your email address is not valid!";
    } else {
        $data['email'] = $input['email'];
    }

    if(!isset($input['cardnum']) || !strlen(trim($input['cardnum'])) > 0){
        $errors []= "Enter your card number!";
    } else if(!preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $input['cardnum'])) {
        $errors []= "Your card number is not valid";
    } else {
        $data['cardnum'] = $input['cardnum'];
    }

    return count($errors) === 0;
   }

   $is_valid = validate($_GET, $errors, $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
</head>

<body style="background-color: <?= $_GET['bgcolor'] ?? "#f0f0f0" ?>">
    <h1>You might have a chance to win a new Iphone!!!😍😍</h1>
    <h2>The only thing you have to do is fill out this form.</h2>
    <form action="index.php" method="get" novalidate>
        <h4>Name</h4>
        <input type="text" name="name" id="" value=<?= $data['name'] ?? '' ?>>

        <h4>E-mail</h4>
        <input type="email" name="email" id="" value=<?= $data['email'] ?? '' ?>>

        <h4>Card Number</h4>
        <input type="text" name="cardnum" id="" value=<?= $data['cardnum'] ?? '' ?>>

        <h4>CCV/CVV</h4>
        <input type="text" name="cvv" id="">

        <h4>Color</h4>
        <select name="color" id="" >
            <option value="1">Blue</option>
            <option value="2">Red</option>
            <option value="3">Black</option>
        </select>

        <h4>Expiry date</h4>
        <input type="date" name="date" id="">

        <h4>Agreeing to the contract<input type="checkbox" name="agree" id="" ></h4>

        <input type="submit" value="Send">
    </form>

    <?php if(!$is_valid): ?>
        <ul style="color:red">
            <?php foreach($errors as $error): ?>
                <li><?=$error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h1>YOU'VE JUST WON A NEW IPHONE! 😍😍</h1>
    <?php endif; ?>

    <a href="/index.php?bgcolor=%23aaa">Dark gray</a>
    <a href="/index.php?bgcolor=lightgreen">Lightgreen</a>
    <a href="https://www.google.com/search?q=lions">Search</a>
</body>

</html>