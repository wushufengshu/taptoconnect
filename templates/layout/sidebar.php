<?php
$currentPath = lcfirst($this->request->getParam('controller'));
$dashb = lcfirst($this->request->getParam('action'));

?>
<div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

    </div><a class="navbar-brand" href="../index.html">
        <div class="d-flex align-items-center py-3"><img class="me-2" src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
        </div>
    </a>
</div>
<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">

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
            <li class="nav-item">
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                    </div>
                </a>
                <ul class="nav collapse" id="dashboard">
                    <li class="nav-item"><a class="nav-link" href="../index.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Default</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../dashboard/analytics.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Analytics</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../dashboard/crm.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">CRM</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../dashboard/e-commerce.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">E commerce</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../dashboard/project-management.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Management</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../dashboard/saas.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">SaaS</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <!-- label-->
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">App
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>
                <!-- parent pages--><a class="nav-link" href="../app/calendar.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-alt"></span></span><span class="nav-link-text ps-1">Calendar</span>
                    </div>
                </a>
                <!-- parent pages--><a class="nav-link" href="../app/chat.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comments"></span></span><span class="nav-link-text ps-1">Chat</span>
                    </div>
                </a>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span><span class="nav-link-text ps-1">Email</span>
                    </div>
                </a>
                <ul class="nav collapse" id="email">
                    <li class="nav-item"><a class="nav-link" href="../app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Inbox</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/email/email-detail.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email detail</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/email/compose.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Compose</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">Events</span>
                    </div>
                </a>
                <ul class="nav collapse" id="events">
                    <li class="nav-item"><a class="nav-link" href="../app/events/create-an-event.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an event</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/events/event-detail.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event detail</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/events/event-list.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event list</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">E commerce</span>
                    </div>
                </a>
                <ul class="nav collapse" id="e-commerce">
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#product" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                        <ul class="nav collapse" id="product">
                            <li class="nav-item"><a class="nav-link" href="../app/e-commerce/product/product-list.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product list</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../app/e-commerce/product/product-grid.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product grid</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../app/e-commerce/product/product-details.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product details</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#orders" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                        <ul class="nav collapse" id="orders">
                            <li class="nav-item"><a class="nav-link" href="../app/e-commerce/orders/order-list.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order list</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../app/e-commerce/orders/order-details.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order details</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/e-commerce/customers.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customers</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/e-commerce/customer-details.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customer details</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/e-commerce/shopping-cart.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Shopping cart</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/e-commerce/checkout.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checkout</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/e-commerce/billing.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Billing</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/e-commerce/invoice.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link" href="../app/kanban.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Kanban</span>
                    </div>
                </a>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#social" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Social</span>
                    </div>
                </a>
                <ul class="nav collapse" id="social">
                    <li class="nav-item"><a class="nav-link" href="../app/social/feed.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Feed</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/social/activity-log.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Activity log</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/social/notifications.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Notifications</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../app/social/followers.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Followers</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <!-- label-->
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Pages
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>
                <!-- parent pages--><a class="nav-link active" href="../pages/starter.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-flag"></span></span><span class="nav-link-text ps-1">Starter</span>
                    </div>
                </a>
                <!-- parent pages--><a class="nav-link" href="../pages/landing.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-globe"></span></span><span class="nav-link-text ps-1">Landing</span>
                    </div>
                </a>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#authentication" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-lock"></span></span><span class="nav-link-text ps-1">Authentication</span>
                    </div>
                </a>
                <ul class="nav collapse" id="authentication">
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#simple" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Simple</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                        <ul class="nav collapse" id="simple">
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/simple/login.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/simple/logout.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logout</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/simple/register.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Register</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/simple/forgot-password.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot password</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/simple/confirm-mail.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Confirm mail</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/simple/reset-password.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset password</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/simple/lock-screen.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock screen</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#card" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Card</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                        <ul class="nav collapse" id="card">
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/card/login.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/card/logout.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logout</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/card/register.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Register</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/card/forgot-password.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot password</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/card/confirm-mail.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Confirm mail</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/card/reset-password.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset password</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/card/lock-screen.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock screen</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#split" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Split</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                        <ul class="nav collapse" id="split">
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/split/login.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/split/logout.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logout</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/split/register.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Register</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/split/forgot-password.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot password</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/split/confirm-mail.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Confirm mail</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/split/reset-password.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset password</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../pages/authentication/split/lock-screen.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock screen</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/authentication/wizard.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Wizard</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../#authentication-modal" data-bs-toggle="modal" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Modal</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">User</span>
                    </div>
                </a>
                <ul class="nav collapse" id="user">
                    <li class="nav-item"><a class="nav-link" href="../pages/user/profile.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Profile</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/user/settings.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Settings</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#pricing" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pricing">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tags"></span></span><span class="nav-link-text ps-1">Pricing</span>
                    </div>
                </a>
                <ul class="nav collapse" id="pricing">
                    <li class="nav-item"><a class="nav-link" href="../pages/pricing/pricing-default.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pricing default</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/pricing/pricing-alt.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pricing alt</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#faq" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faq">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-question-circle"></span></span><span class="nav-link-text ps-1">Faq</span>
                    </div>
                </a>
                <ul class="nav collapse" id="faq">
                    <li class="nav-item"><a class="nav-link" href="../pages/faq/faq-basic.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Faq basic</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/faq/faq-alt.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Faq alt</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/faq/faq-accordion.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Faq accordion</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#errors" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="errors">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-exclamation-triangle"></span></span><span class="nav-link-text ps-1">Errors</span>
                    </div>
                </a>
                <ul class="nav collapse" id="errors">
                    <li class="nav-item"><a class="nav-link" href="../pages/errors/404.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">404</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/errors/500.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">500</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#miscellaneous" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="miscellaneous">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-thumbtack"></span></span><span class="nav-link-text ps-1">Miscellaneous</span>
                    </div>
                </a>
                <ul class="nav collapse" id="miscellaneous">
                    <li class="nav-item"><a class="nav-link" href="../pages/miscellaneous/associations.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Associations</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/miscellaneous/invite-people.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invite people</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../pages/miscellaneous/privacy-policy.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Privacy policy</span>
                            </div>
                        </a>
                        <!-- more inner pages-->
                    </li>
                </ul>
            </li>
        </ul>
        <div class="settings mb-3">
            <div class="card alert p-0 shadow-none" role="alert">
                <div class="btn-close-falcon-container">
                    <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
                </div>
                <div class="card-body text-center"><img src="../assets/img/icons/spot-illustrations/navbar-vertical.png" alt="" width="80" />
                    <p class="fs--2 mt-2">Loving what you see? <br />Get your copy of <a href="#!">Falcon</a></p>
                    <div class="d-grid"><a class="btn btn-sm btn-purchase" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a></div>
                </div>
            </div>
        </div>
    </div>
</div>