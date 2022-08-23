<?php

    require('db.php');
    require('head.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'];

    if(
        validar_senha($senha) &&
        validar_nome($nome) &&
        validar_data($data_nasc)
    ) {
        $ps = $pdo->prepare(
            'SELECT * FROM usuario WHERE login = ?'
        );
        $ps->execute([ $login ]);

        if($ps->fetch()){
            echo "<span class='txt1 p-b-11'>Usuario Já Cadastrado</span>";
            echo "<br><span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
            //redirecionamento para outra pagina usando 'html meta'
            echo "<meta http-equiv='refresh' content='10;url=formCadastro.php'>";
        } else {
            fazer_cadastro($login, $senha, $nome, $data_nasc);
        }

    }
    else {
        echo "<span class='txt1 p-b-11'>Erro no cadastro do Usuario, Dados Inválidos</span>";
        echo "<br><span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
        echo "<meta http-equiv='refresh' content='10;url=formCadastro.php'>";
    }

    function fazer_cadastro($login, $senha, $nome, $data_nasc){
        global $pdo; 
        //por estar dentro de uma função é preciso que declare que essa variavel é global

        $salt = 'projetodoze'.$login;
        $senha_has = sha1($salt.$senha);

        $ps = $pdo->prepare(
            'INSERT INTO usuario (login, senha, nome, data_nasc) VALUES (?,?,?,?)'
        );
        $ps->execute([ $login, $senha_has, $nome, $data_nasc ]);

        if($ps->rowCount() == 1){ //verifica se funcionou, pois ao criar um dado no BD ele insere uma linha no BD
            echo "<span class='txt1 p-b-11'>Cadastro Efetuado Com Sucesso</span>";
            echo "<br><span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
            echo "<meta http-equiv='refresh' content='10;url=index.php'>";
        } else {
            echo "<span class='txt1 p-b-11'>Erro no cadastro do Usuario</span>";
            echo "<br><span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
            echo "<meta http-equiv='refresh' content='10;url=formCadastro.php'>";
        }
    }

    function validar_nome($nome){
        return preg_match('/[^[:alpha:]_]/',$nome);
        //o nome só pode conter letras, nada de numeros ou caracteres especiais 
    }
    function validar_senha($senha){
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{6,}$/', $senha);
        //faz a verificação da senha, buscando ter entre 6 ou + caracteres, letra maiuscula, minuscula, numero e algum dos caracteres especial(_@$)
    }
    function validar_data($data_nasc){
        // separando yyyy, mm, ddd
        list($ano, $mes, $dia) = explode('-', $data_nasc);

        // data atual
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

        // cálculo
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        if($idade >= 5 && $idade <= 100){
            return TRUE;
        } else {
            return FALSE;
        }
    }
?>