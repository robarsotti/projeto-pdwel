<?php

if (isset($_POST['cadastrar'])) 
{
    include "../db_conn.php";
    function validar($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validar($_POST['name']);
    $email = validar($_POST['email']);
    $salario = $_POST['salario'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];

    $user_data = 'name='.$name. '&email='.$email. '&salario='.$salario;
    
    if (empty($name)){
        header("Location: ../index.php?error=Nome requerido&$user_data");
    }
    else if (empty($email))
    {
        header("Location: ../index.php?error=Email requerido&$user_data");
    }
    else if (empty($salario))
    {
        header("Location: ../index.php?error=Salario requerido&$user_data");
    }
    else if (empty($nascimento))
    {
        header("Location: ../index.php?error=Data nascimento requerida&$user_data");
    }
    else if (empty($endereco))
    {
        header("Location: ../index.php?error=Endereco requerido&$user_data");
    }
    else {
        $sql = "INSERT INTO TB_FUNCIONARIOS(NOME_FUNCIONARIO, EMAIL_FUNCIONARIO, SALARIO_FUNCIONARIO, DT_NASCIMENTO_FUNCIONARIO, ENDERECO_FUNCIONARIO) 
                VALUES ('$name', '$email', '$salario', '$nascimento', '$endereco')";
        $result = mysqli_query($conn, $sql);
        if (result){
            header("Location: ../listaFuncionarios.php?success=Cadastrado com sucesso");
        }
        else{
            header("Location: ../index.php?error=unknown error occurred&$user_data");
        }
    }

}