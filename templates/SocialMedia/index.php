<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMedia[]|\Cake\Collection\CollectionInterface $socialMedia
 */
?>
<div class="socialMedia index content">
    <?= $this->Html->link(__('New Social Media'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Social Media') ?></h3>
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
                <?php foreach ($socialMedia as $socialMedia): ?>
                <tr>
                    <td><?= $this->Number->format($socialMedia->id) ?></td>
                    <td><?= $socialMedia->has('user') ? $this->Html->link($socialMedia->user->id, ['controller' => 'Users', 'action' => 'view', $socialMedia->user->id]) : '' ?></td>
                    <td><?= h($socialMedia->created) ?></td>
                    <td><?= $this->Number->format($socialMedia->created_by) ?></td>
                    <td><?= h($socialMedia->modified) ?></td>
                    <td><?= $this->Number->format($socialMedia->modified_by) ?></td>
                    <td><?= h($socialMedia->trashed) ?></td>
                    <td><?= $this->Number->format($socialMedia->deleted_by) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $socialMedia->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialMedia->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id)]) ?>
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
