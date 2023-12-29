<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?php echo URLROOT . "assets/imgs/logo.jpg" ?>" alt="logophoto" width="30" height="30"/>
            Navbar
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">One</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if(getUserSession() != false) :?>
                            <?php echo getUserSession()->name; ?>
                        <?php else :?>
                            Member
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if(getUserSession() != false) :?>
                            <li><a class="dropdown-item" href="<?php echo URLROOT ."user/logout" ?>">Logout</a></li>
                        <?php else :?>
                            <li><a class="dropdown-item" href="<?php echo URLROOT ."user/login" ?>">Login</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT ."user/register" ?>">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>