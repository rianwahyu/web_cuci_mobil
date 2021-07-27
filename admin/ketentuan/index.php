<!DOCTYPE html>
<!--
Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link type="text/css" href="sample/css/sample.css" rel="stylesheet" media="screen" />
	<title>Cimoling Apps - Ketentuan</title>

	<style>
		.button {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
	</style>
</head>

<body>

	<!-- <header>
	<div class="centered">
		<h1><a href="https://ckeditor.com/ckeditor-5"><img src="sample/img/logo.svg" alt="WYSIWYG editor - CKEditor 5" /></a></h1>

		<input type="checkbox" id="menu-toggle" />
		<label for="menu-toggle"></label>
		  
		<nav>
			<ul>
				<li><a href="https://ckeditor.com/ckeditor-5">Project homepage</a></li>
				<li><a href="https://ckeditor.com/docs/">Documentation</a></li>
				<li><a href="https://github.com/ckeditor/ckeditor5">GitHub</a></li>
			</ul>
		</nav>
	</div>
</header> -->

	<?php

	include '../../connection.php';

	$query = "SELECT * FROM ketentuan WHERE id='1' ";
	$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	$row = mysqli_fetch_array($result);

	?>

	<main>
		<form method="POST" action="">
			<div class="message">
				<div class="centered">
					<h1>Syarat dan Ketentuan !</h1>

					<p>Berikut ini syarat dan ketentuan penggunaan aplikasi cimoling. Untuk update data tekan tombol Update</p>
				</div>
			</div>
			<div class="centered">
				<!-- <div id="editor" name="deskripsi">

					<?php echo $row['deskripsi'] ?>
				</div> -->

				<textarea id="editor" name="deskripsi">
				<?php echo $row['deskripsi'] ?>
				</textarea>

				
				<button type="submit" class="button" name="submit">Update</button>
			</div>

		</form>


	</main>

	<?php 
	include '../../connection.php';
	if(isset($_POST['submit'])){
		$deskripsi = $_POST['deskripsi'];

		$query = "UPDATE ketentuan SET deskripsi='$deskripsi' WHERE id='1' ";
		$result = mysqli_query($dbc, $query);
		if($result == true){
			header("location:index.php");
		}
	}
	?>

	<footer>
		<div>
			<p>Cimoling Apps - CKEDITOR<a href="https://ckeditor.com/ckeditor-5">https://ckeditor.com/ckeditor-5</a></p>
			<p>Copyright © 2021, <a href="https://cksource.com/">CKSource</a> – Rigadevofficial All rights reserved.</p>
		</div>
	</footer>

	<script src="ckeditor.js"></script>

	<script>
		ClassicEditor
			.create(document.querySelector('#editor'), {
				// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
			})
			.then(editor => {
				window.editor = editor;
			})
			.catch(err => {
				console.error(err.stack);
			});
	</script>

</body>

</html>