<?php

function cliente_select() {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $query = 'select cliente.cod_cliente, cliente.nome, cliente.sexo, cidade.nome as nome_cidade from cliente inner join cidade on (cod_cidade = cidade.id_cidade)';
    $result = pg_query($conn, $query);
    echo '<table border = 1>';

    echo '<td>Código:</td><td>Nome:</td><td>Sexo:</td><td>Cidade:</td><td>Deletar</td><td>Alterar</td><td>Mostrar filhos</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['cod_cliente'] . '</td><td>' . $row['nome'] . '</td><td>' . $row['sexo'] . '</td><td>' . $row['nome_cidade'] . '</td>';

            echo '<td><button onclick="cliente_delete(' . $row['cod_cliente'] . ')">Deletar</td>';
            echo '<td><button onclick="cliente_update(' . $row['cod_cliente'] . ', ' . $row['nome'] . ', ' . $row['sexo'] . ', ' . $row['nome_cidade'] . ')">Alterar</td>';
            echo '<td><button onclick="cliente_filhoselect(' . $row['cod_cliente'] . ')">Mostrar filhos</td>';

            echo '</tr>';
        }
    }
    echo'</td></tr>';
    echo '<tr><td colspan = "7"><button onclick = "cliente_forminsert()">Inserir</td></tr>';
    echo '</table>';
    pg_close($conn);
}

function cliente_delete($codigo) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $deletar = (int) $codigo;
    $query = "DELETE FROM cliente where cod_cliente='$deletar'";
    $result = pg_query($conn, $query);

    if (!$result) {

        printf("<h1>ERRO</h1>");
        $errormessage = pg_errormessage($conn);
        echo $errormessage;
        exit();
    }
    pg_close($conn);
}

function cliente_insert($r1, $r2, $r3) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    pg_query($conn, "INSERT INTO cliente (nome, sexo, cod_cidade) values ('$r1','$r2','$r3')");
    pg_close($conn);
}

function cliente_alterar($r1, $r2, $r3) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    pg_query($conn, "update cliente set nome = '$r1', sexo ='$r2', cod_cidade=$cidade where cod_cliente = '$alt'");
    pg_close($conn);
}

function cliente_mostrafilho($codigo) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $deletar = (int) $codigo;
    $query = "SELECT * FROM dependente where cod_cliente = $deletar";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';
    echo '<td>Código cliente:</td><td>Código filho:</td><td>Nome:</td><td>Deletar</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>'; 
            echo '<td>' . $row['cod_cliente'] . '</td><td>' . $row['cod_dependente'] . '</td><td>' . $row['nome'] . '</td>';
            echo '<td><button onclick="cliente_filhodelete(' . $row['cod_dependente'] . ', ' . $row['cod_cliente'] . ')">Deletar</td>';
            echo '</tr>';
        }
    }
    echo '</table>';
    pg_close($conn);
}

function Adicionar_filhos() {
    $guardar = $_POST["codigo"];

    echo '<table>';

    echo '<tr><td>Informe seu nome: <input type = text name = campo1 required></td></tr>';
    echo '<tr><td><input type = hidden name = codigo value =' . $guardar . '></td></tr>';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type = submit name = "submit" value = "Enviar">';


    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $deletar = (int) $_POST["codigo"];
    $query = "SELECT * FROM dependente where cod_clientes =$deletar";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';
    echo '<td>Código cliente:</td><td>Código filho:</td><td>Nome:</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['cod_cliente'] . '</td><td>' . $row['cod_dependente'] . '</td><td>' . $row['nome'] . '</td>';
            echo '<td><input type=radio name=deletar value="' . $row['cod_dependente'] . '"><tr>';
            echo '</tr>';
        }
    }
    echo '</table>';
    pg_close($conn);
    echo '<input type = submit name = submit value = "Deletar">';
}

function buttoncidade() {
    
}

///////////////////////////////FILHOS////////////////////////////////////////////////////////////

function filho_select() {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $query = "SELECT cliente.nome as cliente_nome, cliente.cod_cliente as cliente_codigo , dependente.cod_dependente as filho_codigo, dependente.nome as filho_nome FROM dependente inner join cliente on (dependente.cod_cliente = cliente.cod_cliente)";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';
    echo '<td>Código cliente:</td><td>Código cliente:</td><td>Nome:</td><td>Código filho:</td><td>Deletar</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['cliente_nome'] . '</td><td>' . $row['cliente_codigo'] . '</td><td>' . $row['filho_nome'] . '</td><td>' . $row['filho_codigo'] . '</td>';
            echo '<td><button onclick = "filho_delete(' . $row['filho_codigo'] . ')">Deletar</td>';
            echo '</tr>';
        }
    }
    echo '<tr><td colspan = "5"><button onclick = "filho_forminsert()">Inserir</td></tr>';
    echo '</table>';
    pg_close($conn);
}

function filho_delete($codigo) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $deletar = (int) $codigo;
    $query = "DELETE FROM dependente where cod_dependente='$deletar'";
    $result = pg_query($conn, $query);

    if (!$result) {

        printf("<h1>ERRO</h1>");
        $errormessage = pg_errormessage($conn);
        echo $errormessage;
        exit();
    }
    pg_close($conn);
}

function filho_insert($r1, $r2) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    pg_query($conn, "INSERT INTO dependente (nome,cod_cliente) values ('$r1','$r2')");

    pg_close($conn);
}

///////////////////////////////CIDADES////////////////////////////////////////////////////////////


function cidade_select() {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $query = 'SELECT * FROM cidade';
    $result = pg_query($conn, $query);
    echo '<table border = 1>';

    echo '<td>Código:</td><td>Nome:</td><td>Deletar</td><td>Alterar</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_cidade'] . '</td><td>' . $row['nome'] . '</td>';
            echo '<td><button onclick = "cidade_delete(' . $row['id_cidade'] . ')">Deletar</td>';
            echo '<td><button onclick = "cidade_formupdate(' . $row['id_cidade'] . ')">Alterar</td>';
            echo '</tr>';
        }
    }

    echo '<tr><td colspan = "4"><button onclick = "cidade_forminsert()">Inserir</td></tr>';

    echo '</table>';
    pg_close($conn);
}

function cidade_delete($codigo) {
    $deletar = (int) $codigo;
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $query = "select count(*) from cliente where cod_cidade='$deletar'";
    $result_select = pg_query($conn, $query);
    if ($query > 0) {
        echo 'Cidade não pode ser deletada!';
        pg_close($conn);
    } else {
        $query1 = "DELETE FROM cidade where id_cidade='$deletar'";
        $result = pg_query($conn, $query1);
        if (!$result) {

            printf("<h1>ERRO</h1>");
//$errormessage = pg_errormessage($conn);
//echo $errormessage;
            exit();
            pg_close($conn);
        }
    }
}

function cidade_insert($r1) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    pg_query($conn, "INSERT INTO cidade (nome) values ('$r1')");
    pg_close($conn);
}

function cidade_alterar($r1, $r2) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    pg_query($conn, "UPDATE cidade set nome = '$r2' where id_cidade = '$r1'");
    pg_close($conn);
}

function cidade_selectone($r1) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'php' user = 'postgres' password = 'gabriel'");
    $deletar = (int) $r1;
    $query = "SELECT * FROM cidade where id_cidade=$deletar";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';

    echo '<td>Código:</td><td>Nome:</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_cidade'] . '</td><td>' . $row['nome'] . '</td>';
            echo '</tr>';
        }
    }
    echo '</table>';
    pg_close($conn);
}
