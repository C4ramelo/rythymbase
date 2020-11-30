<!-- html/ListadoCanciones.php EL HTML tiene que tener el mismo nombre que la Clase de la Vista-->

<!DOCTYPE html>
<html>

<head>
	<title>Listado de Canciones</title>
	<style>
		@import url(https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700);
		@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

		*,
		*:before,
		*:after {
			box-sizing: border-box;
		}

		p {

			/*padding: 10px; */
			font-family: 'Source Sans Pro', sans-serif;
			margin: 0;
			color: white;
			margin-right: auto;
			margin-left: auto;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 5vh; 


		}

		body {
			font-family: 'Source Sans Pro', sans-serif;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			margin: 0;
		}

		.container {
			max-width: 1000px;
			margin-right: auto;
			margin-left: auto;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 5vh;
		}

		.table {
			width: 100%;
			border: 1px solid #eee;
		}

		.table-header {
			display: flex;
			width: 100%;
			background: #000;
			padding: 18px 0;
			
		}

		.table-row {
			display: flex;
			width: 100%;
			/*padding: 18px 0;*/
		}

		.table-row:nth-of-type(odd) {
			background: #eee;
		}

		.table-data,
		.header__item {
			flex: 1 1 20%;
			text-align: center;
		}

		.header__item {
			text-transform: uppercase;
		}

		.filter__link {
			color: white;
			text-decoration: none;
			position: relative;
			display: inline-block;
			padding-left: 24px;
			padding-right: 24px;
		}

		.filter__link::after {
			content: '';
			position: absolute;
			right: -18px;
			color: white;
			font-size: 12px;
			top: 50%;
			transform: translateY(-50%);
		}

		.filter__link.desc::after {
			content: '(desc)';
		}

		.filter__link.asc::after {
			content: '(asc)';
		}


		[class*=underlay] {
			left: 0;
			min-height: 100%;
			min-width: 100%;
			position: fixed;
			top: 0;
		}

		.underlay-photo {
			background: url("https://64.media.tumblr.com/d94956ecde756e23422cf7dfd1649392/f9c3153b88211c62-56/s2048x3072/921a93995af7eac2b24f3ff4568f1fa0de053f58.jpg");
			background-size: cover;
			z-index: -1;
		}

		.underlay-black {
			background: rgba(0, 0, 0, 0.7);
			z-index: -1;
		}
	</style>
</head>

<body>
	<form action="" method="post">

		<p>

			Motor de búsqueda de música: 
			<input type="search" class="p" name="busquedamusica" placeholder="Canción, autor, instrumento" required="true">

			<input type="submit" value="Buscar">

		</p>

	</form>
	<form action="" method="post" enctype="multipart/form-data">
		<p> Añade tus tablaturas aquí!
			<input name="nombrecancion" required="true" placeholder="Nombre de la Cancion" />
			<input name="nombreartista" required="true" placeholder="Nombre del Artista" />

			<input type="file" name="file" value="">
			<input type="submit" name="submit" value="Subir"><br>
		</p>

	</form>
	<div class="container">

		<div class="table">
			<div class="table-header">
				<div class="header__item"><a id="name" class="filter__link" href="#">Canciones</a></div>

			</div>
			<div class="table-content">
				<div class="table-row">
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


					<div class="table-data"></div>
					<div class="underlay-photo"></div>

				</div>

			</div>
		</div>
	</div>



</body>

</html>