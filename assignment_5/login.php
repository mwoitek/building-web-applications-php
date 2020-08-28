<?php
// Check if the user clicked on the 'Cancel' button:
if (isset($_POST['cancel'])) {
    // Redirect the browser to index.php:
    header('Location: index.php');
    return;
}

$salt = 'XyZzy12*_';
// pw: meow123
$stored_hash = 'a8609e8d62c043243c4e201cbb342862';

// If we have no POST data:
$failure = false;

// Check if we have some POST data:
if (isset($_POST['who']) && isset($_POST['pass'])) {
    // Check if user name and password were provided by the user:
    if (strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1) {
        $failure = 'User name and password are required';
    } else {
        // Check if the password is correct:
        $check = hash('md5', $salt . $_POST['pass']);
        if ($check == $stored_hash) {
            // Redirect the browser to game.php:
            header('Location: game.php?name=' . urlencode($_POST['who']));
            return;
        } else {
            $failure = 'Incorrect password';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<?php require_once 'bootstrap.php'; ?>
<title>Login Page</title>
</head>
<body>
<div class='container'>
<h1>Please Log In</h1>
<?php
// Check for errors. If necessary, print an error message.
if ($failure !== false) {
    echo '<p style="color: red;">' . htmlentities($failure) . "</p>\n";
}
?>
<form method='POST'>
<label for='user_name'>User Name</label>
<input type='text' name='who' id='user_name'><br>
<label for='pw'>Password</label>
<input type='text' name='pass' id='pw'><br>
<input type='submit' value='Log In'>
<input type='submit' name='cancel' value='Cancel'>
</form>
</div>
</body>
</html>
