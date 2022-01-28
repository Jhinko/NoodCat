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
    <form action=<?="/UserM/$sId"?> method="POST">
        <input type="text" id="lastname" name="lastname" <?= $mUser->getLastname()?> />
        <input type="text" id="firstname" name="firstname" <?= $mUser->getFirstname()?> />
        <input type="email" id="mail" name="mail" <?= $mUser->getEmail()?> />
        <input type="password" id="password" name="password" <?= $mUser->getPassword()?> />
        <input type="number" id="age" name="age" <?= $mUser->getAge()?> />
        
        <input type="submit" value="Ajouter un user" />
    </form>
</body>
</html>
