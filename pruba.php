<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    require_once "Competicion.php";
    require_once "Corerdor.php";

    $competicion = new Competicion();

    //Nombre corredores
    $nombres = 
    [
        "June",
        "Marcos",
        "Mario",
        "Dani",
        "Ana",
        "Rafael",
        "Alex",
        "Marta",
        "Espe"
    ];

    //Crear corredores
    for($i = 0; $i < count($nombres); $i++)
        {
            $nombre = $nombres[$i];
            $codigo = $i;
            $numeroCarreras = random_int(1, 5);
            $tiempo = random_int(5, 30);
            $corredor = new Corredor($nombre, $codigo, $numero);

            $competicion->anadirCorredor($corredor);
            $competicion->añadirCarreraACorredor($codigo, $tiempo);
        }
    
    ?>
    
</body>
</html>