<?php
    function fechaCastellano() {
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
    }

    function factorial($num) {
        $factorial = $num;
        $total = 1;
        echo $num. "! = ";
        while($factorial != 1) {
            echo $factorial . " * ";
            $total = $factorial * $total;
            $factorial--;
        } 
        echo "1 = ". $total;
    }

    function multiplicar($num) {
        for($i = 1; $i < 11; $i++) {
            echo "$num * $i = ". $num * $i . "<br/>";
        }
    }

    function calcularPrecio($num) {
        if($num >= 100 && $num <= 500) {
            echo "Precion inicial: " . $num . "<br/>";
            echo "Se aplica un descuento del 10%<br/>";
            $resta = $num * 10 / 100;
            $num = $num - $resta;
            return "Precio final: " . $num;
        }
        elseif($num > 500) {
            echo "Precion inicial: " . $num . "<br/>";
            echo "Se aplica un descuento del 15%<br/>";
            $resta = $num * 15 / 100;
            $num = $num - $resta;
            return "Precio final: " . $num;
        }
        else {
            echo "Precio inicial: " . $num . "<br/>";
            echo "No se aplica ningún descuento <br/>";
            return "Precion final: " . $num;
        }
    }
?>