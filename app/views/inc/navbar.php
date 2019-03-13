<?php

?>

<nav class="navbar navbar-expand-md bg-primary navbar-dark mb-3">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="<?= URLROOT; ?>"><?= SITENAME; ?></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <!-- <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/pages/about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])):  ?>

                    <li class="nav-item">
                        <a class="nav-link"><i class="fa fa-user"></i>   <?= $_SESSION['user_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URLROOT; ?>/users/logout">Logout</a>
                    </li>

                <?php else:  ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URLROOT; ?>/users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URLROOT; ?>/users/login">Login</a>
                    </li>
                <?php endif;  ?>
            </ul>
        </div> -->
    </div>
</nav>
