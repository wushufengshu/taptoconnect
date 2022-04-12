<?php if ($user->card_id == null) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">Please activate your card now
                    </h4>
                    <h5 class="fs-0 fw-normal"><?= h($user->email . "-" . $user->contactno) ?></h5>
                    <p class="text-500"><?= $this->Text->autoParagraph(h($user->address)); ?></p>
                    <a href="<?php echo "http://" . $user->website; ?>" target="_blank"><?= $this->Text->autoParagraph(h($user->website)); ?></a>
                    <!--<button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>-->

                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-3 rounded-bottom-0">
                <img src="../../assets/img/generic/ubivelox1.png" style="width: 100%; height: auto;">
            </div>
            <!--/.bg-holder-->

            <div class="avatar avatar-5xl avatar-profile">
                <!--
                <img class="rounded-circle img-thumbnail shadow-sm" src="../../assets/img/team/<?= h($user->image); ?>" width="200" alt="" />
                -->
                <?php
                $imagestyle = 'width:200;';
                if (!$user->image) {
                    echo $this->Html->image('avatar.png', ['style' => $imagestyle, 'class' => 'rounded-circle img-thumbnail shadow-sm', 'alt' => 'User img']);
                } else {
                    echo $this->Html->image('uploads/profilepicture/' . $user->id . '/' . $user->image, ['style' => $imagestyle, 'class' => 'rounded-circle img-thumbnail shadow-sm', 'alt' => 'User img']);
                }
                ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1"> <?= h($user->firstname . " " . $user->middlename . " " . $user->lastname) ?><span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                    </h4>
                    <h5 class="fs-0 fw-normal"><?= h($user->email . "-" . $user->contactno) ?></h5>
                    <p class="text-500"><?= $this->Text->autoParagraph(h($user->address)); ?></p>
                    <a href="<?php echo "http://" . $user->website; ?>" target="_blank"><?= $this->Text->autoParagraph(h($user->website)); ?></a>
                    <!--<button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>-->

                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-light d-flex justify-content-between">
            <h5 class="mb-0">Social Media</h5>
            <!--<a class="font-sans-serif" href="#">All Social Media</a>-->
            <?= $this->Html->link(__('All Social Media'), ['controller' => 'Users', 'action' => 'allsocial/' . $identity->id], ['class' => 'font-sans-serif']) ?>
        </div>
        <div class="card-body fs-1 pb-0">
            <div class="row">
                <?php
                foreach ($socials as $key => $value) {
                    $s_id = $value->id;
                    $s_social_link = $value->social_link;
                    $s_image = $value->image;
                ?>
                    <div class="col-sm-6 mb-3">

                        <div class="d-flex position-relative align-items-center mb-2">
                            <!--<i class="fa fa-link"></i>-->

                            <img class="d-flex align-self-center me-2 rounded-3" src="../../assets/img/logos/<?php echo $s_image; ?>" alt="" width="50" />
                            &nbsp;
                            <div class="flex-1">
                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="<?php echo "http://" . $s_social_link; ?>" style="text-decoration: none;" target="_blank"><?= h($s_social_link) ?></a></h6>
                                <!--<p class="mb-1">2 followers</p>-->
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Bio</h5>
                </div>
                <div class="card-body text-justify">
                    <div class="collapse show" id="profile-intro">
                        <?= $this->Text->autoParagraph(h($user->user_desc)); ?>
                    </div>
                </div>
                <div class="card-footer bg-light p-0 border-top">
                    <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs--2"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs--2"></span></span></button>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Meetings</h5>
                </div>
                <div class="card-body fs--1">
                    <?php
                    foreach ($meetings as $key => $value) {
                        $m_id = $value->id;
                        $month = $value->month;
                        $day = $value->day;

                        $meeting_name = $value->meeting_name;
                        $time_from = $value->time_from;
                        $time_to = $value->time_to;
                        $organized_by = $value->organized_by;
                        $meeting_place = $value->meeting_place;
                    ?>
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar"><span class="calendar-month"><?= h($month) ?></span><span class="calendar-day"><?= h($day) ?></span></div>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0"><?= h($meeting_name) ?></h6>
                                <p class="mb-1">Organized by <?= h($organized_by) ?></p>
                                <p class="text-1000 mb-0">Time: <?= h($time_from) ?></p>
                                <p class="text-1000 mb-0">Duration: <?= h($time_from) ?> - <?= h($time_to) ?></p>Place: <?= h($meeting_place) ?>

                                <div class="border-dashed-bottom my-3"></div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="card-footer bg-light p-0 border-top">
                    <!--
                    <a class="btn btn-link d-block w-100" href="#">All Meetings<span class="fas fa-chevron-right ms-1 fs--2"></span></a>
                    -->
                    <?= $this->Html->link(__('All Meetings'), ['controller' => 'Users', 'action' => 'allmeeting/' . $identity->id], ['class' => 'btn btn-link d-block w-100']) ?>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-0">Music & Video Links</h5>
                    <!--<a class="font-sans-serif" href="#">All Music & Video Links</a>-->
                    <?= $this->Html->link(__('All Music & Video Links'), ['controller' => 'Users', 'action' => 'allmusicvideo/' . $identity->id], ['class' => 'font-sans-serif']) ?>
                </div>
                <div class="card-body fs--1 pb-0">
                    <div class="row">
                        <?php
                        foreach ($music_videos as $key => $value) {
                            $m_id = $value->id;
                            $music_video_link = $value->music_video_link;
                        ?>
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex position-relative align-items-center mb-2"><i class="fa fa-link"></i>&nbsp;
                                    <div class="flex-1">
                                        <h6 class="fs-0 mb-0"><a class="stretched-link" style="text-decoration: none;" href="<?php echo "http://" . $music_video_link; ?>" target="_blank"><?= h($music_video_link) ?></a></h6>
                                        <!--<p class="mb-1">2 followers</p>-->
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>