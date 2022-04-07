<?php
require_once("ClaseViajes.php");
/**
 * definimos variables para preinstanciar un viaje
 */
$viajes = [];
$eleccion = -1;
$codigoViaje = " abc123";
$destinoViaje = " Chos Malal";
$maximoPasajeros= 20;
$cantidadPasajeros= 4;
$pasajeros[0]=["nombre"=>"Ricardo", "apellido"=>"Gonzalez","documento"=>39803874];
$pasajeros[1]=["nombre"=>"Ricardo", "apellido"=>"peralta","documento"=>39867455];
$pasajeros[2]=["nombre"=>"Ricardo", "apellido"=>"quipildor","documento"=>39829476];
$pasajeros[3]=["nombre"=>"Ricardo", "apellido"=>"Rios","documento"=>39897469];
//asignamos las variables por parametro para crear el objeto viaje1
$viaje1 = new Viajes($codigoViaje,$destinoViaje,$maximoPasajeros, $cantidadPasajeros, $pasajeros);
$viajes[0] = $viaje1;
while($eleccion <> 0){
//despliega menu de opciones
menuOpciones();
//recibimos la entrada y operamos segun sea la eleccion
$eleccion = evaluarRespuesta();
if($eleccion == 1){
//cargar un nuevo viaje
$viajes = cargaViaje($viajes);
}
elseif($eleccion == 2){
//modificar un viaje
echo("indique el numero de viaje que desea modificar \n");
$posicionCarga = trim(fgets(STDIN));
modificaViaje($viajes[$posicionCarga-1]);
}
elseif($eleccion == 3){
//visualizar los datos de los viajes cargados
verViaje($viajes);    
}
}

////////////////////////////////////////////////////////////////////////////

/**
 * este menu de opciones presenta tres opciones al usuario por pantalla
 */
function menuOpciones(){
echo(" a continuacion por favor ingrese el numero de acuerdo a su eleccion \n
1) Para cargar informacion de un viaje \n
2) Para modificar un viaje \n
3) Para ver los datos de los viajes cargados \n
0) Para terminar\n
");

}
////////////////////////////////////////////////////////////////////////////
/**
 * recibe un numero y verifica que sea 1,2 o 3 para devolver dicho numero
 * @param int $numElecto
 * @return int
 */
