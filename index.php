<!DOCTYPE html>
<html>

<head>
    <title>teste</title>
</head>

<body>
    <div>

        <form method="POST">

            <h4>Login</h4>

            <input type="text" placeholder="usuario" name="usuario">
            <br>
            <br>
            <input type="password" placeholder="senha" name="senha">
            <br>
            <br>
            <button type="submit">Logar</button>

            <br>
            <a href="cadastro.php">Cadastre-se</a>

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
    return;
}
require 'conexao.php';
$c =  new conexao();
$c->getcon();
$resultado =  $c->logar($usuario, $senha);
if ($resultado == true) {
    return header("Location:home.php");
}
echo "erro ao logar";

?>