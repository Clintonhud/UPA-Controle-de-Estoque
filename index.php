<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="_imagens/titulo.png">
    <title>Login do Sistema</title>
    <link rel="stylesheet" href="_css/estilo.css">
</head>

<body>
    <section id="telaprincipal">
        <h1>CONTROLE DE ESTOQUE</h1>
        <h2>Unidade de Pronto Atendimento de Itacoatiara</h2>
    </section>
    <aside id="lateralLogin">
        <h1>LOGIN</h1>
        <form method="POST" action="_conexao/login.php">
            <p><label for="cUsuario"></label><input type="text" name="usuario" id="cUsuario" size="50" maxlength="30"
                    placeholder="Usuário" required autofocus></p>
            <p><label for="cSenha"></label><input type="password" name="senha" id="cSenha" size="50" maxlength="30"
                    placeholder="Senha" required autofocus /></p>
            <button type="submit">Acessar</button>
        </form>
        <footer id="rodape">
            <p>Corporation 2020 - Sannins Lendários</p>
        </footer>
    </aside>
</body>

</html>