<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="/CustomerA">
        <label for="email">EMAIL:</label>
        <input name="email" type="email" required />

        <label for="password">PASSWORD:</label>
        <input name="password" type="password" required />

        <label for="lastname">LASTNAME:</label>
        <input name="lastname" type="text" required />

        <label for="firstname">FIRSTNAME:</label>
        <input name="firstname" type="text" required />

        <label for="age">AGE:</label>
        <input name="age" type="number" required />

        <input type="submit" value="Add" />
</body>
</html>