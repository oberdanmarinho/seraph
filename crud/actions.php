<?php
    include("conection.php");

    $name = "";
    $office = "";
    $id = 0;

    if(isset($_POST['save'])) {
        $name = $_POST['name'];
        $office = $_POST['office'];

        $sql = "INSERT INTO crud_members (name, office) VALUES ('$name', '$office')";
        $db->query($sql);
        $db->close();

        $_SESSION['msg'] = "Gravado com sucesso!";
        header('location: index.php');
    }

    if (isset($_POST['update'])){
        $name = ($_POST['name']);
        $office = ($_POST['office']);
        $id = ($_POST['id']);

        $sql = "UPDATE crud_members SET name='$name', office='$office' WHERE id=$id";
        $db->query($sql);
        $db->close();

        $_SESSION['msg'] = "Atualizado com sucesso!";
        header('location: index.php');
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM crud_members WHERE id=$id";
        $db->query($sql);
        $db->close();

        $_SESSION['msg'] = "Deletado com sucesso!";
        header('location: index.php');
    }