<?
    include "conexao.php";

    $id = $_POST['id'];

    if($status == 'A'){
        $sql = "UPDATE USUARIO SET STATUS = 'I' WHERE ID_USUARIO = '$id'";
    }else{
         $sql = "UPDATE USUARIO SET STATUS = 'A' WHERE ID_USUARIO = '$id'";
    }

    mysql_query($sql) or die(error());
    $response = array("success" => true);
    echo json_encode($response);
?>