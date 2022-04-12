<?php if ($identity->card_id == null) : ?>
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

                    <?= $this->Html->link(__('Add Meeting'), ['controller' => 'Meetings', 'action' => 'add'], ['class' => 'btn btn-falcon-default btn-sm px-3 ']) ?>

                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>

    <div class="card mb-3">
        <div class="card-header bg-light d-flex justify-content-between">
            <h5 class="mb-0">All Social Media</h5> 
            <a href="<?php echo $this->Url->build(('/users/view/'.$identity->id)); ?>" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body fs-1 pb-0">
            <div class="row">
                <div class="col-sm-6 mb-3">
                <?php 
                if($user->card_id == null || $user->card_id == ''){
                }
                else{
                ?>
                <?= $this->Html->link(__('Add Social Media'), ['controller' => 'SocialMedia', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
                <?php 
                }
                ?>
                </div>
            </div>
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
                        <?php 
                        //echo $s_card_id;
                        if($user->card_id == null || $user->card_id == ''){
                        }
                        else{
                        ?>
                        <?= $this->Html->link(__('<font color="green" size="4px"><i class="far fa-edit"></i></font>'), ['controller' => 'SocialMedia', 'action' => 'edit', $s_id], ['escape' => false]) ?>

                        <?= $this->Form->postLink(
                            __('<font color="red" size="4px"><i class="far fa-trash-alt"></i></font>'),
                            ['controller' => 'SocialMedia', 'action' => 'delete', $s_id],
                            [
                                'confirm' => __('Are you sure you want to delete # {0}?', $s_id),
                                'escape' => false //'escape' => false - convert plain text to html
                            ]
                        ) ?>
                        <?php 
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>