<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Add</title>
</head>
<body>
    <form action="/UserA" method="POST">
        <input type="text" id="lastname" name="lastname" placeholder="lastname" />
        <input type="text" id="firstname" name="firstname" placeholder="firstname" />
        <input type="email" id="mail" name="mail" placeholder="mail" />
        <input type="password" id="password" name="password" placeholder="password" />
        <input type="number" id="age" name="age" placeholder="age" />
        
        <input type="submit" value="Ajouter un user" />
    </form>
</body>
</html>
