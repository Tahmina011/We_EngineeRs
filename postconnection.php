<?php
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=accounts', 'root', '');
     
} catch (PDOException $e) {
    print "Connetion Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
