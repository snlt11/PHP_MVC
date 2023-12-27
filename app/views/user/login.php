<?php require_once APPROOT ."/views/inc/header.php"?>
<?php require_once APPROOT ."/views/inc/nav.php"?>

<div class="container col-md-4 my-4">
    <form action="<?php echo URLROOT.'user/login'?>" class="form" method="post" autocomplete="off">
        <div class="text-center">
            <h1>Post To Login</h1>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control <?php echo !empty($data['email_error']) ? 'is-invalid' : ''; ?>" name="email" id="email" aria-describedby="emailHelp">
            <span class="text-danger" ><?php echo !empty($data['email_error']) ? $data["email_error"] : ''; ?></span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control <?php echo !empty($data['password_error']) ? 'is-invalid' : ''; ?>" name="password" id="password">
            <span class="text-danger" ><?php echo !empty($data['password_error']) ? $data["password_error"] : ''; ?></span>
        </div>
        <div class="text-center">
            <div class="mb-2">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
            <span>Don't have an account ?</span>
            <a href="<?php echo URLROOT."user/register"?>">Sign up</a>
        </div>
    </form>

</div>
<?php require_once APPROOT ."/views/inc/footer.php"?>
