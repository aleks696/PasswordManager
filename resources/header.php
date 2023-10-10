<!--This file is used to auto paste in pages navbar-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <?php
        session_start();
        if (!isset($_SESSION["username"])) {?>
        <a href="/index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <?php } else {?>
            <a href="../auth/profile.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <?php } ?>
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Password Manager</span>
            </a>
        </a>

        <ul class="nav nav-pills">
            <?php
            if (!isset($_SESSION["username"])) {?>
            <li class="nav-item"><a href="../auth/login.php" class="nav-link">Sign in</a></li>
            <li class="nav-item"><a href="../index.php" class="nav-link">Sign up</a></li>
            <?php } ?>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            <?php
            if (isset($_SESSION["username"])) {?>
            <li class="nav-item"><a href="../auth/logout.php" class="nav-link">Logout</a></li>
            <?php } ?>
        </ul>
    </header>
</div>