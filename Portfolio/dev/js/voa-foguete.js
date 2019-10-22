function showFoguete(){
	$('#foguete').removeClass('hidden')
	$('#foguete').addClass('foguete')

}

var img = null

function voaFoguete(){
		
		$('#foguete').click(() =>{
			//Troca a imagem para o foguete com fogo embaixo			
			$('#foguete').html("<img src='images/foguete-voando.png'>")

			// Volta a imagem para o foguete normal
			let intervalo = setTimeout(function(){ 
				img = $('#foguete').html("<img src='images/foguete.png'>")
				$('#foguete').fadeOut()
				$('#foguete').fadeIn()
		}, 1025);
		})

	}

voaFoguete()