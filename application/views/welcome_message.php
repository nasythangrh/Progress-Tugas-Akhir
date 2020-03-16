<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Donasi Panti Asuhan Kabupaten Malang</title>
	<link href="<?php echo base_url() ?>assets/img/fav.png" rel="shortcut icon">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background: url('assets/img/bg1.jpg');
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		text-align: center;
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin:15% auto;
		
		width: 25%;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 30px white;
	}
	.input{
		display: block;
		margin: 10px auto;
		width: 80%;
		padding: 9px;
		background: #ffffffc9;
		color: black;
		outline: none;
		border: 0;
		border-radius: 4px;
		b

	}
	.input:hover{
		background-color: lightgrey;
	}
	
	.btn-login{
		margin-left: 6%;
		margin-right: 8%;
		margin-bottom: 20px;
		width: 87.5%;
		padding: 9px;
		border-radius: 4px;
		outline: none;
		border: none;
		color: white;
		background-color: #08080847;

	}

	</style>
</head>
<body>
	

<div id="container">

	<h1>Silahkan Masuk</h1>
	<form action="Auth/login" method="post">
		<input type="text" name="username" class="input" placeholder="username">
		<input type="password" name="password" class="input" placeholder="password">
		<button type="submit" name="submit"  class="btn-login">Login</button>


	</form>

	
</div>

</body>
</html>