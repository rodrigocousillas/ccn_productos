<?php 

function conectarDB() : mysqli {
    $db = new mysqli('localhost:3306', 'mlhnjrte_rodrigo', 'Gabriela1976!!', 'mlhnjrte_urro');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}