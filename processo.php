<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

//lembrar de mudar username a password fora do padrão
$host = "host aqui";
$dbname = "banco aqui";
$username = "user aqui";
$password = "senha aqui";

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

echo "Record saved.";

?>
