<?php
// Demand the user name:
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Name parameter missing');
}

// Check if the user clicked on the 'Logout' button:
if (isset($_POST['logout'])) {
    // Redirect the browser to index.php:
    header('Location: index.php');
    return;
}

// Set up the values for the game.
// 0 is Rock, 1 is Paper, and 2 is Scissors.
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST['human']) ? $_POST['human'] + 0 : -1;

// Randomly select the computer play:
$computer = rand(0, 2);

// This function takes the computer play and the human play. It returns 'Tie',
// 'You Lose' or 'You Win' depending on the plays. 'You' is the human being
// addressed by the computer.
function check($computer, $human) {
    if ($human == 0) {
        if ($computer == 0) {
            return 'Tie';
        } else if ($computer == 1) {
            return 'You Lose';
        } else if ($computer == 2) {
            return 'You Win';
        }
    } else if ($human == 1) {
        if ($computer == 0) {
            return 'You Win';
        } else if ($computer == 1) {
            return 'Tie';
        } else if ($computer == 2) {
            return 'You Lose';
        }
    } else if ($human == 2) {
        if ($computer == 0) {
            return 'You Lose';
        } else if ($computer == 1) {
            return 'You Win';
        } else if ($computer == 2) {
            return 'Tie';
        }
    }
    return false;
}

// Get the result:
$result = check($computer, $human);
?>

<!DOCTYPE html>
<html>
<head>
<?php require_once 'bootstrap.php'; ?>
<title>Marcio Woitek Junior | Rock, Paper, Scissors Game</title>
</head>
<body>
<div class='container'>
<h1>Rock Paper Scissors</h1>
<?php
// Print the user name:
echo '<p>Welcome: ' . htmlentities($_GET['name']) . "</p>\n";
?>
<form method='POST'>
<select name='human'>
<option value='-1'>Select</option>
<option value='0'>Rock</option>
<option value='1'>Paper</option>
<option value='2'>Scissors</option>
<option value='3'>Test</option>
</select>
<input type='submit' value='Play'>
<input type='submit' name='logout' value='Logout'>
</form>
<pre>
<?php
if ($human == -1) {
    echo "Please select a strategy and press Play.\n";
} else if ($human == 3) {
    for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
            $r = check($c, $h);
            echo "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
} else {
    echo "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}
?>
</pre>
</div>
</body>
</html>
