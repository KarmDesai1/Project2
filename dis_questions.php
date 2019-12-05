<?php
require("pdo.php");
require("get.php");

session_start();
$userid=1;
$SESSION['userid']=$userid;
?>
<html>

<link rel="stylesheet" type="text/css" href="style.css">

<h1>Collected Data</h1>

<body>

<div> Questions <?php echo get_username($userid);
$questRecord = get_questions($userid);?>

<br>
<button type="Submit"><a href="index3.html"> Ask Away </a></button>

<p></p>

    <table class="table table-bordered">

    <tr>
        <th>Title</th>
        <th>Body</th>
        <th>Skills</th>
    </tr>
    <?php foreach($questRecord as $question) : ?>
    <tr>
        <td><?php echo $question['title'];?></td>
        <td><?php echo $question['body'];?></td>
        <td><?php echo $question['skills'];?></td>
    </tr>
    <?php endforeach;?>
</table>
<br>
<p>
<button type="Submit"><a href="index.html"> LOG OUT</a> </button>

</div>
</p>
</body>
</html>