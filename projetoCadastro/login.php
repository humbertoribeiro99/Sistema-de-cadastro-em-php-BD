<?php
	$pagina = 'Login - Projeto 2';
	$wrap = 'wrap-login100';
	require('head.php');
?>

<form action='verifica_login.php' class="login100-form validate-form flex-sb flex-w" method="post">
	<span class="login100-form-title p-b-32">
		Pagina de Login
	</span>

	<span class="txt1 p-b-11">
		Login
	</span>
	<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
		<input class="input100" type="text" name="login" >
		<span class="focus-input100"></span>
	</div>
	
	<span class="txt1 p-b-11">
		Senha
	</span>
	<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
		<span class="btn-show-pass">
			<i class="fa fa-eye"></i>
		</span>
		<input class="input100" type="password" name="senha" >
		<span class="focus-input100"></span>
	</div>
	
	<div class="btn-group" role="group" aria-label="">
		<div class="container-login100-form-btn m-b-2">
			<input type="submit" class="login100-form-btn" value="Entrar">
		</div>
		<div class="container-cadastrar-form-btn m-b-4">
			<button onclick="location.href='formCadastro.php'" class="cadastrar-form-btn">
				Cadastrar
			</button>
		</div>
	</div>
</form>
</div>
</div>
</div>
	
<?php
	require('footer.php');
?>