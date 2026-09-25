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

        public function __construct($corredores)
        {
            $this->corredores = $corredores;
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

            $this->corredores[$codigo] = anadirCarrera($tiempo); 
        }

        public function calcularMediaPrimerCarrera()
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


        
    }

    ?>
</body>
</html>