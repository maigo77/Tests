function bloquear(e){return false}
		function desbloquear(){return true}
		document.onselectstart=new Function()
		if (window.sidebar){document.onmousedown=bloquear
		document.onclick=desbloquear}