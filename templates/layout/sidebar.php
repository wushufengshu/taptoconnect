<?php
$currentPath = lcfirst($this->request->getParam('controller'));
$dashb = lcfirst($this->request->getParam('action'));

?>
<div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

    </div><a class="navbar-brand" href="">
        <div class="d-flex align-items-center py-3"><img class="me-2" src="/assets/img/icons/spot-illustrations/ubtap.png" alt="" width="40" /><span class="font-sans-serif">UBTAP</span>
        </div>
    </a>
</div>
<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">

            <li class="nav-item">
                <?php ($identity->role_id == 1) ? $path = '/dashboard'  : $path = '/'; ?>
                <a href="<?php echo $this->Url->build(($path)); ?>" role="button" data-bs-toggle="" aria-expanded="false" class="nav-link  
            <?php
            if ($currentPath == 'dashboard') {
                echo 'active';
            }
            ?>">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span>
                        <span class="nav-link-text ps-1">Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <?php ($identity->role_id == 1) ? $path = '/users'  : $path = '/'; ?>
                <a href="<?php echo $this->Url->build(($path)); ?>" role="button" data-bs-toggle="" aria-expanded="false" class="nav-link  
                <?php echo ($currentPath == 'users') ?  'active' : ''; ?>">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fas fa-user"></span></span>
                        <span class="nav-link-text ps-1">Users</span>
                    </div>
                </a>
            </li>
            <?php if ($identity->role_id == 1) : ?>
                <li class="nav-item">
                    <?php ($identity->role_id == 1) ? $path = '/cards'  : $path = '/'; ?>
                    <a href="<?php echo $this->Url->build(($path)); ?>" role="button" data-bs-toggle="" aria-expanded="false" class="nav-link  
                    <?php echo ($currentPath == 'cards') ?  'active' : ''; ?>">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="far fa-credit-card"></span></span>
                            <span class="nav-link-text ps-1">Cards</span>
                        </div>
                    </a>
                </li>
            <?php endif; ?>

        </ul>

    </div>
</div>