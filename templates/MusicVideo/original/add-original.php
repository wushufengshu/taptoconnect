<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MusicVideo $musicVideo
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Music Video'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="musicVideo form content">
            <?= $this->Form->create($musicVideo) ?>
            <fieldset>
                <legend><?= __('Add Music Video') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('music_video_link');
                    echo $this->Form->control('created_by');
                    echo $this->Form->control('modified_by');
                    echo $this->Form->control('trashed', ['empty' => true]);
                    echo $this->Form->control('deleted_by');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
