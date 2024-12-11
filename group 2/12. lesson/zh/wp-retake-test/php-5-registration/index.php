<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
    <link rel="stylesheet" href="src/index.css">
    <link rel="stylesheet" href="src/task.css">
</head>

<body>
    <header>
        <h1>5. Regisztráció / Registration</h1>
    </header>

    <div id="content">
        <form novalidate action="">
            <div class="input">
                <label for="fullname">Teljes név / Full name</label>
                <input type="text" name="fullname" id="fullname" placeholder="Teljes név / Full name">
            </div>
            <div class="input">
                <label for="email">E-mail cím / E-mail address</label>
                <input type="email" name="email" id="email" placeholder="E-mail cím / E-mail address">
            </div>
            <div class="input">
                <label for="year">Születési év / Year of birth</label>
                <input type="number" name="year" id="year" placeholder="Születési év / Year of birth">
            </div>
            <div class="input">
                <label for="account">Bankszámlaszám / Bank account number</label>
                <input type="text" name="account" id="account" placeholder="Bankszámlaszám / Bank account number">
            </div>
            <div class="input">
                <input type="checkbox" name="accept" id="accept">
                <label for="accept">Elfogadom a szabályzatot. / I accept the rules.</label>
            </div>
            <div class="input">
                <button type="submit">Küldés / Send</button>
            </div>
        </form>

        <div id="error">
            <img src="img/error.jpg">
            <ul>
                <li>Error 1</li>
                <li>Error 2</li>
            </ul>
        </div>

        <div id="success">
            <img src="img/success.jpg">
        </div>

        <div id="testing">
            <h2>Linkek a teszteléshez / Links for testing</h2>
            <div>A megoldásod nem elég, ha helyes eredményt az ezekre a tesztekre! Ez csak segítség, ha szeretnéd ellenőrizni.</div>
            <div>Your solution is not necessarily correct if it passes these tests! This is just a help if you want to check.</div>

            <ul>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=1999&account=12345678-12345678-12345678&accept=on">Helyes / Correct</a></li>
                <li><a href="index.php?fullname=&email=jdoe99%40inf.elte.hu&year=1999&account=12345678-12345678-12345678&accept=on">Hiányzó név / Missing name</a></li>
                <li><a href="index.php?fullname=John&email=jdoe99%40inf.elte.hu&year=1999&account=12345678-12345678-12345678&accept=on">Helytelen név / Incorrect name</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=elte.hu&year=1999&account=12345678-12345678-12345678&accept=on">Helytelen e-mail / Incorrect e-mail</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=old&account=12345678-12345678-12345678&accept=on">Születési év nem szám / Year of birth is not a number</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=1980.7&account=12345678-12345678-12345678&accept=on">Születési év nem egész szám / Year of birth is not an integer</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=2008&account=12345678-12345678-12345678&accept=on">Születési év tartományon kívüli / Year of birth is out of range</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=1999&account=12345678-12345678-123456&accept=on">Bankszámlaszám hossza hibás / Length of account number is wrong</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=1999&account=12345678-1A345678-12345678&accept=on">Helytelen bankszámlaszám / Incorrect account number</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=1999&account=12345678-12345678-123-5678&accept=on">Helytelen bankszámlaszám / Incorrect account number</a></li>
                <li><a href="index.php?fullname=John%20Doe&email=jdoe99%40inf.elte.hu&year=1999&account=12345678-12345678-12345678">Jelölőmező hiányzik / Checkbox is missing</a></li>
            </ul>
        </div>
    </div>
</body>
</html>