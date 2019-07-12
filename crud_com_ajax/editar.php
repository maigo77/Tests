<?
    include "conexao.php";

    $id = $_POST['id'];
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $sql = "UPDATE USUARIO SET NOME = '$nome', EMAIL = '$email', SENHA = '$senha' WHERE ID_USUARIO = '$id'";
    mysql_query($sql) or die(error());
    $response = array("success" => true);
    echo json_encode($response);
?>