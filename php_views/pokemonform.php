<?php session_start();
/* if (!isset($_SESSION["pokedex"])) {
    $pokedex = [];
    echo "Creada pokedex";
  } else {
    $pokedex = $_SESSION["pokedex"];
    echo "Ya exsiste pokedex";
  }*/
if (!isset($_SESSION["msgError"])) {
    $msgError = "";
} else {
    $msgError = $_SESSION["msgError"];
}

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../styles/styleForm.css" rel="stylesheet" type="text/css">
    <title>Pokemon Form</title>
</head>

<body>
    <header>
        <!-- nav bar-->
        <?php include "../php_partials/menu.php"; ?>
    </header>

    <div class="card tarjeta">

        <div class="card-header">
            <img src="/pokedex/media/img/pokeball.png" width="26" height="24" class="d-inline-block align-text-top">
            <img src="/pokedex/media/img/pokemon.png" width="66" height="24" class="d-inline-block align-text-top">
        </div>
        <div class="card-body">
            <?php
            $pokemon = ""; //declaramso la variable pokemon vacia si no venimos de ningun error
            //Si el msg de error no est vacio es que hya un error por lo tanto cargaremos el alert del error
            if ($msgError != "") {
                include "../php_partials/msgError.php";
                if (isset($_SESSION['pokemon'])) { //si la variable de sesion pokemon exsiste significa que hemso tenido un erro por lo ke teneos un pokemon en "espera"
                    $pokemon = $_SESSION['pokemon']; //nos kedaremos conel pokemon aunke tenga algun error (ya exsiste o no tiene tipos puestos)       
                }
            }

            //me creo una funcion porque si hay un error queiro que se mantengan los datos en pantalla
            function mantenerDatos($msgError, $dato, $pokemon)
            {
                if ($msgError != "") {
                    echo $pokemon[$dato];
                } else {
                    echo "";
                }
            }

            function mantenerRegion($msgError, $region, $pokemon,$opcionRegion)
            {

                if ($msgError != "") {
                    switch ($pokemon[$region]) {
                        case 'Kanto':
                            if($opcionRegion==="1"){
                                echo " selected=\"true\"";
                            }                        
                            break;
                        case 'Jotho':
                            if($opcionRegion==="2"){
                                echo " selected=\"true\"";
                            }  
                            break;
                        case 'Hoenn':
                            if($opcionRegion==="3"){
                                echo " selected=\"true\"";
                            }  
                            break;
                        case 'Sinnoh':
                            if($opcionRegion==="4"){
                                echo " selected=\"true\"";
                            }  
                            break;
                        case 'Teselia':
                            if($opcionRegion==="5"){
                                echo " selected=\"true\"";
                            }  
                            break;

                        default:
                            
                            break;
                    }
                }


            }
            ?>

            <form action="../php_controllers/pokemonController.php" method="POST" enctype="multipart/form-data">

                <!--INPUT NUMERO-->
                <!--MAXIMO 3 NUMEROS; SOLO NUMEROS-->
                <div class="mb-3 row">
                    <label for="txtNumero" class="col-sm-2 col-form-label">
                        <p class="titulo">Número </p>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtNumero" id="txtNumero" placeholder="Número del pokémon" autofocus="autofocus" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required value="<?php mantenerDatos($msgError, 'numero', $pokemon) ?>">
                    </div>
                </div>

                <!--INPUT NOMBRE-->
                <div class="mb-3 row">
                    <label for="txtNombre" class="col-sm-2 col-form-label">
                        <p class="titulo">Nombre </p>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre del pokémon" required value="<?php mantenerDatos($msgError, 'nombre', $pokemon) ?>">
                    </div>
                </div>

                <!--COMBO BOX REGION-->
                <!--Kanto, Jotho, Hoenn, Sinnoh i Teselia-->
                <div class="mb-3 row">
                    <label for="cbRegion" class="col-sm-2 col-form-label">
                        <p class="titulo">Region </p>
                    </label>
                    <div class="col-sm-10">
                        <select name="cbRegion" class="form-select" id="cbRegion" aria-label="Default select example" required>
                         
                            <option value="1" <?php  mantenerRegion($msgError,'region',$pokemon,"1") ?>>Kanto</option>
                            <option value="2"  <?php  mantenerRegion($msgError,'region',$pokemon,"2") ?>>Jotho</option>
                            <option value="3"  <?php  mantenerRegion($msgError,'region',$pokemon,"3") ?>>Hoenn</option>
                            <option value="4"  <?php  mantenerRegion($msgError,'region',$pokemon,"4") ?>>Sinnoh</option>
                            <option value="5"  <?php  mantenerRegion($msgError,'region',$pokemon,"5") ?>>Teselia</option>
                        </select>
                    </div>
                </div>

                <!--CHECK BOX TIPO-->
                <!-- Planta, Veneno,Fuego, Volador, Agua, Eléctrico, Hada, Bicho, Lucha, Psíquico.-->
                <div class="mb-3 row">
                    <label for="cbTipo" class="col-sm-2 col-form-label">
                        <p class="titulo">Tipo </p>
                    </label>
                    <div class="col-sm-10">
                        <table class="tabla">

                            <tr>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxPlanta" value="Planta">
                                        <label class="form-check-label" for="chxPlanta">
                                            Planta
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxVeneno" value="Veneno">
                                        <label class="form-check-label" for="chxVeneno">
                                            Veneno
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxFuego" value="Fuego">
                                        <label class="form-check-label" for="chxFuego">
                                            Fuego
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxVolador" value="Volador">
                                        <label class="form-check-label" for="chxVolador">
                                            Volador
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxAgua" value="Agua">
                                        <label class="form-check-label" for="chxAgua">
                                            Agua
                                        </label>
                                    </div>
                                </td>

                            </tr>

                            <tr>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxElectrico" value="Electrico">
                                        <label class="form-check-label" for="chxElectrico">
                                            Eléctrico
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxHada" value="Hada">
                                        <label class="form-check-label" for="chxHada">
                                            Hada
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxBicho" value="Bicho">
                                        <label class="form-check-label" for="chxBicho">
                                            Bicho
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxLucha" value="Lucha">
                                        <label class="form-check-label" for="chxLucha">
                                            Lucha
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chxTipo[]" type="checkbox" id="chxPsiquico" value="Psiquico">
                                        <label class="form-check-label" for="chxPsiquico">
                                            Psiquico
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!--INPUT ALTURA-->
                <!--SOLO NUMEROS ALTURA MINIMA 1-->
                <div class="mb-3 row">
                    <label for="numberAltura" class="col-sm-2 col-form-label">
                        <p class="titulo">Altura </p>
                    </label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="number" class="form-control" name="numberAltura" id="numberAltura" placeholder="Altura del pokémon" min="1" required>
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                </div>

                <!--INPUT PESO-->
                <!--SOLO NUMEROS PESO NO PUEDE SER NEGATIVO Y CON 2 DECIMALES-->
                <div class="mb-3 row">
                    <label for="numberPeso" class="col-sm-2 col-form-label">
                        <p class="titulo">Peso </p>
                    </label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="number" class="form-control" name="numberPeso" id="numberPeso" placeholder="Peso del pokémon" step="0.01" min=0 required>
                            <span class="input-group-text">Kg</span>
                        </div>
                    </div>
                </div>

                <!--RADIO BUTTON EVOLUCION-->
                <!--Sense evolució, Primera evolución, Otras evoluciones.-->
                <div class="mb-3 row">
                    <label for="rbEvolucion" class="col-sm-2 col-form-label">
                        <p class="titulo">Evolucion </p>
                    </label>
                    <div class="col-sm-10">
                        <input type="radio" class="form-check-input" name="rbEvolucion" id="rbSinEvolucion" checked value="Sin evolucion">
                        <label for="rbSinEvolucion">Sin evolucion</label>
                        <input type="radio" class="form-check-input" name="rbEvolucion" id="rbPrimeraEvolucion" value="Primera evolucion">
                        <label for="rbPrimeraEvolucion">Primera evolucion</label>
                        <input type="radio" class="form-check-input" name="rbEvolucion" id="rbOtrasEvoluciones" value="Otras evoluciones">
                        <label for="rbOtrasEvoluciones">Otras evoluciones</label>
                    </div>
                </div>


                <!--SUBIR IMAGEN-->
                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label">
                        <p class="titulo">Imagen </p>
                    </label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-sm" name="imagen" id="imagen" required accept="image/jpg,image/png,image/jpeg">
                    </div>
                </div>

        </div>
        <!--BOTON SUBMIT-->

        <div class="card-footer micardfooter">
            <a class="btn btn-secondary" title="Cancelar" href="/pokedex/php_views/pokemon_list.php">Cancelar</a>
            <input type="submit" class="btn btn-primary" title="Aceptar" src="../php_controllers/pokemonController.php">Aceptar
        </div>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>