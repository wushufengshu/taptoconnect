<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meeting $meeting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Meeting'), ['action' => 'edit', $meeting->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Meeting'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Meetings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Meeting'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetings view content">
            <h3><?= h($meeting->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $meeting->has('user') ? $this->Html->link($meeting->user->id, ['controller' => 'Users', 'action' => 'view', $meeting->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($meeting->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($meeting->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $this->Number->format($meeting->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted By') ?></th>
                    <td><?= $this->Number->format($meeting->deleted_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meeting Date') ?></th>
                    <td><?= h($meeting->meeting_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($meeting->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($meeting->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trashed') ?></th>
                    <td><?= h($meeting->trashed) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
