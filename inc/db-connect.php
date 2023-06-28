<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=php_gaestebuch', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //! ERRMODE_EXCEPTION bei Syntaxfehlern wird ein fatal Error geworfen 
    ]);
} 
catch(PDOException $error) {
    echo 'Probleme mit der Datenbankverbindung...';
    die(); //! Damit wird die gesamte Ausführung von PHP beendet!
}