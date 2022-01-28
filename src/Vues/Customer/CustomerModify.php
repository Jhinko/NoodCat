<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Airport</title>
</head>
<body>
    <form method="POST" action='<?="/CustomerM/$id"?>'>
    <label for="email">EMAIL:</label>
        <input name="email" type="email" value="<?php echo $PayMaster->setMail() ?>" required />

        <label for="password">PASSWORD:</label>
        <input name="password" type="password" value="<?php echo $PayMaster->setPassword() ?>" required />

        <label for="lastname">LASTNAME:</label>
        <input name="lastname" type="text" value="<?php echo $PayMaster->setLastname() ?>" required />

        <label for="firstname">FIRSTNAME:</label>
        <input name="firstname" type="text" value="<?php echo $PayMaster->setFirstname() ?>" required />

        <label for="age">AGE:</label>
        <input name="age" type="number" value="<?php echo $PayMaster->setAge() ?>" required />

        <input type="submit" value="Modify" />
    </form>
</body>
</html>