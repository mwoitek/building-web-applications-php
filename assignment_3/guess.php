<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="Marcio Woitek Junior">
<meta name="description" content="Assignment: A Guessing Game and HTTP GET Parameters">
<meta name="viewport" content="width=device-width">
<title>Guessing Game for Marcio Woitek Junior</title>
</head>
<body>
<h1>Welcome to my guessing game</h1>
<p>
<?php
    if (!isset($_GET['guess'])) {
        echo 'Missing guess parameter';
    } else if (strlen($_GET['guess']) < 1) {
        echo 'Your guess is too short';
    } else if (!is_numeric($_GET['guess'])) {
        echo 'Your guess is not a number';
    } else if ($_GET['guess'] < 57) {
        echo 'Your guess is too low';
    } else if ($_GET['guess'] > 57) {
        echo 'Your guess is too high';
    } else {
        echo 'Congratulations - You are right';
    }
?>
</p>
</body>
</html>