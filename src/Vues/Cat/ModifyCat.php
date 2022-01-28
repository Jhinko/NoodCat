<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page modify Cat </title>

    <style>
        #form_controller {
            /* mise en forme formulaire*/
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            line-height: 3em;
        }

        .radius {
            border-radius: 10px;

        }
    </style>


</head>

<body>
    <div>
        <?php
        if (array_key_exists("error", $_SESSION)) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        } ?>
    </div>



    <form action="/CatM/:id" method="POST" id="form_controller">
        <label for="id">Id: </label>
        <input type="int" name="id" id="id" class="radius">

        <label for="name">Name bar </label>
        <input type="text" name="name" id="name" class="radius">

        <label for="num_chip">Chip number </label>
        <input type="text" name="num_chip" id="num_chip" class="radius">

        <input type="submit" value="SAVE MODIFICATION" class="radius">
    </form>
</body>

</html>

