<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MusicVideo[]|\Cake\Collection\CollectionInterface $musicVideo
 */
?>
<div class="musicVideo index content">
    <?= $this->Html->link(__('New Music Video'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Music Video') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
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
                <?php foreach ($musicVideo as $musicVideo): ?>
                <tr>
                    <td><?= $this->Number->format($musicVideo->id) ?></td>
                    <td><?= $musicVideo->has('user') ? $this->Html->link($musicVideo->user->id, ['controller' => 'Users', 'action' => 'view', $musicVideo->user->id]) : '' ?></td>
                    <td><?= h($musicVideo->created) ?></td>
                    <td><?= $this->Number->format($musicVideo->created_by) ?></td>
                    <td><?= h($musicVideo->modified) ?></td>
                    <td><?= $this->Number->format($musicVideo->modified_by) ?></td>
                    <td><?= h($musicVideo->trashed) ?></td>
                    <td><?= $this->Number->format($musicVideo->deleted_by) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $musicVideo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $musicVideo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $musicVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicVideo->id)]) ?>
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
