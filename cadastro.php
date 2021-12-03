<!DOCTYPE html>
<html>
<head>
    <title>teste</title>
</head>
<body>
    <div>
        <form method="POST">

            <h4>cadastro</h4>

            <input type="text" placeholder="usuario" name="usuario">
            <br>
            <br>
            <input type="password" placeholder="senha" name="senha">
            <br>
            <br>
            <button type="submit">cadastrar</button>

        </form>
    </div>
</body>
</html>
<?php
if (!isset($_POST['usuario'])) {
    return;
}
$usuario = addslashes($_POST['usuario']);
$senha   = addslashes($_POST['senha']);
if (empty($usuario) || empty($senha)) {
    echo "os dois campos precisam ser preenchidos";
    return;
}
require 'conexao.php';
$c = new conexao();
$c->getcon();
$c->cadastrar($usuario, $senha);
echo "cadastrado com sucesso. volte a tela de login para acessar";
?>