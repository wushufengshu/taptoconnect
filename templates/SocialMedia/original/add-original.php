<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMedia $socialMedia
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Social Media'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socialMedia form content">
            <?= $this->Form->create($socialMedia) ?>
            <fieldset>
                <legend><?= __('Add Social Media') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('social_link');
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
