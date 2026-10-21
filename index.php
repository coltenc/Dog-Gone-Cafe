<?php
$dsn = 'mysql:host=localhost;dbname=dog_gone_cafe;charset=utf8mb4';
$username = 'root';
$password = '';

try{
  $db = new PDO($dsn, $username, $password);
  echo("Successfully linked to database");
} catch(PDOException $e){
    echo($e->getMessage());
    exit();
}

$sqlHuman = 'SELECT * FROM human_menu';

$stmt = $db->query($sqlHuman);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rowCount = count($rows);

if($rows != null){
  echo '<h1>Human Menu</h1>';
  for($i = 0; $i < $rowCount; $i++){
    echo '<div class="menu-item">';
    echo '<h2>' . $rows[$i]['Item'] . '</h2>';
    echo '<p>' . $rows[$i]['Description'] . '</p>';
    echo '<p>Price: $' . $rows[$i]['Price'] . '</p>';
    echo '</div>';
  }
} else{
  echo '<p>No menu items found.</p>';
}



$sqlDog = 'SELECT * FROM dog_menu';

$stmt = $db->query($sqlDog);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rowCount = count($rows);

if($rows != null){
  echo '<br><br><h1>Dog Menu</h1>';
  for($i = 0; $i < $rowCount; $i++){
    echo '<div class="menu-item">';
    echo '<h2>' . $rows[$i]['Item'] . '</h2>';
    echo '<p>' . $rows[$i]['Description'] . '</p>';
    echo '<p>Price: $' . $rows[$i]['Price'] . '</p>';
    echo '</div>';
  }
} else{
  echo '<p>No menu items found.</p>';
}

?>

+