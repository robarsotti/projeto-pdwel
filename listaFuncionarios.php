<?php include "php/listaFuncionarios.php"; ?>
<!DOCTYPE html>
<html> 
<head>
    <title> Lista de funcionários </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h5 class="display-5 text-center">Lista de funcionários</h5>
            <?php if (isset($_GET['success'])){ ?>
                <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
                </div>    
                <?php } ?> 
            <?php if (mysqli_num_rows($result)){ ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data nascimento</th>
                        <th scope="col">Salário</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                    $i = 0;
                    while($rows = mysqli_fetch_assoc($result))
                    {
                        $i++;
                    ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$rows['nome_funcionario']?></td>
                        <td><?=$rows['email_funcionario']?></td>
                        <td><?=$rows['dt_nascimento_funcionario']?></td>
                        <td><?=$rows['salario_funcionario']?></td>
                        <td><?=$rows['endereco_funcionario']?></td>
                        <td><a href="updateFuncionarios.php?id_funcionario=<?=$rows['id_funcionario']?>" 
                               class="btn btn-success">Editar</a></td>
                        <td><a href="php/deletarFuncionarios.php?id_funcionario=<?=$rows['id_funcionario']?>" 
                               class="btn btn-danger">Excluir</a></td>
                            
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
            <div class="link-right">
            
            <a href="index.php" class="button">
                <button class="btn btn-primary"> Cadastrar </button>
            </a>
            </div>
        </div>
    </div>
</body>
</html> 