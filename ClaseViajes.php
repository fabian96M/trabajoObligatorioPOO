<?php
 class Viajes{
private $codigoViaje = " ";
private $destino = " ";
private $maximoPasajeros = 0;
private $cantPasajeros= 0;
private $pasajeros = [];

/**
 * funcion construct que recibe los atributos por parametro para asociarlos a variables objeto
 */
public function __construct($codV, $dest, $maxP, $cantP, $pasj)
{
    $this->codigoViaje = $codV;
    $this->destino = $dest;
    $this->maximoPasajeros = $maxP;
    $this->cantPasajeros = $cantP;
    $this->pasajeros = $pasj;
}
//funciones get 
function getCodigoViaje(){
    return $this->codigoViaje;
}
function getDestino(){
    return $this->destino;
}
function getMaximoPasajeros(){
    return $this->maximoPasajeros;
}
function getCantPasajeros(){
    return $this->cantPasajeros;
}
function getPasajeros(){
    return $this->pasajeros;
}

//funciones set
function setCodigoViaje($codigoV){
$this->codigoViaje = $codigoV;
}
function setDestino($destinoV){
$this->destino = $destinoV;
}
function setMaximoPasajeros($maxPas){
$this->maximoPasajeros = $maxPas;
}
function setCantPasajeros($cantPas){
    $this->cantPasajeros = $cantPas;
}
//funcion para modificar una coleccion de pasajeros
function setPasajeros($pasaj){
    $this->pasajeros = $pasaj;
}
//funcion para modificar el arreglo asociativo de los datos de un pasajero especificado por su indice posicion
function setPasajero($pasajer, $posicion){
    $this->pasajeros[$posicion] = $pasajer ;
}

function __toString()
{
    return("CODIGO DE VIAJE: ".$this->getCodigoViaje()."\n DESTINO: ".$this->getDestino()."\n MAXIMO DE PASAJEROS: ".$this-> getMaximoPasajeros()."\n CANTIDAD DE PASAJEROS: ".$this->getCantPasajeros()."\n DATOS DE PASAJEROS: ".$this->mostrarPasajeros()."\n");
}
/**  realiza un recorrido exahustivo de un arreglo de pasajeros y escribe los datos correspondientes a cada posicion 
 * @return string
*/
function mostrarPasajeros(){
    $tamaño = count($this->pasajeros);
    for($i=0;$i<$tamaño;$i++){
        echo ("PASAJERO NUMERO ". $i+1 ." \n
               nombre: " .$this->pasajeros[$i]["nombre"] ."\n
               apellido: " .$this->pasajeros[$i]["apellido"] ."\n
               documento: " .$this->pasajeros[$i]["documento"] ."\n ");
    }
}
 }
