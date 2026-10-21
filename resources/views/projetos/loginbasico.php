<?php
$usuarioCorreto = "felipe";
$senhaCorreta = "12345";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["usuario"], $_POST["senha"])) {
    if ($_POST["usuario"] === $usuarioCorreto && $_POST["senha"] === $senhaCorreta) {
        $mensagem = "Login realizado com sucesso";
    } else {
        $mensagem = "Usuário ou senha incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login básico</title>
</head>
<body>
    <main class="container">
        <h1>Login básico</h1>
        <form method="POST" action="">
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Entrar</button>
        </form>
        <?php if ($mensagem !== ""): ?>
            <p class="card" role="status"><?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
<?php
// Credenciais para testar: felipe / 1234.
// GET envia os dados pela URL, onde ficam visíveis; POST envia os dados no corpo da requisição.
?>