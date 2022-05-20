<?php 
    include_once("conexao.php");

    if(!empty($_GET['search'])){
    $data = $_GET['search'];
    $sql = "SELECT * FROM funcionarios WHERE id LIKE '%$data' or nome LIKE '%$data' or cargo LIKE '%$data' ORDER BY id DESC";
    $resultado = mysqli_query($conn, $sql);
    if($resultado){
        while($row=mysqli_fetch_assoc($resultado)){
            echo '<div style="height: 50px;
            width: 50%;
            color: rgb(0, 0, 0);
            background-color: rgb(255, 255, 255);
            border: 3px solid rgba(0, 0, 0, 0.69);
            border-radius: 10px;
            padding-left: 15px;
            box-sizing: border-box;
            text-decoration: none;
            outline: none;"><tr style="border: 1px solid #000000;
            padding: 5px 4px;">
                    <th style="border: 1px solid #000000;
                    padding: 5px 4px;">'.$row['id'].'</th>
                    <td style="border: 1px solid #000000;
                    padding: 5px 4px;">'.$row['nome'].'</td>
                    <td>'.$row['mat_siape'].'</td>
                    <td>'.$row['salario'].'</td>
                    <td>'.$row['cargo'].'</td>
                    <td>'.$row['certificacao'].'</td>
                    <td><button class="btnAtualizar"><a href="atualizar.php?updateId='.$row['id'].' class="btnAtualizar">Atualizar</button>
                    <button class="btnDeletar"><a href="deletar.php?deleteId='.$row['id'].'  class="btnDeletar" >Deletar</button></td>    
                    </tr></div>';
            }
            }else{
              echo "Usuário não encontrado.";
            }
        }
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Funcionários FNS</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>



<button class="button1">
<a href="funcionario.php" class="as">Adicionar Funcionário</a>
</button><br><br>

<input type="search" id="pesquisar" placeholder="Pesquise pelo Nome ou pelo cargo:">

 
<button class="button1" style="color:#fff" onclick="searchData()">Pesquisar</button>
<br><br><br><br>


<table class="minimalistBlack">
<thead>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Matrícula Siape</th>
    <th>Salário</th>
    <th>Cargo</th>
    <th>Certificação</th>
    <th>Ações</th>
    <th></th>
  </tr>
</thead>

<tbody>
<?php 
        $sql="SELECT * FROM `funcionarios`";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                echo '<tr>
                        <th>'.$row['id'].'</th>
                        <td>'.$row['nome'].'</td>
                        <td>'.$row['mat_siape'].'</td>
                        <td>'.$row['salario'].'</td>
                        <td>'.$row['cargo'].'</td>
                        <td>'.$row['certificacao'].'</td>
                        <td><button><a href="atualizar.php?updateId='.$row['id'].' " class="btnAtualizar">Atualizar</button></td>
                        <td><button><a href="deletar.php?deleteId='.$row['id'].'" class="btnDeletar" >Deletar</button></td>    
                        </tr>';
                }
            };
?>
   
</tbody>
</table>
</body>
<script>

let search = document.getElementById('pesquisar');

function searchData(){
    window.location = 'tabela.php?search='+search.value;
}

search.addEventListener("keydown"), function(event){
    if(event.key === "Enter"){
        searchData();
    }
}
</script>
</html>

