
<?php

/*Crear pokémon.
      Donat el número, el nom, la regió, els tipus, l’alçada, el pes, l’evolució, i la imatge 
      ha de retorna un array associatiu amb tota la informació del pokémon 
    */

function createPokemon($numero, $nombre, $region, $tipo, $altura, $peso, $evolucion, $imagen)
{
    $pokemon = array(
        "numero" => $numero,
        "nombre" => $nombre,
        "region" => $region,
        "tipo" => $tipo,
        "altura" => $altura,
        "peso" => $peso,
        "evolucion" => $evolucion,
        "imagen" => $imagen
    );

    return $pokemon;
}

/*Buscar pokémon per número.
Donada una pokédex i el número d’un pokémon, retorna la posició on es troba el pokémon.
En cas de no trobar el pokémon, s’ha de retornar un -1.
*/

function mostrarIndice($pokedex, $numero)
{
    $i = 0;
    $indice = -1;

    $encontrado = false;

    while ($i < count($pokedex) && $encontrado === false) {
        if ($pokedex[$i]["numero"] == $numero) {
            $indice = $i;
            $encontrado = true;
        } else {
            $i++;
        }
    }

    return $indice;
}

/*Mostrar pokémon.
  Donat un pokémon, mostrar tota la seva informació.
*/

function mostrarPokemon($pokemon)
{
    echo "<b>Numero: </b>" . $pokemon["numero"] . "<br>";
    echo "<b>Nombre: </b>" .  $pokemon["nombre"] . "<br>";
    echo "<b>Region: </b>" .  $pokemon["region"] . "<br>";
    echo "<b>Tipos: </b>";

    foreach ($pokemon["tipo"] as $tipo) {
        echo $tipo . ",";
    }
    echo "<br>";
    echo "<b>Altura: </b>" .  $pokemon["altura"] . "<br>";
    echo "<b>Peso: </b>" .  $pokemon["peso"] . "<br>";
    echo "<b>Evolucion: </b>" . $pokemon["evolucion"] . "<br>";
    echo "<img src=\"" . $pokemon["imagen"] . "\" width=\"100\" height=\"100\">";
    echo "<br>";

}

/*Afegir pokémon.
Donada una pokédex i un pokémon, afegir el pokémon a la pokédex.
Si el pokémon ja existeix, mostrar un missatge d’error.*/

function addPokemon(&$pokedex, $pokemon)
{
    /*se puede usar mi funcion que devuleve el indice, pero asi practico la funcion in_array*/

    $numero=$pokemon['numero'];
    $index=mostrarIndice($pokedex,$numero);
    $tipos=$pokemon['tipo'];

    if ($index===-1) {
        if($tipos===""){//obligaremos al usuario a poner como minimo un tipo
            $_SESSION["msgError"]="No se puede añadir el pokemon, necesita añadir minimo un tipo.";
            $_SESSION["msgCorrecto"]="";
        }else{
            array_push($pokedex, $pokemon);
            $_SESSION["msgCorrecto"]="Pokemon " . $pokemon["nombre"] . " añadido correctamente";
            $_SESSION["msgError"]="";

        }
       
       // echo "Pokemon " . $pokemon["nombre"] . " añadido correctamente<br>";   
    } else {
        $_SESSION["msgError"]="No se puede añadir el pokemon, ya exsiste";
        $_SESSION["msgCorrecto"]="";
       // echo "No se puede añadir el pokemon, ya exsiste<br>";
    }

}

/*Esborrar pokemon.
  Donada una pokedex i un  número de pokemon, esborrar el pokemon del array.
 */

function deletePokemon(&$pokedex, $numeroBorrar)
{
    $indicePokemon = mostrarIndice($pokedex, $numeroBorrar);

    if ($indicePokemon === -1) {
        $_SESSION["msgError"]="No se puede borrar un pokemon que no exsiste";
        $_SESSION["msgCorrecto"]="";
        //echo "No se puede borrar un pokemon que no exsiste";
    } else {
        array_splice($pokedex, $indicePokemon, 1);
        $_SESSION["msgCorrecto"]="Pokemon " . $pokedex[$indicePokemon]["nombre"] . "con numero: " . $numeroBorrar . "Borrado.";
        $_SESSION["msgError"]="";
        //echo "Pokemon " . $pokedex[$indicePokemon]["nombre"] . "con numero: " . $numeroBorrar . " <b>Borrado<b>.";
    }
}

/*Modificar pokemon.
Donada una pokedex, el número, el nom, la regió, els tipus, l’alçada, el pes, l’evolució, i la imatge s’ha de modificar les dades del pokémon que té el número que s’envia, amb la restade dades.
*/

function updatePokemon(&$pokedex, $numero, $nombre, $region, $tipo, $altura, $peso, $evolucion, $imagen)
{
    $indicePokemon = mostrarIndice($pokedex, $numero);

    if ($indicePokemon === -1) {
        echo "Imposible actualizar, el pokemon no exsiste.";
    } else {
        $pokedex[$indicePokemon]["nombre"] = $nombre;
        $pokedex[$indicePokemon]["region"] = $region;
        $pokedex[$indicePokemon]["tipo"] = $tipo;
        $pokedex[$indicePokemon]["altura"] = $altura;
        $pokedex[$indicePokemon]["peso"] = $peso;
        $pokedex[$indicePokemon]["evolucion"] = $evolucion;
        $pokedex[$indicePokemon]["imagen"] = $imagen;
        echo "Pokemon [" . $numero . "] modificado correctamente";
    }
}

/*Mostrar pokédex. 
Donada una pokédex, mostrar la informació de tots el pokémon que conté.
*/

function mostrarTodaPokedex($pokedex)
{
    foreach ($pokedex as $pokemon){
        mostrarPokemon($pokemon);
    }
}
