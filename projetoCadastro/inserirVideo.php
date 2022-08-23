<?php
    require('autentica.php');
    $pagina = 'Inserir Video';
    $wrap = 'wrap-index100';
    require('head.php');
    require('db.php');

    $nome_vid = $_POST['nome_vid'];
    $desc_video = $_POST['desc_video'];
    
    //DEFININDO TAMANHO MAXIMO DA IMAGEM
    /* define('TAMANHO_MAXIMO', (2 * 1024 * 1024));
    if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo))
    {
        echo ('Isso não é uma imagem válida');
        exit;
    }
    // Tamanho
    if ($tamanho > TAMANHO_MAXIMO)
    {
        echo ('A imagem deve possuir no máximo 2 MB');
        exit;
    } */

    //pegando o nome temporario do arquivo
    $temp_name = file_get_contents($_FILES['img']['tmp_name']);
    $type = $_FILES['img']['type'];

    $ps = $pdo->prepare("INSERT INTO videos (nome, descricao, imagem, id_video_usuario, meta) VALUES (?,?,?,?,?)");
    $ps->execute([ $nome_vid, $desc_video, $temp_name, $_SESSION['id'], $type ]);

    if($ps->rowCount() == 1){ //verifica se funcionou, pois ao criar um dado no BD ele insere uma linha no BD
        echo "<span class='txt1 p-b-11'>Video Enviado Com Sucesso</span>";
        echo "<br><span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
        echo "<meta http-equiv='refresh' content='10;url=index.php'>"; 
    } else {
        echo "<span class='txt1 p-b-11'>Erro No Envio Do Video</span>";
        echo "<br><span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
        echo "<meta http-equiv='refresh' content='10;url=index.php'>";
    }
?>
