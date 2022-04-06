<?php
$currentPath = lcfirst($this->request->getParam('controller'));
$dashb = lcfirst($this->request->getParam('action'));

?>
<div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

    </div><a class="navbar-brand" href="">
        <div class="d-flex align-items-center py-3"><img class="me-2" src="/assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">TTC</span>
        </div>
    </a>
</div>
<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
            
            <li class="nav-item">
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                    </div>
                </a>
                <ul class="nav collapse" id="dashboard">
                    <li class="nav-item"><a class="nav-link" href="/index.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Default</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard/analytics.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Analytics</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard/crm.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">CRM</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard/e-commerce.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">E commerce</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard/project-management.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Management</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard/saas.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">SaaS</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="<?php echo $this->Url->build(('/users')); ?>" role="button" data-bs-toggle="" aria-expanded="false" class="nav-link  
            <?php
            if ($currentPath == 'users') {
                echo 'active';
            }
            ?>">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fas fa-user"></span></span>
                        <span class="nav-link-text ps-1">Users</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo $this->Url->build(('/meetings')); ?>" role="button" data-bs-toggle="" aria-expanded="false" class="nav-link  
            <?php
            if ($currentPath == 'meetings') {
                echo 'active';
            }
            ?>">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fab fa-meetup"></span></span>
                        <span class="nav-link-text ps-1">Meetings</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo $this->Url->build(('/socialMedia')); ?>" role="button" data-bs-toggle="" aria-expanded="false" class="nav-link  
            <?php
            if ($currentPath == 'socialMedia') {
                echo 'active';
            }
            ?>">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fas fa-share-alt"></span></span>
                        <span class="nav-link-text ps-1">Social Media</span>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo $this->Url->build(('/musicVideo')); ?>" role="button" data-bs-toggle="" aria-expanded="false" class="nav-link  
            <?php
            if ($currentPath == 'musicVideo') {
                echo 'active';
            }
            ?>">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fas fa-music"></span></span>
                        <span class="nav-link-text ps-1">Music Video</span>
                    </div>
                </a>
            </li>

        </ul>

    </div>
</div>