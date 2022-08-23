<?php
    session_start();
    $pagina = 'Cadastro - Projeto 2';
    $wrap = 'wrap-login100';
    require('head.php');
?>

<form action='cadastro.php' class="login100-form validate-form flex-sb flex-w" method="post">
    <span class="login100-form-title p-b-32">
        Pagina de Cadastro
    </span>
    <span class="txt1 p-b-11">
        Login
    </span>
    <div class="wrap-input100 validate-input m-b-36" data-validate = "Login é requirido">
        <input class="input100" type="text" name="login" >
        <span class="focus-input100"></span>
    </div>
    <span class="txt1 p-b-11">
        Senha
    </span>
    <div class="wrap-input100 validate-input m-b-12" data-validate = "Senha é requirido">
        <span class="btn-show-pass">
        <i class="fa fa-eye"></i>
        </span>
        <input class="input100" type="password" name="senha" >						
        <span class="focus-input100"></span>
        </div>
    <span class="txt1 p-b-11">
        Nome
    </span>
    <div class="wrap-input100 validate-input m-b-36" data-validate = "Nome é requirido">
        <input class="input100" type="text" name="nome" >
        <span class="focus-input100"></span>
    </div>
    <span class="txt1 p-b-11">
        Data Nascimento
    </span>
    <div class="wrap-input100 validate-input m-b-36" data-validate = "Data é requirido">
        <input class="input100" type="date" name="data_nasc" >
        <span class="focus-input100"></span>
    </div>
    <div class="btn-group" role="group" aria-label="">
        <div class="container-inserir-vid-btn m-b-2">
        <button class="inserir-vid-btn">
            Cadastrar
        </button>
        </div>
        <div class="container-listar-vid-btn m-b-4">
            <a href="login.php" class="listar-vid-btn">                
                Voltar
            </a>
        </div>
</form>
    