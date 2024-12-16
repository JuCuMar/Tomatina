<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tomatina</title>
    <style>
        .mapa {
            display: grid;
            grid-template-columns: repeat(24, 24px);
            grid-template-rows: repeat(24, 24px);
            gap: 1px;
        }
        .casilla {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            width: 24px;
            height: 24px;
        }
        .tierra {
            background-color: #61ee06;
        }
        .urbano {
            background-color: #6a6a6a;
        }
        .mar {
            background-color: #33ffdd;
        }
        .impurb {
            background-color: #ee0606;
        }
        .mard {
            background-color: #060aee;
        }
        .nohabitado{
            background-color: #d5ee06;
        }
    </style> 
</head> 
<body> 
<?php 
    $pomodoroHaters = [ 
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '0', '0', 'A', '0', 'A', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', 'A', 'A', 'A', '0', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '0', '0', '0', 'A', '0', 'A', 'A', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '~'], 
        ['~', '~', '~', '~', '~', '~', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~'], 
        ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~'], 
        ['~', '~', '~', '~', '~', '0', '0', 'A', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~'], 
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~'], 
        ['~', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '0', 'A', '0', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', 'A', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', 'A', 'A', '0', '0', 'A', '0', '0', '0', '~', '~', '~'], 
        ['~', '~', '~', '~', '0', 'A', 'A', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', '0', '0', '0', '0', '0', 'A', '0', 'A', '0', '0', '0', '~'], 
        ['~', '~', '~', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '0', '0', '0', '0', 'A', '0', '0', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'], 
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'] 
    ]; 
    $impacts = [ 
        [20, 4], 
        [2, 13], 
        [13, 12], 
        [3, 17], 
        [2, 13], 
        [5, 19], 
        [6, 18], 
        [5, 2], 
        [20, 13], 
        [9, 7], 
        [5, 9], 
        [15, 16], 
        [16, 13], 
        [16, 9], 
        [16, 0], 
        [3, 19], 
        [19, 8], 
        [1, 16], 
        [18, 4], 
        [21, 23], 
        [7, 17], 
        [22, 15], 
        [21, 6], 
        [14, 8], 
        [12, 23], 
        [7, 7], 
        [22, 4], 
        [3, 21], 
        [2, 3], 
        [8, 11], 
        [0, 4], 
        [7, 21], 
        [11, 4], 
        [7, 15], 
        [6, 17], 
        [5, 19], 
        [4, 19],
        [4, 7], 
        [23, 21], 
        [15, 20], 
        [2, 9], 
        [21, 2], 
        [1, 13], 
        [7, 10], 
        [21, 5], 
        [13, 17], 
        [2, 14], 
        [11, 14], 
        [22, 17], 
        [18, 22], 
        [2, 23], 
        [3, 1], 
        [18, 6], 
        [17, 12], 
        [18, 18], 
        [20, 2], 
        [3, 14], 
        [11, 21], 
        [6, 5], 
        [6, 2], 
        [12, 23], 
        [18, 18], 
        [21, 6], 
        [10, 12], 
        [5, 4], 
        [16, 19], 
        [8, 10], 
        [12, 21], 
        [15, 1], 
        [20, 14], 
        [3, 20],
        [6, 19], 
        [20, 13], 
        [15, 4], 
        [10, 2], 
        [5, 16], 
        [20, 1], 
        [12, 13], 
        [11, 5], 
        [12, 14], 
        [8, 3], 
        [6, 8], 
        [19, 7], 
        [16, 9], 
        [13, 20], 
        [3, 5], 
        [1, 0], 
        [20, 14], 
        [12, 21], 
        [12, 16], 
        [15, 7], 
        [9, 1], 
        [1, 18], 
        [20, 6], 
        [8, 6], 
        [22, 1], 
        [10, 22], 
        [19, 19], 
        [7, 16], 
        [8, 8] 
    ];
    //ESCRIBE AQUÍ TU PROGRAMA PRINCIPAL 
    //Apartado 1 
    echo "MAPA ORIGINAL <br>";
    mostrarmapa($pomodoroHaters);

    //Apartado 2 
    nudañado($pomodoroHaters, $impacts); 
    mostrarmapa($pomodoroHaters); 

    //Apartado 3
   colirios($pomodoroHaters);

    //Apartado 4
    imptot($pomodoroHaters, $impacts); 
    mostrarmapa($pomodoroHaters); 

    //Apartado 5
   dañotot($pomodoroHaters);

   //Apartado6 (el ejercicio especifica que hagamos 2 funciones)
   martotal($pomodoroHaters);
   mardañado($pomodoroHaters);

   //Apartado7
   pescao($pomodoroHaters);
   
    //ESCRIBE AQUÍ LA DEFINICIÓN DE LAS FUNCIONES 
    //Apartado 1 
    function mostrarmapa($mapa){ 
        echo '<div class="mapa">';
        foreach ($mapa as $fila){ 
            foreach ($fila as $casilla){ 
                echo pintar($casilla);
            } 
        } 
        echo '</div>';
    } 

    //Apartado 2 
    function nudañado(&$mapa, $daños){ 
        echo "<br>MAPA CON IMPACTOS URBANOS <br>";

        foreach ($daños as $daño){ 
            $fila=$daño[0]; 
            $casilla= $daño[1]; 
            if ($mapa[$fila][$casilla]==='A') { 
            $mapa[$fila][$casilla]='C'; 
            } 
        } 
        return $mapa; 
    } 

    //Apartado 3
    function colirios($mapa){
     $personas = 0;
     $poblacion = 5000;
     $colirio = 25;
     foreach ($mapa as $fila){ 
        foreach($fila as $casilla){
            if ($casilla === 'C'){
                $personas ++;}
        }   
    }
    $pobtot = $poblacion * $personas;
    $colitot = ($colirio*$pobtot)/1000;
    echo "<br>HAY UN TOTAL DE: ".$pobtot." PERSONAS AFECTADAS <br>";
    echo "SE NECESITA UN TOTAL DE ".$colitot." litros DE COLIRIO <br>";
}

    //Apartado 4
    function imptot(&$mapa, $daños){ 
        echo"<br>MAPA CON IMPACTOS URBANOS, NO URBANOS Y MAR<br>";
        foreach ($daños as $daño){ 
            $fila=$daño[0]; 
            $casilla= $daño[1]; 
            if ($mapa[$fila][$casilla]==='0') { 
            $mapa[$fila][$casilla]='X';} 
            if ($mapa[$fila][$casilla]==='~') { 
                $mapa[$fila][$casilla]='S'; } 
        } 
        return $mapa; 
    } 

      //Apartado 5
      function dañotot($mapa){
        $nourbana = 50000;
        $urbana = 200000;
        $cont1 = 0;
        $cont2 = 0;
        foreach ($mapa as $fila){ 
           foreach($fila as $casilla){
               if ($casilla === 'C'){
                  $cont1++;}
               if ($casilla === 'X'){
                $cont2++;}
           }   
       }
       $dañototal= $nourbana*$cont2 + $urbana*$cont1;
       echo"<br>DAÑOS TOTALES<br>";
       echo "HA HABIDO UNOS DAÑOS TOTALEs DE: ".$dañototal. "Є<br>";
   }

    //Apartado 6
    function martotal($mapa){
        $tamaño = 1;
        $cont1 = 0;
        $cont2 = 0;
        foreach ($mapa as $fila){ 
           foreach($fila as $casilla){
               if ($casilla === '~'){
                  $cont1++;}
               if ($casilla === 'S'){
                $cont2++;}
           }   
       }
       $cont3 = $cont1+$cont2;
       $tamañototal= $tamaño*$cont3;
       echo "<br>EL MAR TIENE UN TAMAÑO TOTAL DE: ".$tamañototal . "km^2" ;
   }
   function mardañado($mapa){
    $cont1 = 0;
    foreach ($mapa as $fila){ 
       foreach($fila as $casilla){
           if ($casilla === 'S'){
            $cont1++;}
       }   
   }
   echo "<br>EL MAR TIENE UN TERRITORIO DAÑADO TOTAL DE: ".$cont1 . "km^2" ;
}

    //Apartado 7
    function pescao($mapa){
    $martotal = 299;
    $mardañado = 45;
    $bakalao = 2000;
    $bakalaototal = $bakalao*$mardañado/$martotal;
    $kilosbakalao = $bakalaototal*1000;
    $dinero = $kilosbakalao * 5;
    echo "<br>HAY UN TOTAL DE ". floor($bakalaototal) ." TONELADAS DE PESCADO"; 
    echo "<br>PODEMOS GANAR ". floor($dinero) ."Є VENDIDO PESCADO"; 
    }

    function pintar($casilla){
        $class = '';
        if ($casilla === '0') {
            $class = 'tierra';
        } elseif ($casilla === 'A') {
            $class = 'urbano';
        } elseif ($casilla === '~') {
            $class = 'mar';
        } elseif ($casilla === 'C') {
            $class = 'impurb';
        }elseif ($casilla === 'X') {
            $class = 'nohabitado';
        }elseif ($casilla === 'S') {
            $class = 'mard';
        }
        return '<div class="casilla ' . $class . '">' .$casilla.' </div>';
    }

?> 

</body> 

</html> 