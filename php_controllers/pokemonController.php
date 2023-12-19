<?php session_start();
if (!isset($_SESSION["pokedex"])) {
  $pokedex = [];
  echo "Creada pokedex";
} else {
  $pokedex = $_SESSION["pokedex"];
  echo "Ya exsiste pokedex";
}
require "../php_library/pokedex.php";

$numero = isset($_POST['txtNumero']) ? $_POST['txtNumero'] : '';
$nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$region = isset($_POST['cbRegion']) ? $_POST['cbRegion'] : '';
$tipo = isset($_POST['chxTipo']) ? $_POST['chxTipo'] : '';
$altura = isset($_POST['numberAltura']) ? $_POST['numberAltura'] : '';
$peso = isset($_POST['numberPeso']) ? $_POST['numberPeso'] : '';
$evolucion = isset($_POST['rbEvolucion']) ? $_POST['rbEvolucion'] : '';
//$img = isset($_FILES['imagen']['name']) ? "../media/img/fotospokemon/" . $_FILES['imagen']['name']  : '';


$fileName = $_FILES['imagen']['name'];
$tempName = $_FILES['imagen']['tmp_name'];

//movemos la imagen a nuestra carpeta del proyecto
if (isset($fileName)) {
  if (!empty($fileName)) {
    $location = "../media/img/fotospokemon/";
    if (move_uploaded_file($tempName, $location . $fileName)) {
      //echo("Fichero cambiado a mi directorio") ;
    }
  }
}
$path = $location . $fileName; //ruta donde esta mi imagen en este momento
$extension = pathinfo($path, PATHINFO_EXTENSION); //obtengo la extension
//comprovamos si la extension es jpj png o jpeg
if ($extension === "jpg" || $extension === "png" || $extension === "jpeg") {

  $nombreFinalImg = $location . $numero . "." . $extension; //creo el nombre final que tendra mi imagen
  rename($path, $nombreFinalImg); //renombro la foto con el nombre del pokemon
  //CRAMOS EL POKEMON
  $pokemon = createPokemon($numero, $nombre, $region, $tipo, $altura, $peso, $evolucion, $nombreFinalImg);
  $_SESSION["pokemon"]=$pokemon;
  //añadimos el pokemon al array
  addPokemon($pokedex, $pokemon);
  if ($_SESSION["msgError"] === "") {
    //Si no hay mensage de error volvemos a la pagina pokemon list
    $_SESSION['pokedex'] = $pokedex;
    header('Location: ../php_views/pokemon_list.php');
  } else {
    //si hay error volvemos a la pagina del formulario
    header('Location: ../php_views/pokemonform.php');
  }



  //mostrarPokemon($pokemon);

  //mostrarTodaPokedex($_SESSION["pokedex"]);


} else {
  //el formato no es compatible volveremso a pokemon form.
  $_SESSION["msgError"] = "Formato de archivo no compatible. Escoja un archivo .jpg .png o .jpeg";
  header('Location: ../php_views/pokemonform.php');
}








 

 
 /*
if($numero==="" || $nombre==="" || $region==="" || $tipo=== "" || $altura==="" || $peso==="" || $evolucion==="" || $img===""){
  $_SESSION["msg"]="Error faltan campos";
  echo "ERROOORR!!!!";
}
else{
 
}*/
