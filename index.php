<?php 
    require_once "connection.php";

    $questions = $pdo->query("select * from questions");
    $qsn = $questions->fetchAll(PDO::FETCH_ASSOC);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>

    <form action="result.php" method="POST">
        <?php
            foreach ($qsn as $row) {
                echo($row["question_text"]);
                $qsn_id = $row["id"];
                $options = $pdo->query("select * from options where question_id=$qsn_id");
                $opt = $options->fetchAll(PDO::FETCH_ASSOC);
                echo "<br>";
                foreach ($opt as $o) {
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="<?php echo $qsn_id ?>" id="<?php $o['id'] ?>"
                            value="<?php echo $o['option_text'] ?>">
                        <label class="form-check-label" for="<?php $o['id'] ?>"><?php echo $o['option_text'] ?></label>
                    </div>
                    <?php
                }
                echo "<br>";
            }
        ?>
        <button type="submit">Submit</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>