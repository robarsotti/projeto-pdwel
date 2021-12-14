<?php

if (isset($_GET['id_funcionario'])){
    include "db_conn.php";

    function validar($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validar($_GET['id_funcionario']);
    $sql = "SELECT * FROM TB_FUNCIONARIOS WHERE ID_FUNCIONARIO=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }
    else {
        header("Location: listaFuncionarios.php");
    }
} else if(isset($_POST['editar'])){
    include "../db_conn.php";
    function validar($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validar($_POST['name']);
    $id = validar($_POST['id_funcionario']);
    $email = validar($_POST['email']);
    $salario = $_POST['salario'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];

    
    if (empty($name)){
        header("Location: ../updateFuncionarios.php?id_funcionario=$id&error=Nome requerido");
    }
    else if (empty($email))
    {
        header("Location: ../updateFuncionarios.php?id_funcionario=$id&error=Email requerido");
    }
    else if (empty($salario))
    {
        header("Location: ../updateFuncionarios.php?id_funcionario=$id&error=Salario requerido");
    }
    else if (empty($nascimento))
    {
        header("Location: ../updateFuncionarios.php?id_funcionario=$id&error=Data nascimento requerida");
    }
    else if (empty($endereco))
    {
        header("Location: ../updateFuncionarios.php?id_funcionario=$id&error=Endereco requerido");
    }
    else {
        $sql = "UPDATE TB_FUNCIONARIOS
                SET NOME_FUNCIONARIO = '$name', EMAIL_FUNCIONARIO = '$email', SALARIO_FUNCIONARIO = '$salario', DT_NASCIMENTO_FUNCIONARIO = '$nascimento', ENDERECO_FUNCIONARIO = '$endereco'
                WHERE ID_FUNCIONARIO = $id";
        $result = mysqli_query($conn, $sql);
        if (result){
            header("Location: ../listaFuncionarios.php?id_funcionario=$id&success=Alterado com sucesso");
        }
        else{
            header("Location: ../updateFuncionarios.php?id_funcionario=$id&error=unknown error occurred");
        }
    }

}
else {
    header("Location: listaFuncionarios.php");
}