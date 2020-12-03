<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		@import url(https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700);
		@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

		body {
			font-family: 'Open Sans';
			margin: 0;
			background: url("https://64.media.tumblr.com/d94956ecde756e23422cf7dfd1649392/f9c3153b88211c62-56/s2048x3072/921a93995af7eac2b24f3ff4568f1fa0de053f58.jpg");
			background-size: cover;
			z-index: -1;
		}

		.topnav {
			overflow: hidden;
			background-color: #e9e9e9;
			font-family: 'Open Sans';
		}

		.topnav a {
			float: left;
			display: block;
			color: black;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
			float: left;
		}
		

		.topnav a.active {
			background-color: #000000;
			color: white;
			float: right;
		}

		.topnav .search-container {
			float: right;
		}

		.topnav input[type=text] {
			padding: 6px;
			margin-top: 8px;
			font-size: 17px;
			border: none;
		}

		.topnav .search-container button {
			float: right;
			padding: 6px 10px;
			margin-top: 8px;
			margin-right: 16px;
			background: #ddd;
			font-size: 17px;
			border: none;
			cursor: pointer;
		}

		.topnav .search-container button:hover {
			background: #ccc;
		}

		@media screen and (max-width: 600px) {
			.topnav .search-container {
				float: none;
			}

			.topnav a,
			.topnav input[type=text],
			.topnav .search-container button {
				float: none;
				display: block;
				text-align: left;
				width: 100%;
				margin: 0;
				padding: 14px;
			}

			.topnav input[type=text] {
				border: 1px solid #ccc;
			}
		}

		table,
		th,
		td {

			width: 80%;
			margin: auto;
			border: 0.5px solid white;
			border-collapse: collapse;
			text-align: center;
			font-size: 25px;
			table-layout: fixed;
			background: black;
			opacity: 0.5;
			color: white;
			margin-top: 100px;
			font-family: 'Source Sans Pro', sans-serif;

		}

		th,
		td {

			padding: 20px;
			opacity: 0.9;
		}

		p {
			float: center;
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 20px;
			font-family: 'Source Sans Pro', sans-serif;

		}
	</style>
</head>

<body>

	<div class="topnav">
		<div class="search-container">
	
			<form action="" method="post">
			<a class="active" href="./login">Login</a>
				<input type="text" placeholder="Cancion, dificultad" name="busquedamusica">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>

	<div class="table-content">
		<table id="tabla-php">
			<?php foreach ($this->canciones as $c) {
				echo "<tr>";
				echo "<td>" . $c['nombre'] . "</td>";
				echo "<td><a href='files/" . $c['ubicacion'] . "'> Abrir</a></td>";
				echo "</tr>";
			?>
				<tr class="filler"></tr>
			<?php
			}
			?>
		</table>
	</div>

	<form action="" method="post" enctype="multipart/form-data">
		<p> Añade tus tablaturas aquí!
			<input name="nombrecancion" required="true" placeholder="Nombre de la Cancion" />
			<input name="nombreartista" required="true" placeholder="Nombre del Artista" />

			<input type="file" name="file" value="">
			<input type="submit" name="submit" value="Subir"><br>
		</p>

	</form>
</body>

</html>