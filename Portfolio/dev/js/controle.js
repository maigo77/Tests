function fonte(e){
	var elemento = $("body");
	var fonte = elemento.css('font-size');
	if (e == 'a') {
		event.preventDefault()
		elemento.css("fontSize", parseInt(fonte) + 1);
		if(fonte === '20px'){
			elemento.css("fontSize", parseInt(fonte) + 0)
		}
	} else if(e == 'd'){
		event.preventDefault()
		elemento.css("fontSize", parseInt(fonte) - 1);
		if(fonte <= '13px'){
			elemento.css("fontSize", parseInt(fonte) + 0)
		}
	}
}