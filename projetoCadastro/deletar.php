<?php
    require('autentica.php');
    $pagina = 'Inserir Video';
    $wrap = 'wrap-index100';
    require('head.php');
    require('db.php');

    $id_vid = $_GET['id'];

    $ps = $pdo->prepare("DELETE FROM videos where id_video = ?");
    $ps->execute([ $id_vid ]);

    echo "<span class='txt1 p-b-11'>Video Deletado Com Sucesso</span>";
    echo "<br><span class='txt2 p-b-20'>A pagina será redirecionada em 7 segundos</span>";
    echo "<meta http-equiv='refresh' content='7;url=index.php'>";

?>
