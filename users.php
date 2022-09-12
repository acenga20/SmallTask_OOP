<?php

require 'bootstrap.php';
session_start();
$_SESSION;
if(isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN'){
    require 'layout/headerAdmin.php';

}elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'SIMPLE') {
    require 'layout/headerUser.php';
}else{
    require 'layout/header.php';
}
?>

<?php

    $container = new Container($configuration);
    $userManager = $container->getUserManager();
    $users = $userManager->getUsers();
    if (isset($_POST['delete'])){
        $userManager->deleteUser($_POST['id']);
    }

?>
<div class="container">
    <h1><b>Users</b></h1>
    <p>Manage all your users in one page.</p>
    <br>
    <div class="row">
        <?php
        foreach($users as $user){ ?>
            <div class="col-md-4 pet-list-item">
                <form action = 'users.php' method="POST">
                    <h2><?php echo $user->getName();?></h2>

                        Username: <?php echo $user->getUserName(); ?> <br>
                        Email: <?php echo $user->getEmail(); ?><br>
                        Role: <?php echo $user->getRole(); ?><br>
                    <input type="hidden" name="id" value='<?=$user->getId();?>' />

                    </p>
                    <input type='submit' name="delete" value='Delete'/>
                </form>


            </div>
        <?php } ?>

    </div>
</div>
<hr>

<?php
    require 'layout/footer.php';
?>