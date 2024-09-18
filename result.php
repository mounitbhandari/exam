<?php
require_once "connection.php";
// print_r($_POST);
$score=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <pre> -->
    <?php 
        foreach($_POST as $key => $value) {
            $checksCorrect = $pdo->query("select is_correct from options where question_id=$key and option_text='$value'");
            $ans = $checksCorrect->fetchAll(PDO::FETCH_ASSOC);
            if($ans[0]["is_correct"] == 1) {
                $score += 1;
            }
        }
        echo $score;
    ?>
    <!-- </pre> -->
</body>

</html>