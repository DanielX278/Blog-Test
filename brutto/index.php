<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
$username = 'root';
$password = '';

try {

    $pdo = new PDO('mysql:host=localhost;dbname=ped-academy', $username, $password);
    echo "ciao </br>" . PHP_EOL;
    $pdo = new PDO(
        'mysql:host=localhost;dbname=ped-academy',
        $username,
        $password
    );
    $rows = $pdo->query('SELECT id, title, content, creation_date from post');

   
   
    
}
 catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$statement = $pdo->prepare("SELECT * FROM post WHERE id=:id");
$statement ->bindParam(':id', $id);
$statement ->execute();
$data = $statement->fetchAll();

$query = <<<EOT
INSERT INTO post (
title,
content,
creation_date)
VALUES (
'insert with exec',
'using exec function to insert a row to db',
NOW()
)
EOT;

$count = $pdo->exec($query);
$statement = $pdo->prepare("INSERT INTO post (title, content, creation_date) VALUES (:title, :content, NOW())");
// 2.binding dei parametri
$statement->bindParam(':title', $title);
$statement->bindParam(':content', $content);
// 3.esecuzione della query
$statement->execute();
// 4.return last inserted id
$lastId = $pdo->lastInsertId();
echo $lastId;



$item = $rows->fetchAll()
?>
</br>
<table  class="table table-striped">
 <?php foreach ($item as $item) { ?>
<tr>
    <td> <?= $item['id']?> </td>
    <td> <?= $item['title']?> </td>
    <td> <?= $item['content']?> </td>
    <td> <?= $item['creation_date']?> </td>
</tr>
<?php } ?>
</table>


</body>
</html>



