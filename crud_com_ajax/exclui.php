<?
    include "conexao.php";

    $id = $_POST['id'];

    $sql = "DELETE FROM USUARIO WHERE ID_USUARIO = '$id'";
    mysql_query($sql) or die(error());
    $response = array("success" => true);
    echo json_encode($response);
?>