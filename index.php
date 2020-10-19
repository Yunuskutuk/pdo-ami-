<?php

require_once 'connect.php';
$pdo = new PDO(DSN, USER, PASS);

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$query = "INSERT INTO friend (firstname, lastname) VALUES ('$firstname', '$lastname')";
$pdo->exec($query);

$statement = $pdo->prepare('SELECT * FROM friend');
$executeOk = $statement->execute();
$friend = $statement->fetchAll();


?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Les données</title>
</head>
<body>
<ul>
    <?php foreach ($friend as $value): ?>
    <li>
        <?= $value['firstname']?> <?= $value['lastname']?>
        <?php endforeach;?>
    </li>
</ul>

<form action="index.php" method="post">
    <div>
        <label for="firstname">Nom :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div>
        <label for="lastname">Prenom :</label>
        <input type="text" id="lastname" name="user_lastname">
    </div>
    <div class="button">
        <button type="submit">Envoyer le message</button>
    </div>
</form>
</body>
</html>