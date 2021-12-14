<?php

if (isset($_GET['id_funcionario'])){
    include "../db_conn.php";
    function validar($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validar($_GET['id_funcionario']);

    $sql = "DELETE FROM TB_FUNCIONARIOS WHERE ID_FUNCIONARIO =$id";
        $result = mysqli_query($conn, $sql);
        if (result){
            header("Location: ../listaFuncionarios.php?success=Excluido com sucesso");
        }
        else{
            header("Location: ../listaFuncionarios.php?error=unknown error occurred");
        }
}
else {
    header("Location: ../listaFuncionarios.php");
}