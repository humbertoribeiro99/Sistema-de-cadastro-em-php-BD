<?php
    require('autentica.php');
    $pagina = "Inicio - Porjeto 2";
    $wrap = 'wrap-index100';
    require('db.php');
    require('navbar.php') 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?= $pagina ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>
<div class="limiter">
	<div class="container-login100">
		<div class="<?= $wrap ?> p-l-85 p-r-85 p-t-55 p-b-55">
        <span class="login100-form-title p-b-32">
            Bem Vindo, <?= $_SESSION['nome'] ?>
        </span>
        <table class="table">

            <?php
            
            $ps = $pdo->prepare("SELECT * FROM videos WHERE id_video_usuario = ?");
            $ps->execute([ $_SESSION['id'] ]);
            echo "<tr>
                <th scope='col'>Nome</th>
                <th scope='col'>Descrição</th>
                <th scope='col'>Data Envio</th>
                <th scope='col'>Thumbnail</th>
                <th scope='col'>Deletar</th>
                </tr>";
            while($linha = $ps->fetch()){
                $_SESSION['id_vid'] = $linha['id_video'];
                //editar a data para formato BR(dia/mes/ano) e retirar a hora
                $data = date('d/m/Y',  strtotime($linha['data_envio']));
                echo "<tr>
                      <td>$linha[nome]</td>
                      <td>$linha[descricao]</td>
                      <td>$data</td>
                      <td><embed src='data:".$linha['meta'].";base64,".base64_encode($linha['imagem'])."' width='150'/></td>
                      <td><a class='deletar' href='deletar.php?id={$linha['id_video']}'><img src='images/icons/trash.png' alt='delete' width='15px'/></a></td>
                      </tr>";

                /* echo "<a target='_blank' href='php/view.php?id=". $linha['id_video']."'>". $linha['nome']."</a>"; */
            }
            
            ?>
        </table>
        <div class="btn-group" role="group" aria-label="">
            <div class="container-inserir-vid-btn m-b-2">
                <button onclick="location.href='videoForm.php'" class="inserir-vid-btn">
                    Inserir
                </button>
            </div>
           <!--  <div class="container-listar-vid-btn m-b-4">
                <button onclick="location.href='editarVideo.php'" class="listar-vid-btn">
                    Editar
                </button>
            </div>  -->
    </div>
    
    