$(document).ready(function(){
  // Salva
  $(document).on('click', '#submit_btn', function(){
    var name = $('#name').val();
    var comment = $('#comment').val();
    $.ajax({
      url: 'server.php',
      type: 'POST',
      data: {
        'save': 1,
        'name': name,
        'comment': comment,
      },
      success: function(response){
        $('#name').val('');
        $('#comment').val('');
        $('#display_area').append(response);
      }
    });
  });
  // Deleta
  $(document).on('click', '.delete', function(){
  	var id = $(this).data('id');
  	$clicked_btn = $(this);
  	$.ajax({
  	  url: 'server.php',
  	  type: 'GET',
  	  data: {
    	'delete': 1,
    	'id': id,
      },
      success: function(response){
        // Remove o que foi deletado
        $clicked_btn.parent().remove();
        $('#name').val('');
        $('#comment').val('');
      }
  	});
  });
  var edit_id;
  var $edit_comment;
  $(document).on('click', '.edit', function(){
  	edit_id = $(this).data('id');
  	$edit_comment = $(this).parent();
  	// Seleciona o comentário a ser editado
  	var name = $(this).siblings('.display_name').text();
  	var comment = $(this).siblings('.comment_text').text();
  	// Coloca o comentário num form
  	$('#name').val(name);
  	$('#comment').val(comment);
  	$('#submit_btn').hide();
  	$('#update_btn').show();
  });
  // Att comentário
  $(document).on('click', '#update_btn', function(){
  	var id = edit_id;
  	var name = $('#name').val();
  	var comment = $('#comment').val();
  	$.ajax({
      url: 'server.php',
      type: 'POST',
      data: {
      	'update': 1,
      	'id': id,
      	'name': name,
      	'comment': comment,
      },
      success: function(response){
      	$('#name').val('');
      	$('#comment').val('');
      	$('#submit_btn').show();
      	$('#update_btn').hide();
      	$edit_comment.replaceWith(response);
      }
  	});		
  });
   // Att Status
  $(document).on('click', '.status', function(){
    var id = $(this).data('id');
    var status = $('.status').val();
    $.ajax({
      url: 'server.php',
      type: 'POST',
      data:{
        'id': id,
        'updateStatus': 1,
        'status': status,
      },
      success: function(response){
        alert(response)
      }
    })
  })
});