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

		body {
			padding: 24px;
			font-family: 'Source Sans Pro', sans-serif;
			margin: 0;
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
			min-height: 100vh;
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
			padding: 18px 0;
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

		.underlay-photo {
			-webkit-animation: hue-rotate 6s infinite;
			animation: hue-rotate 6s infinite;
			background: url("https://64.media.tumblr.com/a060b877e1213d91609de3621a0dc4de/tumblr_orrh59u98w1r57tabo1_1280.jpg");
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

    Búsqueda de música: <input type="search" name="busquedamusica" placeholder="Canción, autor, instrumento">

    <input type="submit" value="Buscar">

  </p>

</form>

	<div class="container">

		<div class="table">
			<div class="table-header">
				<div class="header__item"><a id="name" class="filter__link" href="#">Canciones</a></div>

			</div>
			<div class="table-content">
				<div class="table-row">
					<?php foreach ($this->canciones as $c) { ?>
						<!-- variable que viene del controlador y recibe views -->
						<?= $c['nombre'] ?> <br />
					<?php } ?>
					<div class="table-data"></div>
					<div class="underlay-photo"></div>

				</div>

			</div>
		</div>
	</div>


</body>

</html>