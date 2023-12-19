<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../styles/stylelist.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" <title>Pokemon List</title>
</head>

<body>
    <header>
        <!-- nav bar-->
        <?php

        include "../php_partials/menu.php";
        include("../php_library/pokedex.php");

        ?>

    </header>
    <?php
    $pokedex = $_SESSION["pokedex"];
    //mostrarTodaPokedex($_SESSION["pokedex"]);
    $msgCorrecto = $_SESSION["msgCorrecto"];
    $msgError = $_SESSION["msgError"];

    if ($msgError != "") {
        include "../php_partials/msgError.php";
    }

    if ($msgCorrecto != "") {
        include "../php_partials/msgCorrecto.php";
    }

    //si volvemos del form con un pokemon lo borraremos 
    if(isset($_SESSION['pokemon'])){
     $_SESSION['pokemon']="";       
    }

    ?>
    <div class="contenedorprincipal">


        <div clas="container-fluid">
            <div class="row row-cols-1 row-cols-md-5 g-4">

                <?php foreach ($pokedex as $pokemon) { ?>
                    <div class="col">
                        <div class="card micard">
                            <img src="<?php echo $pokemon['imagen'] ?>" class="card-img-top" alt="imagen pokemon">
                            <div class="card-body">
                                <h5 class="card-title"><b><label id="nombre"><?php echo $pokemon['numero'] ?>- <?php echo $pokemon['nombre'] ?></label> </b></h5>
                                <?php foreach ($pokemon['tipo'] as $tipo) { ?>
                                    <span class="badge bg-warning text-dark"><?php echo $tipo ?></span>
                                <?php } ?>
                            </div>
                            <div class="card-footer micardfooter">
                                <form>
                                    <button type="submit" class="btn btn-outline-danger" title="Borrar Pokémon"><i class="fas fa-trash"></i></button>
                                    <button type="submit" class="btn btn-outline-primary" title="Editar Pokémon"><i class="fas fa-edit"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>



    <?php
    /*  ------------CORREGIDOS LOS ERRORES DE LA FASE 1---------------------------*/
    $pokedex = [];
  
    $pokemonNuevo = createPokemon("001", "Bulvasaur", "Hoen", ["planta", "veneno"], 70, 6.9, "sense evolucionar", "001.png");
    addPokemon($pokedex, $pokemonNuevo);
    mostrarPokemon($pokemonNuevo);
    $pokemonNuevo = createPokemon("001", "Bulvasaur", "Hoen", ["planta", "veneno"], 70, 6.9, "sense evolucionar", "001.png");//mismo pokemon
    addPokemon($pokedex, $pokemonNuevo);//no tiene que añadir porque ya exsiste

    $pokemonNuevo = createPokemon("002", "Ivisaur", "Hoen", ["planta", "veneno"], 72, 7.4, "priemra evolucion", "002.png");
    addPokemon($pokedex, $pokemonNuevo);

    mostrarTodaPokedex($pokedex)
    
    ?>

    <a href="pokemonform.php" class="btn-flotante" title="Añadir Pokémon"><i class="fas fa-plus"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>