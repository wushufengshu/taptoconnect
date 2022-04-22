<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Voucher $voucher
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Voucher'), ['action' => 'edit', $voucher->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Voucher'), ['action' => 'delete', $voucher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucher->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vouchers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Voucher'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vouchers view content">
            <h3><?= h($voucher->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Voucher Code') ?></th>
                    <td><?= h($voucher->voucher_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($voucher->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($voucher->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($voucher->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related User Cards') ?></h4>
                <?php if (!empty($voucher->user_cards)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Card Id') ?></th>
                            <th><?= __('Voucher Id') ?></th>
                            <th><?= __('Expiration Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($voucher->user_cards as $userCards) : ?>
                        <tr>
                            <td><?= h($userCards->id) ?></td>
                            <td><?= h($userCards->user_id) ?></td>
                            <td><?= h($userCards->card_id) ?></td>
                            <td><?= h($userCards->voucher_id) ?></td>
                            <td><?= h($userCards->expiration_date) ?></td>
                            <td><?= h($userCards->status) ?></td>
                            <td><?= h($userCards->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserCards', 'action' => 'view', $userCards->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserCards', 'action' => 'edit', $userCards->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserCards', 'action' => 'delete', $userCards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCards->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
