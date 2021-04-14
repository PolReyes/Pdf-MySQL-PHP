<?php

include_once('config.php');
$cnx = '';

#========== CONECTAR =============

function bd_connectar() {
  global $cfg; 
  global $cnx;
  $cnx = mysqli_connect($cfg['h'], $cfg['u'], $cfg['p'], $cfg['b'], $cfg['r']);
  mysqli_query($cnx, "set names utf8");
}

#========== CONSULTAR ============= 

function bd_consultar($sql) {
  global $cnx;
  $bolsa = mysqli_query($cnx, $sql);
  $salida = array();
  
  while ($row = mysqli_fetch_assoc($bolsa)) {
    $salida[] = $row;
  }
  
  mysqli_free_result($bolsa);
  unset($row);
  
  return $salida;
}

#=========== EJECUTAR =============

function bd_ejecutar($sql) {
  global $cnx;
  $exito = mysqli_query($cnx, $sql);
  if ($exito) {
    return true;
  } else {
    return false;
  }
}

#========= DESCONECTAR ============

function bd_desconectar() {
  global $cnx;
  mysqli_close($cnx);
}


#======== LIMPIAR TEXTO ==========

function limpiar($cadena) {
    $salida=strtoupper(trim($cadena));
    while (strpos($salida, '  ')>0) {
        $salida=str_replace('  ', ' ', $salida);
    }
    return $salida;
}

