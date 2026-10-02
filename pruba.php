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

        echo "<h2>Corredores</h2>";

        foreach ($competicion->getCorredores() as $corredor) {
            echo "<strong>";
            echo $corredor->getNombre();
            echo " (" . $corredor->getCodigo() . ")";
            echo "</strong><br>";

            echo "Carreras: ";

            foreach ($corredor->getCarreras() as $tiempo) {
                echo $tiempo . " segundos ";
            }

            echo "<br><br>";
        }

                // Tiempo medio de la primera carrera
                $media = $competicion->calcularMediaPrimeraCarrera();

                echo "<h2>Resultados</h2>";

                echo "Tiempo medio de la primera carrera: " . number_format($media, 2) . " segundos<br>";


                // Corredor con la carrera más rápida
                $corredorRapido = $competicion->obtenerCorredorCarreraMasRapida();

                if ($corredorRapido !== null) {
                    $tiempoRapido = min($corredorRapido->getCarreras());

                    echo "Corredor con la carrera más rápida: " . $corredorRapido->getNombre() . " (" . $tiempoRapido . " segundos)<br>";
                }

        //Corredores con más de 15 segundos en más de 2 carreras
        $corredoresMas15 = $competicion->obtenerCorredorMasDe15Segundos();

        echo "Corredores con tiempos de más de 15 segundos en más de 2 carreras:<br>";

        if (count($corredoresMas15) > 0) {
            foreach ($corredoresMas15 as $nombre) {
                echo "- " . $nombre . "<br>";
            }
        } else {
            echo "Ninguno<br>";
        }


        //Corredores cuyo nombre termina en "e"
        $corredoresTerminanE = $competicion->obtenerCorredoresNombreTerminaEnE();

        echo "Corredores que su nombre termina en 'e':<br>";

        if (count($corredoresTerminanE) > 0) {
            foreach ($corredoresTerminanE as $corredor) {
                echo "- " . $corredor->getNombre() . "<br>";
            }
        } else {
            echo "Ninguno<br>";
        }
    
    ?>
    
</body>
</html>