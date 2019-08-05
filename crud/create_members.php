<?php 
    include('actions.php'); 

    $edit = false;    

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM crud_members WHERE id = $id ";
        $result = $db->query($sql);
        $member = $result->fetch_object();

        $name = $member->name;
        $office = $member->office;
        $id = $member->id;

        $edit = true;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Projeto Crud - Seraph</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th colspan="3" >Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sqlMembers = "SELECT * FROM crud_members";
            $members = $db->query($sqlMembers);
            while($obj = $members->fetch_object()) { ?>
            <tr>
                <td><?php echo $obj->name;?></td>
                <td><?php echo $obj->office;?></td>
                <td>
                    <a class="edit_btn" href="index.php?id=<?php echo $obj->id; ?>">Editar</a>
                </td>
                <td>
                    <a class="delete_btn" href="actions.php?id=<?php echo $obj->id; ?>&delete=true">Deletar</a>
                </td>
                <td>
                    <a class="delete_btn" href="pdf_member.php?id=<?php echo $obj->id; ?>">PDF</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>    
    <form method="post" action="actions.php">

    <a class="btn_new" href="<?=$_SERVER["REQUEST"];?>/seraph/crud/index.php">Novo</a>
    <a class="btn_new" href="<?=$_SERVER["REQUEST"];?>/seraph/crud/logoff.php">Sair</a>

            <br>
            <br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label>Nome</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Cargo</label>
            <input type="text" name="office" value="<?php echo $office; ?>">
        </div>
        <div class="input-group">
        
        <?php if($edit == false): ?>
            <button class="btn" type="submit" name="save">Gravar</button>
        <?php else: ?>
            <button class="btn" type="submit" name="update">Atualizar</button>
        <?php endif ?>
        </div>    
    </form>
</body>
</html>

<?php $db->close(); ?>