function evaluarRespuesta(){
    $numero = 0;
    $numInvalido = true;
    while($numInvalido){
        //se solicitara el numero dentro del bucle hasta que ingrese un numero valido
    $numero = trim(fgets(STDIN));
    //se evalua que el numero sea distinto a 0, 1, 2 o 3
    if($numero<0 || $numero > 3){
    echo("por favor escriba un numero valido \n ");
    } 
    else{
        $numInvalido = false;
    }
    //se retornara el numero que logre pasar el filtro del bucle
    }
     return $numero;
}
////////////////////////////////////////////////////////////////////////////
    /**
     * 
     * @param array $colViajes;
     * @return array
     */
    function cargaViaje($colViajes){
        $cantViajes = 0;
        $cantPasajeros = 0;
        $codViaje = "";
        //solicita la cantidad de viajes a ingresar
    echo("¿cuantos viajes desea ingresar?\n");
    $cantViajes = trim(fgets(STDIN));
    //define el ciclo de acuerdo a la cantidad de viajes
    for($i=0;$i<$cantViajes;$i++){
        echo("por favor ingrese el codigo de viaje \n " );
        $codViaje = trim(fgets(STDIN));
        echo("por favor ingrese el destino \n ");
        $destino = trim(fgets(STDIN));
        echo("por favor ingrese el maximo de pasajeros \n ");
        $maxPas = trim(fgets(STDIN));
        echo("por favor ingrese el numero de pasajeros \n ");
        $cantPasajeros = trim(fgets(STDIN));
        //define el ciclo deacuerdo al numero de pasajeros
        for($j=0;$j<$cantPasajeros;$j++){
            echo("por favor ingrese el nombre del pasajero numero ".$j+1 ." \n");
            $nombrePas= trim(fgets(STDIN));
            echo("por favor ingrese el apellido del pasajero numero ".$j+1 ." \n");
            $apellidoPas= trim(fgets(STDIN));
            echo("por favor ingrese el documento del pasajero numero ".$j+1 ." \n");
            $documentoPas= trim(fgets(STDIN));
            $arregloPasajeros = cargarDatosPasajero($nombrePas, $apellidoPas, $documentoPas);
        }
        //detecta la posicion libre de la coleccion de viajes usando count y crea un nuevo objeto viaje para asignarlo a dicha posicion
        $viajeNuevo = new Viajes($codViaje, $destino, $maxPas, $cantPasajeros,$arregloPasajeros);
        $posicionLibre = count($colViajes);
        $colViajes[$posicionLibre] = $viajeNuevo;
        
    }
    return $colViajes;
    ////////////////////////////////////////////////////////////////////////////
    }
    /**
     * esta funcion recibe por parametro un objeto viaje para modificar sus atributos
     * @param $viaje
     */
    function modificaViaje($viaje){
        $numeroEleccion = 0;
    while($numeroEleccion<1 || $numeroEleccion> 5){
        echo(" ingrese numero del atributo que quiera modificar \n
    1) para modificar el codigo de viaje \n
    2) para modificar el destino de viaje \n
    3) para modificar el maximo de pasajeros \n
    4) para modificar la cantidad de pasajeros \n 
    5) para modificar los datos de un pasajero \n");
    $numeroEleccion = trim(fgetc(STDIN));    
    }
    if($numeroEleccion == 1){
     //para modificar el codigo de viaje 
     echo("ingrese un nuevo codigo de viaje \n");
     $viaje-> setCodigoViaje(trim(fgets(STDIN)));
    }
    elseif($numeroEleccion == 2){
    //para modificar el destino
    echo("ingrese un nuevo destino \n");
    $viaje->setDestino(trim(fgets(STDIN))); 
    }
    elseif($numeroEleccion == 3){
    //para modificar el maximo de pasajeros
    echo("ingrese la nueva cantidad maxima de pasajeros \n");
    $viaje->setMaximoPasajeros(trim(fgets(STDIN))); 
    }
    elseif($numeroEleccion == 4){
    //para modificar el numero de pasajeros
    echo("ingrese la nueva cantidad de pasajeros \n");
    $viaje->setCantPasajeros(trim(fgets(STDIN)));
    }
    elseif($numeroEleccion == 5){
    //para modificar los datos de un pasajero
    echo("ingrese el numero del pasajero a modificar \n");
    $numPasajero = trim(fgets(STDIN));
    ("ingrese el nombre del pasajero".$numPasajero ."\n");
    $nombrePasajero = trim(fgets(STDIN));
    ("ingrese el apellido del pasajero".$numPasajero ."\n");
    $apellidoPasajero = trim(fgets(STDIN));
    ("ingrese el documento del pasajero".$numPasajero ."\n");
    $documentoPasajero = trim(fgets(STDIN));
    $pasajeroNuevo = cargarDatosPasajero($nombrePasajero, $apellidoPasajero,$documentoPasajero);
    $viaje->setPasajero($pasajeroNuevo, $numPasajero-1);
    }
}
    
////////////////////////////////////////////////////////////////////////////
/** Esta función permite cargar los datos de un pasajero en un arreglo asociativo, retorna un arreglo cargado
 * @param String $nombre
 * @param String $apellido
 * @param int $dni
 * @return array $pasajero
 */
function cargarDatosPasajero($nombre, $apellido, $dni ){
    $pasajero = [];
    $pasajero = ["nombre"=>$nombre,"apellido"=>$apellido,"documento"=>$dni ];
    return $pasajero;
}
////////////////////////////////////////////////////////////////////////////
/**
 * esta funcion retorna por pantalla los datos de los viajes cargados
 * @param array $arregloViajes
 */
function verViaje($arregloViajes){
    //inspeccionamos el arreglo de viajes dentro de un bucle repetitivo
    for($i=0;$i<count($arregloViajes);$i++){
        //numero viaje
        echo("viajes cargados = ".count($arregloViajes)."\n");
        echo("// VIAJE Nro :".$i+1 ."\n");
        echo $arregloViajes[$i];
        
    }

}