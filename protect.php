<?php
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Você não pode acessar essa página sem estar logado! <p><a href=\"index.php\">entrar</a></p>");

}
?>
