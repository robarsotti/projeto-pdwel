<?php include 'php/updateFuncionario.php'; ?>
<!DOCTYPE html>
<html> 
<head>
    <title> Editar funcionário </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="php/updateFuncionario.php"
              method="post">
            <h5 class="display-5 text-center">Editar funcionário</h5><hr>
            <?php if (isset($_GET['error'])){ ?>
                <div class="alert alert-warning" role="alert">
                <?php echo $_GET['error']; ?>
                </div>    
                <?php } ?>            
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="name" 
                class="form-control" 
                id="name" 
                name="name"
                value="<?=$row['nome_funcionario'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" 
                class="form-control" 
                id="email" 
                name="email"
                value="<?=$row['email_funcionario'] ?>">
            </div>
            <div class="form-group">
                <label for="nascimento">Data de nascimento</label>
                <input type="date" 
                class="form-control" 
                id="nascimento" 
                name="nascimento"
                value="<?=$row['dt_nascimento_funcionario'] ?>">
            </div>
            <div class="form-group">
                <label for="salario">Salário</label>
                <input type="number" min="0.00" max="10000.00" step="50"
                class="form-control" 
                id="salario" 
                name="salario"
                value="<?=$row['salario_funcionario'] ?>">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text"
                class="form-control" 
                id="endereco" 
                name="endereco"
                value="<?=$row['endereco_funcionario'] ?>">
            </div>
            <input type="text"
                   name="id_funcionario"
                   value="<?=$row['id_funcionario']?>"
                   hidden 
                   />
            <button type="submit"
                    name="editar" 
                    class="btn btn-primary">Editar</button>
            <a href="listaFuncionarios.php" class="link-primary">Lista de funcionários</a>
        </form>
</div>
</body>
</html> 