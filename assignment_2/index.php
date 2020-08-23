<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Marcio Woitek Junior">
    <meta name="description" content="Assignment: Getting Started with PHP">
    <meta name="viewport" content="width=device-width">
    <title>Marcio Woitek Junior PHP</title>
</head>
<body>
    <h1>Marcio Woitek Junior PHP</h1>
    <?php
    $my_name = 'Marcio Woitek Junior';
    $hash_my_name = hash('sha256', $my_name);
    echo "The SHA256 hash of \"$my_name\" is $hash_my_name.\n";
    ?>
    <pre>ASCII ART:
     __       __
    |  \     /  \
    | $$\   /  $$
    | $$$\ /  $$$
    | $$$$\  $$$$
    | $$\$$ $$ $$
    | $$ \$$$| $$
    | $$  \$ | $$
     \$$      \$$
    </pre>
    <p><a href="check.php">Click here to see the output of check.php</a></p>
    <p><a href="fail.php">Click here to see the output of fail.php</a></p>
</body>
</html>
