<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCard $userCard
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $cards
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userCard->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userCard->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userCards form content">
            <?= $this->Form->create($userCard) ?>
            <fieldset>
                <legend><?= __('Edit User Card') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('card_id', ['options' => $cards]);
                    echo $this->Form->control('expiration_date');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
