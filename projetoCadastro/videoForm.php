<?php
    session_start();
    $pagina = 'Cadastro - Projeto 2';
    $wrap = 'wrap-login100';
    require('head.php');
?>

<form action='inserirVideo.php' class="login100-form validate-form flex-sb flex-w" method="post" enctype="multipart/form-data">
    <span class="login100-form-title p-b-32">
        Insira Seu Video
    </span>
    <span class="txt1 p-b-11">
        Nome do Video
    </span>
    <div class="wrap-input100 validate-input m-b-36" data-validate = "Nome é requirido">
        <input class="input100" type="text" name="nome_vid" >
        <span class="focus-input100"></span>
    </div>
    <span class="txt1 p-b-11">
        Descrição
    </span>
    <div class="wrap-input100 validate-input m-b-12" data-validate = "Descrição é requirido">
        <textarea class="form-control" name="desc_video" rows="3" placeholder="Descrição de até 200 caracteres"></textarea>
    </div>
    <span class="txt1 p-b-11">
        Capa do Video
    </span>
    <div class="wrap-input100 validate-input m-b-36">
        <input class="form-control" type="File" name="img"/>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Enviar
        </button>
    </div>
</form>