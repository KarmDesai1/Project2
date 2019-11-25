<?php

require('pdo.php');
//get information from form
$Name = filter_input(INPUT_POST,"Name");
$Body = filter_input(INPUT_POST,"Body");
$Skill = filter_input(INPUT_POST,"Skill");

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
    echo $Skill1;
    echo "<br>";
    echo $Skill2;
    echo "<br>";
    echo $Skill3;
    echo "<br>";

}
if ($Body != strlen($Body)>=500) {
    $message = "The Password needs to be less than 500 characters";
    $valid=false;
}
if (empty($Skill)) {
    $message = "Please type a skills in";
    $valid=false;
}
elseif (strpos($Skill,',') === true)
{
    $Array = explode(',', $Skill);
    echo '<pre>'; print_r($Array); echo '</pre>';
    echo array_keys($Array);
    print_r($Array);
}
if ($valid = true) {
    //SQL Query
    $query = 'INSERT INTO questions
    (body, skills, title)
    VALUES
    (:body, :skills, :title)';
// Create PDO Statement
    $statement = $db->prepare($query);

//statement-> bind
    $statement->bindValue(':body',$Body);
    $statement->bindValue(':skills', $Skill);
    $statement->bindValue(':title',$Name);


//excute
    $statement->execute();
//Close the database
    $statement->closeCursor();
}

?>
<html>
<button type="button">
    <a href="index3.html">Back</a>Ask another question?
</button>
</html>