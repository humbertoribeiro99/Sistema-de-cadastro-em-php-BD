<?php

require('../db.php');
$id = isset($_SESSION['id_vid']);
$ps = $pdo->prepare("SELECT * FROM videos WHERE id_video = ?");
$ps->execute([ $id ]);
$linha = $ps->fetch();
$img = $linha['imagem'];
$type = $linha['meta'];
header("Content-type: ".$type."");
echo $img;
