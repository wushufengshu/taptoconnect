<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialList[]|\Cake\Collection\CollectionInterface $socialList
 */
?>
<div class="socialList index content">
    <?= $this->Html->link(__('New Social List'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Social List') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('social_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socialList as $socialList): ?>
                <tr>
                    <td><?= $this->Number->format($socialList->id) ?></td>
                    <td><?= h($socialList->social_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $socialList->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialList->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialList->id)]) ?>
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
