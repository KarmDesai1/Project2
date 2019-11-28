<?php
require('pdo.php');
// get the data from the form
$email_address = filter_input(INPUT_POST,'email_address');
$password = filter_input(INPUT_POST,"password");
// validate form data
$i = strpos($email_address,'@');
if (empty($email_address)) {
    echo("Please type a email in");
}
else if ($i === false) {
    echo ('There is no @ in the email');
}
else {
    echo $email_address;
}
if (empty($password)) {
    echo("Please type a password in");
}
else if (strlen($password)<=8) {
    echo ("The Password needs to greater than 8 characters");
}
else {
    echo $password;
}

if (false){
    $query = 'SELECT email  FROM accounts
WHERE email= $email_address';
    $statement = $db->prepare($query);
}





?>

<html>
button type="button"><a href="index2.html">Back</a></button>
<br>
<button type="button"><a href="index.html">Login Page</a></button>
<br>
<button type="button"><a href="index3.html">Questions</a></button>
<button type="button"><a href="index.html">Back</a></button>
</html>
