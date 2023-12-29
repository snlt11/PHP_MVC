<?php require_once APPROOT ."/views/inc/header.php"?>
<?php require_once APPROOT ."/views/inc/nav.php"?>

<h1>Index Page</h1>
<?php flash('login_success') ?>
<?php print_r(getUserSession()) ?>

<?php require_once APPROOT ."/views/inc/footer.php"?>
