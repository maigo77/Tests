<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" http-equiv="Content-type" content="text/html">
        <title>Formulário com Ajax e PHP</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/a3361d289b.js"></script>
        <script src="js/modal.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div id="table">
            <div id="divMaior">
                <div id="divMenor">
                    <h2>
                        Usuários cadastrados
                        <i class="fa fa-users no-pointer" aria-hidden="true"></i>
                    </h2>
                </div>
            </div>
            
            <table class="text-center table table-striped table-bordered table-responsive table-hover">
                <thead>
                    <tr class="bg-primary table-titles">
                        <td>Id</td>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Status</td>
                        <td>Senha</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                <?
                include 'conexao.php';

                $select = "select * from USUARIO";
                $result = mysql_query($select);

                while($row = mysql_fetch_array($result)) {
                    $id = $row['ID_USUARIO'];
                    $nome = $row['NOME'];
                    $email = $row['EMAIL'];
                    $status = $row['STATUS'];
                    $senha = $row['SENHA'];

                    echo "
                    <tr>
                        <td>$id </td>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>$status</td>
                        <td>$senha</td>
                        <td>
                            <i title='Excluir' class='excluir fa fa-minus-circle' aria-hidden='true' id_registro='$id'></i> 
                            | 
                            <a title='Editar' href='#janela2' class='edita' id_registro='$id' rel='modal'>
                                <i class='fa fa-pencil-square' aria-hidden='true'></i>
                            </a> 
                            | 
                            <i title='Alterar Status' class='fa fa-wrench status' status='$status' id_registro='$id' aria-hidden='true'></i> 
                        </td>
                    </tr>";                                                                 
                }
                /* onclick=\"alert('".$id."');\" */
                ?>
                    </tbody>
            </table>

            <hr>

            <div id='add-user'>
                <a href="#janela1" rel="modal">
                    Clique aqui para cadastrar um novo usuário
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </a>
            </div>

            <div class="window" id="janela1">
                <i class="fa fa-window-close fechar" aria-hidden="true"></i>
                <h4>Cadastro de Usuário</h4>
                <form id="cadUsuario" action="" method="post">
                    <label>Nome:</label><input type="text" name="nome" id="nome" required>
                    <label>Email:</label><input type="email" name="email" id="email" required>
                    <label>Senha:</label><input type="text" name="senha" id="senha" required>
                    <br><br>
                    <input class="button-modal" type="button" value="Cadastrar" id="salvar">
                </form>
            </div>

            <div class="window" id="janela2">
                <i class="fa fa-window-close fechar" aria-hidden="true"></i>
                <h4>Editar Dados</h4>
                <form id="edit" action="" method="post">
                    <label>Nome:</label><input type="text" name="nome" id="nome" required>
                    <label>Email:</label><input type="text" name="email" id="email" required>
                    <label>Senha:</label><input type="text" name="senha" id="senha" required>
                    <br><br>
                    <input class="button-modal" type="button" value="Salvar" id="editar">
                </form>
            </div>

            <div id="mascara"></div>
        </div>
    </body>
</html>

<script>
    $(document).ready(function() {

        $('.status').click(function(){
            var id = $(this).attr('id_registro');
            var status = $(this).attr('status');
            $.ajax({
                url:'alteraStatus.php',
                dataType: 'json',
                type: 'POST',
                async: true,
                data: {'id': id, 'status':status},
                error: function(erro){
                    alert('caso de erro ' + erro);
                },
                success: function(response){
                    location.reload()
                }
            })
        })

        $('.excluir').click(function(){
            var id = $(this).attr('id_registro');
            $.ajax({
                url:'exclui.php',
                dataType: 'json',
                type: 'POST',
                async: true,
                data: {'id': id},
                error: function(erro){
                    alert('caso de erro ' + erro);
                },
                success: function(response){
                   location.reload()
                }
            })
        })

        $('.edita').click(function(){
            var id = $(this).attr('id_registro');
            console.log(id);
            $('#editar').click(function(){
                var dado = $('#edit').serialize();
                console.log(dado);
                $.ajax({
                    url: 'editar.php?'+dado,
                    dataType: 'json',
                    type: 'POST',            
                    async: true,
                    data: {
                        'id': id
                    },
                    error: function(erro){
                        alert('caso de erro ' + erro);
                    },
                    success: function(response){
                        location.reload();
                    }
                });

                return false;
            });
        })
            

        $('#salvar').click(function(){
            var dados = $('#cadUsuario').serialize();
            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'salvar.php',
                async: true,
                data: dados,
                error: function(erro){
                    alert('caso de erro ' + erro);
                },
                success: function(response){
                    location.reload();
                }
            });

            return false;
        });

    });
</script>