<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    class Corredor
    {
        public $nombre;
        public $codigo;
        public $carreras = [];

        public function __construct($nombre, $codigo, $carreras)
        {
            $this->nombre = $nombre;
            $this->codigo = $codigo;
            $this->carreras = $carreras;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getCodigo()
        {
            return $this->codigo;
        }

        public function setCodigo()
        {
            $this->codigo = $codigo;
        }

        public function getCarreras()
        {
            return $this->carreras;
        }

        public function setCarreras($carreras)
        {
            $this->carreas = $carreras;
        }

        public function anadirCarreras($timepo)
        {
            if($tiempo < 5)
                {
                    throw new Exception("La carrera no puede durarar menos de 5 segundos.");
                }

            if(count($this->carreras) >=5)
                {
                    throw new Exception("El corredor ya ha hecho 5 carreras.");
                }

            $this->carreras[] = $tiempo;
        }
    } 
    
    
    
    ?>
</body>
</html>