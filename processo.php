<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';
	
	header("Content-Type: text/html; charset=utf8");
	
	if ($_POST['botao'] == 'Enviar') {
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$mensagem = $_POST["mensagem"];

		//lembrar de mudar username a password fora do padrão
		$host = "hot";
		$dbname = "nome db";
		$username = "usuario";
		$password = "senha";

		//Pegar dados para a db e inicializar conexão
		$conn = mysqli_connect(hostname: $host, 
							username: $username,
							password: $password,
							database: $dbname);

		//Checar por erros
		if (mysqli_connect_errno()) {
			die("Connection error: " . mysqli_connect_error());
		}

		//Salvar dados na DB
		$sql = "INSERT INTO mensagem (nome, email, message)
				VALUES (?, ?, ?)";

		//iniciar conexão		
		$stmt = mysqli_stmt_init($conn);

		//ver erros se tiver
		if ( ! mysqli_stmt_prepare($stmt, $sql)) {
			die(mysqli_error($conn));
		}

		mysqli_stmt_bind_param($stmt, "sss",
								$nome,
								$email,
								$mensagem);

		mysqli_stmt_execute($stmt);
		
		$mail = new PHPMailer(true);

		try {
			header('Refresh: 5; URL=https://advocacialorem.com.br/index.html');
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->CharSet = 'UTF-8';
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'email-ssl.com.br';           //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'usuario';                     //SMTP username
			$mail->Password   = 'senha';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('email', 'Lorem');
			$mail->addAddress('email', 'Advocacia');     //Add a recipient
			$mail->addReplyTo('email', 'Information');

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Mensagem de ' .$_POST['nome'];
			
			$body = "Nova mensagem:<br><br>
			Nome: ". $_POST['nome']. "<br>
			E-mail: ".$_POST['email']. "<br>
			Mensagem: <br>". $_POST['mensagem'];
			
			$mail->Body    = $body;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			//echo 'Message has been sent.';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		echo "Mensagem enviada com sucesso! Iremos te redirecionar novamente em breve ;)";
	} else{
		echo "Por favor volte ao link de contato para enviar formulário.";
	}
?>
