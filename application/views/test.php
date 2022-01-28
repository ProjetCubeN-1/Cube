<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $host = "localhost:8889";
    $username = "root";
    $password = "root";
    $database = "cube";
    
    $mysqli = new mysqli($host, $username, $password, $database);
    //préparer la requête d'insertion SQL
    $req = sprintf(
        "SELECT * FROM user"
    );
    
    $mysqli->query($req);
$query = $this->db->get('user');
foreach($query->result() as $resultat)
{
    echo "ID : ".$resultat->id;
    echo "email : ".$resultat->mail;
}
    ?>
</body>

</html>