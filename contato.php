<html>
	<head>
		<title>Contato</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/primario.css">
	</head>
	<body>
		<div id="page">
			<header>
				<a href="index.html"><img src="images/banner.png" alt="Banner do site" class="banner"></a>
				<nav>
					<a href="sobre.html">Sobre</a>
					<a href="contato.html" class="current">Contato</a>
				</nav>
			</header>
			<div class="content">
				<article class="contato">
					Deseja entrar em contato com um advogado diretamente?
					<br>
					Aqui você pode mandar um e-mail diretamente para nossos secretários e marcar um horário!
					<br></br>
					<form action="https://formspree.io/f/xzbweran" method="POST">
						<label for="nome">Nome completo:</label>
						<input type="text" id="nome" name="nome" required>
						<label for="email">Seu e-mail:</label>
						<input type="email" id="email" name="email" required><br>
						<p>
						<label>
							<textarea name="mensagem" placeholder="Descreva o que precisa aqui." required></textarea>
						</label><br>
						<button type="submit" value="Enviar">Enviar</button>
					</form>
				</article> 
				<article class="contato">
					Quer deixar um comentário sobre sua experiência com nossas advogados? Pode escrever aqui!<br>
					Seu comentário será mostrado assim que atualizar a página.<p>
					<form>
						<label for="nome">Nome:</label>
						<input type="text" id="nomeReview" name="nome" required>
						<p>
						<label>
							<textarea class="avaliacao" name="review" maxlength="280" placeholder="Escreva sua avaliação aqui!(Máximo 280 caracteres)" required></textarea>
						</label><br>
						<button type="submit" value="Enviar">Enviar</button><br>
					</form>
					<p>
					<div class="comentarios">
						<div class="single-item">
							Teste Teste Teste
							<a href="mailto:katalenicpsn3@hotmail.com">e-mail teste</a>
							<p>Teste</p>
						</div>
					</div>
				</article>
			</div>
			<footer>
				Teste
			</footer>
		</div>
	</body>
</html>