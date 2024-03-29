<?php
    session_start();
    $_SESSION['autenticado'] = 'SIM';

?>

<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="shortcut icon" href="apple-icon-114x114.png">

	</head>

	<body>

		<div class="container">

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
					<div class="card-body font-weight-bold">
						<form method="post" action="processa.php">
							<div class="form-group">
								<label for="para">Para</label>
								<input type="text" class="form-control" id="para" name="email" autofocus  placeholder="teste@dominio.com.br">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" id="mensagem" name="msg" placeholder="Mensagem"></textarea>
							</div>

                            <?php
                                if(isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>