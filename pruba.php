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
    require_once "Corredor.php";

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
            $corredor = new Corredor($nombre, $codigo, $numeroCarreras);
            $competicion->anadirCorredor($corredor);

            $competicion->anadirCorredor($corredor);
            $competicion->anadirCarreraACorreores($codigo, $tiempo);
        }

        $corredores = $competicion->getCorredores();    

        for($i = 0; $i < count($corredores); $i++)
            {
                $corredor = $corredores[$i];

                echo "<strong>";
                echo $corredor->getNombre() . " | Codigo:". $corredor->getCodigo() . " | Numero de Carreras: " ;
                echo "</strong><br>";

                echo "Carreras: ";

            $carreras = $corredor->getCarreras();

            for ($j = 0; $j < count($carreras); $j++) {
                echo $carreras[$j] . " segundos ";
            }
            }
    
    ?>
    
</body>
</html>