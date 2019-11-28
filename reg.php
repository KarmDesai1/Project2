<?php

require('pdo.php');
// get the data from the form
$email= filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST,"password");
$first = filter_input(INPUT_POST,"first");
$last = filter_input(INPUT_POST,"last");
$birthday = filter_input(INPUT_POST,"birthday");

echo "First Name: $first <br>";
echo "Last Name: $last <br>";
echo "Email Address: $email <br>";
echo "Password: $password <br>";
echo "Birthday: $birthday <br>";

// validate form data

$valid=true;
if (empty($email)) {
    echo("Please type a email in");
    $valid = false;
}
else if (strpos($email,'@') === false) {
    echo('There is no @ in the email');
    $valid = false;
}
if (empty($password)) {
    echo ("Please type a password in");
    $valid = false;
    }
elseif (strlen($password)<=8) {
    echo ("The Password needs to greater than 8 characters");
    $valid = false;
}
if (empty($first)) {
    echo ("Please Type a Name in");
    $valid = false;
}
if (empty($last)) {
    echo ("Please Type Last Name in");
    $valid = false;
}
if (empty($birthday)) {
    echo("Please Type Birthday");
    $valid = false;
}
if ($valid = true) {
//SQL Query
    $query = 'INSERT INTO accounts
    (email, password, fname, lname, birthday)
    VALUES
    (:email, :password, :fname, :lname, :birthday)';
// Create PDO Statement
    $statement = $db->prepare($query);

//statement-> bind
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':fname', $first);
    $statement->bindValue(':lname', $last);
    $statement->bindValue(':birthday', $birthday);

//excute
    $statement->execute();
//Close the database
    $statement->closeCursor();
}
else{
    echo('Must redo form');
}
?>
<html>
<button type="button"><a href="index2.html">Back</a></button>
<br>
<button type="button"><a href="index1.html">Login Page</a></button>
<br>
<button type="button"><a href="index3.html">Questions</a></button>
</html>