<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meeting[]|\Cake\Collection\CollectionInterface $meetings
 */
?>
<div class="meetings index content">
    <?= $this->Html->link(__('New Meeting'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Meetings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('meeting_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('modified_by') ?></th>
                    <th><?= $this->Paginator->sort('trashed') ?></th>
                    <th><?= $this->Paginator->sort('deleted_by') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetings as $meeting): ?>
                <tr>
                    <td><?= $this->Number->format($meeting->id) ?></td>
                    <td><?= $meeting->has('user') ? $this->Html->link($meeting->user->id, ['controller' => 'Users', 'action' => 'view', $meeting->user->id]) : '' ?></td>
                    <td><?= h($meeting->meeting_date) ?></td>
                    <td><?= h($meeting->created) ?></td>
                    <td><?= $this->Number->format($meeting->created_by) ?></td>
                    <td><?= h($meeting->modified) ?></td>
                    <td><?= $this->Number->format($meeting->modified_by) ?></td>
                    <td><?= h($meeting->trashed) ?></td>
                    <td><?= $this->Number->format($meeting->deleted_by) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meeting->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meeting->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
