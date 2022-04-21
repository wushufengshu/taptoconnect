<?php
//$user = $this->request->getAttribute('identity')->getOriginalData();  
//dd($identity);
?>
<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
    <a class="navbar-brand me-1 me-sm-3" href="">
        <div class="d-flex align-items-center"><img class="me-2" src="/assets/img/icons/spot-illustrations/ubtap.png" alt="" width="40" /><span class="font-sans-serif">UBTAP</span>
        </div>
    </a>

    <?php if ($identity->role_id == 1) : ?>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Forms
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><?= $this->Html->link('Cards form', ['controller' => 'Cards', 'action' => 'downloadcardform'], ['class' => 'dropdown-item']) ?></li>
                </ul>
            </li>
        </ul>
    <?php endif; ?>

    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
        <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2">
                <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
            </div>
        </li>

        <li class="nav-item dropdown">
            <?php 
            if($countmeetingnow){
            ?>
            <a class="nav-link px-0 notification-indicator notification-indicator-danger notification-indicator-fill fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell bell" data-fa-transform="shrink-7" style="font-size: 40px;"></span><span class="notification-indicator-number"><?php echo $countmeetingnow; ?></span></a>
            <?php
            }
            else{
            ?>
            <a class="nav-link px-0 notification-indicator notification-indicator-danger notification-indicator-fill fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-7" style="font-size: 40px;"></span><span class="notification-indicator-number"><?php echo $countmeetingnow; ?></span></a>
            <?php
            }
            ?>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">List of Meetings this Month</h6>
                        </div>
                      </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs--1">
                        <?php 
                        if($countmeetingnow){
                        ?>
                        <?php 
                        foreach ($meetingnow as $key => $value) {
                            $meeting_date = $value->meeting_date;
                            $meeting_name = $value->meeting_name;
                            $time_from = $value->time_from;
                            $time_to = $value->time_to;
                            $organized_by = $value->organized_by;
                            $meeting_place = $value->meeting_place;
                            $f_meeting_name = mb_substr($meeting_name, 0, 1)
                        ?>
                        <div class="list-group-item">
                          <a class="notification notification-flush notification-unread" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <div class="avatar-name rounded-circle"><span><?php echo $f_meeting_name; ?></span></div>
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong><?php echo $meeting_name; ?></strong> at <strong><?php echo $meeting_place; ?></strong> on <strong><?php echo $meeting_date; ?></strong> Organized by: <strong><?php echo $organized_by; ?></strong></p>
                              <span class="notification-time">From: <?php echo $time_from; ?> To: <?php echo $time_to; ?></span>

                            </div>
                          </a>

                        </div>
                        <?php
                        }
                        ?>
                        <?php 
                        }
                        else{
                        ?>
                            <div class="notification-body">
                              <p class="mb-1"><center><strong>No meetings to display.</strong></center></p>
                            </div>
                        <?php
                        }   
                        ?>
                        
                      </div>
                    </div>
                    <!--<div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">View all</a></div>-->
                    <div class="card-footer text-center border-top">
                        <?= $this->Html->link(__('View all'), ['controller' => 'Users', 'action' => 'allmeeting/' . $identity->id], ['class' => 'card-link d-block']) ?>
                    </div>
                  </div>
                </div>

        </li>

        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <!--<img class="rounded-circle" src="/assets/img/team/3-thumb.png" alt="" />-->
                    <?php
                    $imagestyle = 'width:200;';
                    if (!$identity->image) {
                        echo $this->Html->image('avatar.png', ['style' => $imagestyle, 'alt' => 'User img', 'class' => 'rounded-circle']);
                    } else {
                        echo $this->Html->image('uploads/profilepicture/' . $identity->id . '/' . $identity->image, ['style' => $imagestyle, 'alt' => 'User img', 'class' => 'rounded-circle']);
                    }
                    ?>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">

                    <a href="<?php echo $this->Url->build(('/users/profile/' . $identity->id)); ?>" class="dropdown-item">Profile & Account</a>
                    <div class="dropdown-divider"></div>
                    <?php echo $this->Html->link("Logout", ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item']); ?>
                </div>
            </div>
        </li>
    </ul>
</nav>
