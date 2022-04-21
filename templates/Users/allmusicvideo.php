 <div class="card mb-3">
     <div class="card-header bg-light d-flex justify-content-between">
         <h5 class="mb-0">All Music & Video Links</h5>
         <a href="<?php echo $this->Url->build(('/users/view/' . $identity->id)); ?>" class="btn btn-primary">Back</a>
         <!--<a class="font-sans-serif" href="#">All Music & Video Links</a>-->
     </div>
     <div class="card-body fs--1 pb-0">
         <div class="row">
             <div class="col-sm-6 mb-3">
                 <?php
                    if ($user->card_id == null || $user->card_id == '') {
                    } else {
                    ?>
                     <?= $this->Html->link(__('Add Music & Video Link'), ['controller' => 'MusicVideo', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
                 <?php
                    }
                    ?>
             </div>
         </div>
         <div class="row">
             <?php
                foreach ($music_videos as $key => $value) {
                    $m_id = $value->id;
                    $music_video_link = trim($value->music_video_link);
                ?>
                 <div class="col-sm-6 mb-3">
                     <div class="d-flex position-relative align-items-center mb-2">
                         <div class="flex-1">
                             <h6 class="fs-0 mb-0">
                                 <?php
                                    if (str_contains($music_video_link, 'youtube')) {
                                        //echo 'true';
                                        $url = $music_video_link;
                                        $parse = parse_url($url, PHP_URL_QUERY);
                                        parse_str($parse, $output);
                                        $youtube_id = $output['v']; //get youtube id
                                        $youtubelink = "https://www.youtube.com/embed/" . $youtube_id;
                                        //echo $youtube_id;
                                        //echo $youtubelink;
                                    ?>
                                     <iframe width="auto" height="auto" src="<?php echo $youtubelink; ?>" frameborder="0" allowfullscreen></iframe>
                                 <?php
                                    } else {
                                    ?>
                                     <iframe src="<?php echo "http://" . $music_video_link; ?>" style="width: auto; height: auto;" scrolling="no"></iframe>
                                     <br>
                                     <i class="fa fa-link"></i>&nbsp;
                                     <a class="stretched-link" style="text-decoration: none;" href="<?php echo "http://" . $music_video_link; ?>" target="_blank"><?= h($music_video_link) ?></a>
                                 <?php
                                    }
                                    ?>
                             </h6>
                             <!--<p class="mb-1">2 followers</p>-->
                         </div>
                     </div>
                     <?php
                        if ($user->card_id == null || $user->card_id == '') {
                        } else {
                        ?>
                         <?= $this->Html->link(__('<font color="green" size="4px"><i class="far fa-edit"></i></font>'), ['controller' => 'MusicVideo', 'action' => 'edit', $m_id], ['escape' => false]) ?>

                         <?= $this->Form->postLink(
                                __('<font color="red" size="4px"><i class="far fa-trash-alt"></i></font>'),
                                ['controller' => 'MusicVideo', 'action' => 'delete', $m_id],
                                [
                                    'confirm' => __('Are you sure you want to delete # {0}?', $m_id),
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