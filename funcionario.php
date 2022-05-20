<?php
    include_once("conexao.php");

    if(isset($_POST['gravar'])){
        $nome = $_POST['nome'];
        $mat_siape = $_POST['mat_siape'];
        $salario = $_POST['salario'];
        $cargo = $_POST['cargo'];
        $certificacao = $_POST['certificacao'];

        $sql = "INSERT INTO `funcionarios`(`nome`, `mat_siape`, `salario`, `cargo`, `certificacao`) VALUES ('$nome','$mat_siape','$salario','$cargo','$certificacao')";
    
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:tabela.php');
        }else{
            die(mysqli_error($conn));
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Funcionários</title>
</head>
<body>
    <button class="button1">
        <a href="tabela.php" class="as">< Registros de Funcionários</a><br>
    </button>
    <form method="post" class="form">
        
        <h3>Nome:</h3>
        <input type="text" name="nome" placeholder="Nome do Funcionário">

        <h3>Matrícula:</h3>
        <input type="number" name="mat_siape" placeholder="Matrícula">

        <h3>Salário:</h3>
        <input type="number" name="salario" placeholder="Salário">

        <h3>Cargo:</h3>
        <input type="text" name="cargo" placeholder="Cargo">
        
        <h3>Certificação:</h3>
        <input type="text" name="certificacao" placeholder="Certificação"><br><br>

        <button type="submit" value="cadastrar" name="gravar">CADASTRAR</button>
    </form>
</body>
</html>