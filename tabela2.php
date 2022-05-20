<?php 
    include_once("conexao.php");

    if(!empty($_GET['search'])){
      $data = $_GET['search'];
    $sql = "SELECT * FROM funcionarios WHERE id LIKE '$data' or nome LIKE '$data' or cargo LIKE '$data' ORDER BY id DESC";
    $resultado = mysqli_query($conn, $sql);
    if($resultado){
        while($row=mysqli_fetch_assoc($resultado)){
            echo '<tr>
                    <th>'.$row['id'].'</th>
                    <td>'.$row['nome'].'</td>
                    <td>'.$row['mat_siape'].'</td>
                    <td>'.$row['salario'].'</td>
                    <td>'.$row['cargo'].'</td>
                    <td>'.$row['certificacao'].'</td>
                    <td><button><a href="atualizar.php?updateId='.$row['id'].' class="btnAtualizar">Atualizar</button>
                    <button><a href="deletar.php?deleteId='.$row['id'].'  class="btnDeletar" >Deletar</button></td>    
                    </tr>';
            }
            }else{
                echo "nada";
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
                        <td><button><a href="atualizar.php?updateId='.$row['id'].'  class="btnAtualizar">Atualizar</button>
                        <button><a href="deletar.php?deleteId='.$row['id'].' class="btnDeletar" >Deletar</button></td>    
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
    window.location = 'tabela2.php?search='+search.value;
}

search.addEventListener("keydown"), function(event){
    if(event.key === "Enter"){
        searchData();
    }
}
</script>
</html>

