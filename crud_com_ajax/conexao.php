<?
$conect = mysql_connect("linux03", "teste", "teste");

if(!$conect) die ("<h1>Falha na conexão com o Banco de Dados!</h1>");

$db = mysql_select_db("agoravai");

?>