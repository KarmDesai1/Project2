<?php

require('pdo.php');
//get information from form
$ownerid =filter_input(INPUT_GET,'ownerid');
$Name = filter_input(INPUT_POST,"Name");
$Body = filter_input(INPUT_POST,"Body");
$Skills = filter_input(INPUT_POST,"Skills");

$valid=true;
//Check validation of Name
if (empty($Name)) {
    $message = "Please type a password in";
    $valid=false;
}
else {
    echo $Name;
    echo "<br>";
}
if ($Name != strlen($Name)<=3) {
    $message = "The Password needs to greater than 8 characters";
    $valid=false;
}
//Check validation of Body
if (empty($Body)) {
    $message = "Please type a password in";
    $valid=false;
}
else {
    echo $Body;
    echo "<br>";
    echo $Skills;
}
if ($Body != strlen($Body)>=500) {
    $message = "The Password needs to be less than 500 characters";
    $valid=false;
}
if (empty($Skills)) {
    $message = "Please type a skills in";
    $valid=false;
}
elseif (strpos($Skills,',') === true)
{
    $Array = explode(',', $Skills);
    echo '<pre>'; print_r($Array); echo '</pre>';
    echo array_keys($Array);
    print_r($Array);
}
if ($valid = true) {
    //SQL Query
    $query = 'INSERT INTO questions
    (body, skills, title,ownerid, createdate)
    VALUES
    (:body, :skills, :title,:ownerid, NOW())';
// Create PDO Statement
    $statement = $db->prepare($query);
//statement-> bind
    $statement->bindValue(':body',$Body);
    $statement->bindValue(':skills', $Skills);
    $statement->bindValue(':title',$Name);
    $statement->bindValue(':ownerid',$ownerid);

//excute
    $statement->execute();
//Close the database
    $statement->closeCursor();
}
else{
    echo('You must re do form');
}

function get_questions ($userId)
{
    global $db;
    $query = 'SELECT * FROM questions WHERE userId = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
//The execute function
    $statement->execute();
//Get all question from SQL
    $questions = $statement->fetchAll();

    $statement->closeCursor();
    return $questions;
    //redirect page to question page
    header ("Location: dis_question.php");
    exit;
}
?>
<html>
<h1> Questionnaire </h1>
<div>
    Question Name = <?php echo $Name; ?>
    <span <span class="error"><?php echo $Name; ?></span>
</div>
<div>
    Question Body = <?php echo $Body; ?>
    <span <span class="error"><?php echo $Body; ?></span>
</div>
<div>
    Question Skills = <?php echo $Skills; ?>
    <span <span class="error"><?php echo $Skills; ?></span>
</div>
<button type="button">
    <button type="button"><a href="index2.html">Back</a></button>
    <br>
    <button type="button"><a href="index.html">Login Page</a></button>
    <br>
    <button type="button"><a href="index3.html">Questions</a></button>
    <br>
    <button type="button"><a href="index3.html">Ask another question?</a></button>
</html>
