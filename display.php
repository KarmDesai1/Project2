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

$query ='SELECT * FROM accounts WHERE email= :email AND password = :password';
$statement = $db->prepare($query);

//Bind form values
$statement->bindValue(':email',$email_address);
$statement->bindValue(':password',$password);

$statement->execute();
$accounts=$statement->fetchAll();

$id =$accounts['id'];
$firstName = $accounts['fname'];
$lastName = $accounts['lname'];
$email_address = $accounts['email'];

if (empty($accounts)) {
    header("location: index2.html");
}
//else{
//    header("location: dis_questions.php?email_address=$email_address&password=$password");
//}
else{
    echo "The combination of UserName and password does not exist";
}
$statement->closeCursor();
?>

<html>
<button type="button"><a href="index2.html">Back</a></button>
<br>
<button type="button"><a href="index.html">Login Page</a></button>
<br>
<button type="button"><a href="index3.html">Questions</a></button>
<br>
<button type="button"><a href="index.html">Back</a></button>
</html>
