<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>CRUD com Ajax</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
  <div class="wrapper">
  	<?php echo $comments; ?>
  	<form class="comment_form">
      <div>
        <label for="name">Nome:</label>
      	<input type="text" name="name" id="name">
      </div>
      <div>
      	<label for="comment">Comentário:</label>
      	<textarea name="comment" id="comment" cols="30" rows="5"></textarea>
      </div>
      <button type="button" id="submit_btn">Enviar</button>
      <button type="button" id="update_btn" style="display: none;">Atualizar</button>
  	</form>
  </div>
</body>
<!-- JQuery e chamada do script -->
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="scripts.js"></script>
</html>
