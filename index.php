<?php
session_start()
?>
<!DOCTYPE html>
<html>
	<head>
	    <title>Formulário de Abertura de Chamado</title>
	    <link rel="stylesheet" href="css/stylo3.css">
	    <meta charset="UTF-8">
	    <script>
	        window.onload = function() {
	            var data_hora = new Date().toLocaleString('pt-BR');
	            document.getElementById("data_hora").value = data_hora;
	        }
	    </script>
	</head>
	<body>
		<div class="container">
			<div class="header">
			    <h2>Abertura de Chamado</h2>
			    <a href="buscar.php" class="btn">Buscar chamado</a>
			</div>
			    <form class="form" id="form" action="processa_chamado.php" method="POST">
				        <div class="form-control">
					        <label for="nome">Nome:</label>
					        <input type="text" id="nome" name="nome" required> 
					        <label for="email">E-mail:</label>
					        <input type="email" id="email" name="email" required>
				        <div>
				        	<label for="departamento">Departamento:</label>
					        <select class= id="departamento" name="departamento" required>
					            <option value="">Selecione...</option>
					            <option value="TI">TI</option>
					            <option value="RH">RH</option>
					            <option value="FIN">FIN</option>
					            <option value="COMPRAS">COMPRAS</option>
					            <option value="REDES">REDES</option>
					            <option value="ADM">ADM</option>
					            <option value="ADM">TRANSPORTE</option>
					        </select>
				    	</div>
				        <div>
				        	<label for="descricao">Descrição:</label>
				        	<input id="descricao" name="descricao" required></input>
				    	</div>
				        <label for="data_hora">Data e Hora:</label>
				        <input type="datetime-local" id="data_hora" name="data_hora" required><br>
				    <h4><?php
						if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);}
						?>
					</h4>
				        <button type="submit" value="Enviar">Enviar</button>
		    	</form>
		</div>
	</body>
</html>
