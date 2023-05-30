<?php
    include("conecta.php");

    $matricula = $_POST["matricula"];
    $nome      = $_POST["nome"];
    $idade     = $_POST["idade"];

    //SE CLICOU NO BOTÃO INSERIR
    if(isset($_POST["inserir"])) {
        $comando = $pdo->prepare("INSERT INTO alunos VALUES($matricula,'$nome',$idade)");
        $resultado = $comando->execute();
        header("Location: forms.html");
    }

    //SE CLICOU NO BOTÃO EXCLUIR
    if(isset($_POST["excluir"])) {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: forms.html");
    }

    //SE CLICOU NO BOTÃO ALTERAR
    if(isset($_POST["alterar"])) {
        $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: forms.html");
    }

    //SE CLICOU NO BOTÃO LISTAR
    if(isset($_POST["listar"])) {
        $comando = $pdo->prepare("SELECT * FROM alunos");
        $resultado = $comando->execute();

        while( $linhas = $comando->fetch()){
            $M = $linhas["matricula"];
            $N = $linhas["nome"];
            $I = $linhas["idade"];
            echo("Matricula: $M Nome: $N idade: $I <br><br>");
        }
    }
?>
    
    