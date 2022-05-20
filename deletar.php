<?php

include ("conexao.php");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];
    $sql="DELETE FROM `funcionarios` WHERE id=$id";
    $result = mysqli_query($conn,$sql);

    if($result){
        header('location:tabela.php');
    }else{
        die(mysqli_error($conn));
    }
}