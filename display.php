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
function validate_login($email_address, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email_address = :email_address 
AND password = :password';
    $statement = $db ->prepare($query);
    $statement->bindValue(':email_address'.$email_address);
    $statement->bindValue(':password',$password);

}
//Get Login Form from users
$email_address = $_POST["EmailAddress"];
$password = $_POST["Password"];
$query = 'Insert INTO todos
            (email_address, password)
            VALUES 
            (:email_address,$password)';
    $statement = $db->prepare($query);

    $statement->bindValue(':email_address', $email_address);
    $statement->bindValue(':password', $password);

$statement->execute();

$user = $statement->fetch();
    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    }
    else {
        $userId = $user['id'];
        $statement->closeCursor();
        return $userId;
}
{
    $statement->closeCursor();
}

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
