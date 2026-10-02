<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    require_once "Corredor.php";

    class Competicion
    {
        public $corredores = [];

        public function __construct()
        {
            $this->corredores = [];
        }

        public function getCorredores()
        {
            return $this->corredores;
        }

        public function setCorredores($corredores)
        {
            $this->corredores = $corredores;
        }

        public function anadirCorredor($corredor)
        {
            $this->corredores[$corredor->getCodigo()] = $corredor;
        }

        public function anadirCarreraACorreores($codigo, $tiempo)
        {
            if(!isset($this->corredores[$codigo]))
            {
                throw new Exception("No existe ningun corredor con el codigo $codigo");
            }

            $this->corredores[$codigo]->anadirCarrera($tiempo); 
        }

        public function calcularMediaPrimeraCarrera()
        {
            $suma = 0;
            $cantidad = 0;

            foreach($this->corredores as $corredor)
                {
                    $carreras = $corredor->getCarreras();

                    if(count($carreras) > 0)
                        {
                            $suma += $carreras[0];
                            $cantidad++;
                        }
                }

            if($cantidad === 0)
            {
                return 0;
            }

            return $suma / $cantidad;
        }

        public function obtenerCorredorCarreraMasRapida()
        {
            $corredorRapido = null;
            $tiempoRapido = PHP_FLOAT_MAX;

            foreach($this->corredores as $corredor)
                {
                    foreach($corredor->getCarreras() as $tiempo)
                        {
                            if($tiempo < $tiempoRapido)
                                {
                                    $tiempoRapido = $tiempo;
                                    $corredorRapido = $corredor;
                                }
                        }
                }

                return $corredorRapido;
        }

        public function obtenerCorredorMasDe15Segundos()
        {
            $resultado = [];

            foreach($this->corredores as $corredor)
                {
                    $cantidad = 0;
                }

            foreach($corredor->getCarreras() as $tiempo)
                {
                    if($tiempo > 15)
                        {
                            $cantidad++;
                        }
                }

            if($cantidad > 2)
                {
                    $resultado = $corredor->getNombre();
                }

                return $resultado;
        }

        public function obtenerCorredoresNombreTerminaEnE()
        {
            $resultado = [];

            foreach($this->corredores as $corredor)
                {
                    $nombre = $corredor->getNombre();

                    if(str_ends_with(strtolower($nombre), "e"))
                        {
                            $resultado[] = $corredor;
                        }
                }

                return $resultado;
        }
        
    }

    ?>
</body>
</html>