<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCard $userCard
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Card'), ['action' => 'edit', $userCard->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Card'), ['action' => 'delete', $userCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCard->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Card'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userCards view content">
            <h3><?= h($userCard->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userCard->has('user') ? $this->Html->link($userCard->user->id, ['controller' => 'Users', 'action' => 'view', $userCard->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Card') ?></th>
                    <td><?= $userCard->has('card') ? $this->Html->link($userCard->card->id, ['controller' => 'Cards', 'action' => 'view', $userCard->card->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userCard->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($userCard->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expiration Date') ?></th>
                    <td><?= h($userCard->expiration_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userCard->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
