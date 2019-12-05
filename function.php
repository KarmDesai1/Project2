<?php
function get_username($userid)
{
    global $db;
    $query = 'SELECT fname, lname FROM accounts where id=:userid';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $userid);
    $statement->execute();
    $names=$statement->fetch();
    $statement->closeCursor();
    $fname=$names['fname'];
    $lname=$names['lname'];
    return $fname . ' ' .$lname;
}
function get_questions($loginid){
    global $db;
    $query = 'SELECT * FROM questions where loginid=:loginid';

    $statement = $db->prepare($query);
    $statement->bindValue(':loginid', $loginid);
    $statement->execute();

    $question=$statement->fetchAll();
    $statement->closeCursor();

    return $question;
}