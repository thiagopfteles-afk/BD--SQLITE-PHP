<?php
// Session deve ser a PRIMEIRA coisa - antes de qualquer output
if(!isset($_SESSION)) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('conexao.php');
//include('protect.php');
//include('logout.php');

$mensagem_erro = "";

if(isset($_POST['email']) && isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        $mensagem_erro = "Preencha seu email";
    
    } else if(strlen($_POST['senha']) == 0){
        $mensagem_erro = "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;
    

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit();

        } else {
            $mensagem_erro = "Falha ao logar! Email ou senha incorretos";
        }
    }
}
?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-style.css">
    <title>Formulário de Login/Cadastro</title> 
</head>

<body>
    
    <div class="container" id="container">

        <div class="form-container cadastrar">
            <form action="home.html" id="form-criarConta">

                <h1>Criar Conta</h1>
                
                <div class="social-icones">
                    <a href="#" class="icon"><img width="96" height="96" src="https://img.icons8.com/color/96/google-logo.png" alt="google-logo" /></a>
                            
                    <a href="#" class="icon"><img width="96" height="96" src="https://img.icons8.com/fluency/96/facebook-new.png" alt="facebook-new" /></a>
                            
                    <a href="#" class="icon"><img width="90" height="90" src="https://img.icons8.com/ios-glyphs/90/github.png" alt="github" /></a>              
                </div>

                <p>ou use seu e-mail para registro</p>
                
                <div class="input-container">
                    <input type="text" placeholder="Nome" id="nome-registrar">
                    <div class="mensagem-erro"></div>
                </div>
                
                
                <div class="input-container">
                    <input type="email" placeholder="E-mail" id="email-registrar">
                    <div class="mensagem-erro"></div>
                </div>
                
                
                <div class="input-container">
                    <input type="password" placeholder="Senha" id="senha-registrar">
                    <div class="instrucoes-senha">
                        Mínimo 8 caracteres, incluindo um símbolo especial (ex: !@#$).
                    </div>
                    <div class="mensagem-erro"></div>
                </div>
                
                
                <div class="input-container">
                    <input type="password" placeholder="Confirmar senha" id="confirm-senha-registrar">
                    <div class="mensagem-erro"></div>
                </div>

                <button type="submit" class="btn">Cadastre-se</button>
            </form>
        </div>

        <div class="form-container entrar">
            <!-- FORMULÁRIO DE LOGIN CORRIGIDO -->
            <form method="POST" id="form-entrar">
                <h1>Entrar</h1>
                
                <!-- Exibir mensagens de erro do PHP -->
                <?php if(!empty($mensagem_erro)): ?>
                    <div class="mensagem-erro-php" style="color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
                        <?php echo $mensagem_erro; ?>
                    </div>
                <?php endif; ?>
                
                <div class="social-icones">
                    <a href="#" class="icon"><img width="96" height="96"
                            src="https://img.icons8.com/color/96/google-logo.png" alt="google-logo" /></a>
                    <a href="#" class="icon"><img width="96" height="96"
                            src="https://img.icons8.com/fluency/96/facebook-new.png" alt="facebook-new" /></a>
                    <a href="#" class="icon"><img width="90" height="90"
                            src="https://img.icons8.com/ios-glyphs/90/github.png" alt="github" /></a>
                </div>
                <p>ou use seu e-mail e senha</p>
            
                <div class="input-container">
                    <!-- NAME ADICIONADO para funcionar com PHP -->
                    <input type="email" name="email" placeholder="E-mail" id="email-entrar" required>
                    <div class="mensagem-erro"></div>
                </div>
                
            
                <div class="input-container">
                    <!-- NAME ADICIONADO para funcionar com PHP -->
                    <input type="password" name="senha" placeholder="Senha" id="senha-entrar" required>
                    <div class="mensagem-erro"></div>
                </div>
                
                <a href="#">Esqueceu sua senha?</a>
                <button type="submit" class="btn">Entrar</button>
            </form>
        </div>
        
        <div class="container-sobreposicao">
        
            <div class="sobreposicao">
                
                <div class="painel-sobreposicao painel-esquerda">
                    <img class="logo" src="./img/Masculife Logo - Health-Focused, Confident Design-Photoroom.png" alt="">
                    <h1>Que bom te ver!</h1>
                    <p>Entre na sua conta para acessar todo o conteúdo.</p>
                    <button class="btn btn-secundario" id="botaoEntrar">Entrar</button>
                </div>
            
                <div class="painel-sobreposicao painel-direita">
                    <img class="logo" src="./img/Masculife Logo - Health-Focused, Confident Design-Photoroom.png" alt="">
                    <h1>Junte-se a Nós!</h1>
                    <p>É rápido e fácil. Vamos criar seu perfil.</p>
                    <button class="btn btn-secundario" id="botaoCadastrar">Cadastre-se</button>
                </div>
            </div>
        </div>
    </div>

    <script src="Js/sign-script.js"></script>
</body>
</html>