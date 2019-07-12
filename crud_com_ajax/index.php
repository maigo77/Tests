<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" http-equiv="Content-type" content="text/html">
        <title>Formulário com Ajax e PHP</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            span{
                cursor:pointer;
                color:blue
            }

            label{
                display:block;
            }
            .window{
                display:none;
                width:200px;
                height:300px;
                position:absolute;
                left:0;
                top:0;
                background:#FFF;
                z-index:2;
                padding:10px;
                border-radius:10px;
            }
            #mascara{
                display:none;
                position:absolute;
                left:0;
                top:0;
                z-index:1;
                background-color:#000;
            }
            .fechar{display:block; text-align:right;}
        </style>
    </head>
    <body>
        <a href="#janela1" rel="modal">Clique aqui para cadastrar um novo usuário</a>
        <br><br>
        <div id="table">
            <h2>Usuários cadastrados</h2>
            <table border="1px" cellpadding="5px" cellspacing="0">
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Status</td>
                    <td>Senha</td>
                </tr>
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

                    echo "<tr>
                    <td>$id <span class='excluir' id_registro='$id'>Excluir</span></td>
                    <td>$nome <a href='#janela2' class='edita' id_registro='$id' rel='modal'>Editar</a></td>
                    <td>$email <a href='#janela2' class='edita' id_registro='$id' rel='modal'>Editar</a></td>
                    <td>$status <span class='status' status='$status' id_registro='$id'>Alterar</span></td>
                    <td>$senha <a href='#janela2' class='edita' id_registro='$id' rel='modal'>Editar</a></td>

                    </tr>";
                }
                /* onclick=\"alert('".$id."');\" */
                ?>
            </table>


            <div class="window" id="janela1">
                <a href="#" class="fechar">X</a>
                <h4>Cadastro de Usuário</h4>
                <form id="cadUsuario" action="" method="post">
                    <label>Nome:</label><input type="text" name="nome" id="nome">
                    <label>Email:</label><input type="text" name="email" id="email">
                    <label>Senha:</label><input type="text" name="senha" id="senha">
                    <br><br>
                    <input type="button" value="Cadastrar" id="salvar">
                </form>
            </div>

            <div class="window" id="janela2">
                <a href="#" class="fechar">X</a>
                <h4>Editar Dados</h4>
                <form id="edit" action="" method="post">
                    <label>Nome:</label><input type="text" name="nome" id="nome">
                    <label>Email:</label><input type="text" name="email" id="email">
                    <label>Senha:</label><input type="text" name="senha" id="senha">
                    <br><br>
                    <input type="button" value="Salvar" id="editar">
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

        $("a[rel=modal]").click(function(ev){
            ev.preventDefault();

            var id = $(this).attr("href");

            var alturaTela = $(document).height();
            var larguraTela = $(document).width();

            $('#mascara').css({'width': larguraTela, 'height': alturaTela});
            $('#mascara').fadeIn(1000);
            $('#mascara').fadeTo("slow", 0.8);

            var left = ($(window).width() / 2) - ($(id).width() / 2);
            var top = ($(window).height() / 2) - ($(id).height() / 2);

            $(id).css({'top': top, 'left': left});
            $(id).show();
        });

        $("#mascara").click(function(){
            $(this).hide();
            $(".window").hide();
        });

        $(".fechar").click(function(ev){
            ev.preventDefault();
            $("#mascara").hide();
            $(".window").hide();
        });

    });
</script>