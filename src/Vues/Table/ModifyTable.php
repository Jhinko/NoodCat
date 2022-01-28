<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Modify</title>
</head>
<body>
    <form action=<?= "/TableM/$sId"?> method="POST">
        <input type="number" name="num_place"  value="<?php echo $mTableReserv->getNum_place()?>">
        <input type="number" name="num_pad"  value="<?php echo $mTableReserv->getNum_pad()?>">
        <input type="submit" value="Modifier la table">
    </form>
</body>
</html>