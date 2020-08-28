<!DOCTYPE html>
<html>
<head>
<title>MD5 Cracker</title>
</head>
<body>
<h1>MD5 Cracker</h1>
<p>This application takes a MD5 hash of a four-digit PIN number, and checks all
10,000 possible four-digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php

$goodtext = 'Not found';

// If there's no parameter, then this code is skipped:
if (isset($_GET['md5'])) {

    // Return current Unix timestamp with microseconds (float):
    $time_pre = microtime(true);

    $md5 = $_GET['md5'];

    // String containing the set of all possible digits:
    $digits = '0123456789';
    $number_digits = strlen($digits);

    // Print the first 15 attempts:
    $show = 15;

    // Boolean variable that tells us if it's time to stop:
    $stop = false;

    // Loop over the possibilities for the 1st digit of the PIN number:
    for ($i = 0; !$stop && $i < $number_digits; $i++) {
        $digit1 = $digits[$i];
        // Loop over the possibilities for the 2nd digit of the PIN number:
        for ($j = 0; !$stop && $j < $number_digits; $j++) {
            $digit2 = $digits[$j];
            // Loop over the possibilities for the 3rd digit of the PIN number:
            for ($k = 0; !$stop && $k < $number_digits; $k++) {
                $digit3 = $digits[$k];
                // Loop over the possibilities for the 4th digit of the PIN number:
                for ($l = 0; !$stop && $l < $number_digits; $l++) {
                    $digit4 = $digits[$l];
                    // Concatenate the digits to get a possible PIN number:
                    $try = $digit1 . $digit2 . $digit3 . $digit4;
                    // See if we have a match:
                    $check = hash('md5', $try);
                    if ($check == $md5) {
                        $goodtext = $try;
                        // It's time to stop:
                        $stop = true;
                    }
                    // Print attempts until $show hits 0:
                    if ($show > 0) {
                        echo "$check $try\n";
                        $show--;
                    }
                }
            }
        }
    }

    // Return current Unix timestamp with microseconds (float):
    $time_post = microtime(true);

    // Compute and print the elapsed time:
    $elapsed_time = $time_post - $time_pre;
    echo "Elapsed time: $elapsed_time\n";

}

?>
</pre>
<p>PIN: <?= htmlentities($goodtext); ?></p>
<form>
<input type='text' name='md5' size='60'>
<input type='submit' value='Crack MD5'>
</form>
<ul>
<li><a href='index.php'>Reset</a></li>
<li><a href='md5.php'>MD5 Encoder</a></li>
</ul>
</body>
</html>
