<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Formulario</title>
</head>

<body>

    <form action="">

        <!--INPUT NUMERO-->
        <!--MAXIMO 3 NUMEROS; SOLO NUMEROS-->
        <label for="txtNumero">Numero</label>
        <input autofocus type="text" name="txtNumero" id="txtNumero" placeholder="Número del pokémon" focus="true" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">

        <br>
        <br>

        <!--INPUT NOMBRE-->
        <label for="txtNombre">Nombre</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre del pokémon">

        <br>
        <br>

        <!--COMBO BOX REGION-->
        <!--Kanto, Jotho, Hoenn, Sinnoh i Teselia-->
        <label for="cmbRegion">Region</label>
        <select name="cbxRegion" id="cbxRegion">
            <option value="">Kanto</optio>
            <option value="">Jotho</optio>
            <option value="">Hoenn</optio>
            <option value="">Sinnoh</optio>
            <option value="">Teselia</optio>
        </select>

        <br>
        <br>

        <!--CHECK BOX TIPO-->
        <!-- Planta, Veneno,Fuego, Volador, Agua, Eléctrico, Hada, Bicho, Lucha, Psíquico.-->
        <label for="chxTipo">Tipo </label>

        <input type="checkbox" name="chxTipo" id="chxPlanta">
        <label for="chxPlanta">Planta</label>

        <input type="checkbox" name="chxTipo" id="chxVeneno">
        <label for="chxVeneno">Veneno</label>

        <input type="checkbox" name="chxTipo" id="chxFuego">
        <label for="chxFuego">Fuego</label>

        <input type="checkbox" name="chxTipo" id="chxVolador">
        <label for="chxVolador">Volador</label>

        <input type="checkbox" name="chxTipo" id="chxAgua">
        <label for="chxAgua">Agua</label>

        <input type="checkbox" name="chxTipo" id="chxElectrico">
        <label for="chxElectrico">Eléctrico</label>

        <input type="checkbox" name="chxTipo" id="chxHada">
        <label for="chxHada">Hada</label>

        <input type="checkbox" name="chxTipo" id="chxBicho">
        <label for="chxBicho">Bicho</label>

        <input type="checkbox" name="chxTipo" id="chxLucha">
        <label for="chxLucha">Lucha</label>

        <input type="checkbox" name="chxTipo" id="chxPsiquico">
        <label for="chxPsiquico">Psíquico</label>

        <br>
        <br>

        <!--INPUT ALTURA-->
        <!--SOLO NUMEROS ALTURA MINIMA 1-->
        <label for="numberAltura">Altura</label>
        <input type="number" name="numberAltura" id="numberAltura" placeholder="Altura del pokémon" min="1">

        <br>
        <br>

        <!--INPUT PESO-->
        <!--SOLO NUMEROS PESO NO PUEDE SER NEGATIVO Y CON 2 DECIMALES-->
        <label for="numberPeso">Peso</label>
        <input type="number" name="numberPeso" id="numberPeso" placeholder="Peso del pokémon" step="0.01" min=0>

        <br>
        <br>

        <!--RADIO BUTTON EVOLUCION-->
        <!--Sense evolució, Primera evolución, Otras evoluciones.-->
        <label for="rbEvolucion">Evolucion</label>
        <input type="radio" name="rbEvolucion" id="rbSinEvolucion" checked>
        <label for="rbSinEvolucion">Sin evolucion</label>
        <input type="radio" name="rbEvolucion" id="rbPrimeraEvolucion">
        <label for="rbPrimeraEvolucion">Primera evolucion</label>
        <input type="radio" name="rbEvolucion" id="rbOtrasEvoluciones">
        <label for="rbOtrasEvoluciones">Otras evoluciones</label>

        <br>
        <br>

        <!--SUBIR IMAGEN-->
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen">

        <br>
        <br>

        <!--BOTON SUBMIT-->

        <button type="submit">Aceptar</button>
        <a href="">Cancelar</a>






    </form>


</body>

</html>

<!--http://localhost/pokedex/php_views/pokemon.php-->