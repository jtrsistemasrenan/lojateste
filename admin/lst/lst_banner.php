<?php
    include_once("./classes/Lista.php");
    $lista = new Lista();
    if(isset($_GET["pg"])){
    $lista->setNumPagina( $_GET["pg"]);
    }
    $lista->setUrl("index.php?link=4");
?>

<h2> lista de Banner</h2>

<table cellpadding="0" cellspacing="0" border="1">

    <thead>
    <tr>

        <th>ID</th>
        <th>Titulo</th>
        <th>Ativo</th>
        <th>Editar </th>
        <th>Excluir </th>
    </tr>

    </thead>

    <tbody>

        <?php $lista->listaBanner(); ?>


    <tr>
        <td colspan="5"><?php $lista->geraNumeros() ?>  </td>
    </tr>

    </tbody>


</table>