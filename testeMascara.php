<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Formatacao de campos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script>
	function formatarCampo(campoTexto) {
	    if (campoTexto.value.length <= 11) {
	        campoTexto.value = mascaraCpf(campoTexto.value);
	    } else {
	        campoTexto.value = mascaraCnpj(campoTexto.value);
	    }
	}
	function retirarFormatacao(campoTexto) {
	    campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g,"");
	}
	function mascaraCpf(valor) {
	    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
	}
	function mascaraCnpj(valor) {
	    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
	}
</script> 
</head>
	<body>
		<form name="form1">
			<input type="text" onkeypress="retirarFormatacao(this);" onblur="formatarCampo(this);" maxlength="14"/>
		</form>
	</body>
</html>
