<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script src="jquery-latest.js"></script>
<script>
	$(function(){
		$("#down").click(function(){
			var valores ={
				"cod":1, 
				"curso":"Bootstrap",
				"dataini":"21/12/2014",
 				"datafim":"31/12/2014",
  				"cargah":"10h",
				"nome":"Vinicius"
			};
			$.post("inter/index.php",{gerar:JSON.stringify(valores)},function(dados,status){
				alert(dados);
				var teste = dados.replace("\\","");
				var teste2 = teste.replace("\\","");
				var teste3 = teste2.replace("\\","");
				$("div").append("<a href=Certificados/"+teste3+">PDF</a>");
			})
		});
	});
</script>
</head>
<body>

	<button id="down">PDF</button>
	<div></div>
</body>
</html>