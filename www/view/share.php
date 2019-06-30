<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
<body class="text-light pb-5" style="background-color: #212020">
	<div class="container mt-5">
		<div class="jumbotron bg-dark text-light">
			<ul class="nav">
				<li class="nav-item">
					<div class="nav-link"><a href="https://twitter.com/intent/tweet?text=<?php echo $_GET['user'] ?>%20a%20partager%20cette%20photo%20de%20Camagru.&url=http%3A%2F%2F192.168.99.100%3A8080%2Findex.php%3Fcontent%3D<?php echo $_GET['content'] ?>"><div class="btn btn-lg btn-warning"><i class="fab fa-twitter"></i> Twitter</div></a></div>
				</li>
				<li class="nav-item">
					<div class="nav-link"><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F192.168.99.100%3A8080%2Findex.php%3Fcontent%3D<?php echo $_GET['content'] ?>"><div class="btn btn-lg btn-warning"><i class="fab fa-facebook-f"></i> Facebook</div></a></div>
				</li>
				<li class="nav-item">
					<div class="nav-link"><a href="mailto:?subject=<?php echo $_GET['user'] ?> partage avec vous une photo de Camagru&amp;body=Pour voir la photo visiter http://192.168.99.100:8080/index.php?content=<?php echo $_GET['content'] ?>"><div class="btn btn-lg btn-warning"><i class="far fa-envelope"></i> Email</div></a></div>
				</li>
			</ul>
		</div>
	</div>
</body>
