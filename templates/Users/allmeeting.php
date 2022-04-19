<div class="card mb-3">
    <div class="card-header bg-light d-flex justify-content-between">
        <h5 class="mb-0">All Meetings</h5>
        <a href="<?php echo $this->Url->build(('/users/view/' . $identity->id)); ?>" class="btn btn-primary">Back</a>
    </div>

    <div class="card-body fs--1">

        <div class="row">
            <div class="col-sm-6 mb-3">
                <?php
                if ($user->card_id == null || $user->card_id == '') {
                } else {
                ?>
                    <?= $this->Html->link(__('Add Meeting'), ['controller' => 'Meetings', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
                <?php
                }
                ?>
            </div>
        </div>

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
                    <br>
                    <?php
                    if ($user->card_id == null || $user->card_id == '') {
                    } else {
                    ?>
                        <?= $this->Html->link(__('<font color="green" size="4px"><i class="far fa-edit"></i></font>'), ['controller' => 'Meetings', 'action' => 'edit', $m_id], ['escape' => false]) ?>

                        <?= $this->Form->postLink(
                            __('<font color="red" size="4px"><i class="far fa-trash-alt"></i></font>'),
                            ['controller' => 'Meetings', 'action' => 'delete', $m_id],
                            [
                                'confirm' => __('Are you sure you want to delete # {0}?', $m_id),
                                'escape' => false //'escape' => false - convert plain text to html
                            ]
                        ) ?>
                    <?php
                    }
                    ?>
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
    </div>
</div>