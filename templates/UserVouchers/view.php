<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserVoucher $userVoucher
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Voucher'), ['action' => 'edit', $userVoucher->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Voucher'), ['action' => 'delete', $userVoucher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userVoucher->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Vouchers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Voucher'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userVouchers view content">
            <h3><?= h($userVoucher->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userVoucher->has('user') ? $this->Html->link($userVoucher->user->id, ['controller' => 'Users', 'action' => 'view', $userVoucher->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Voucher') ?></th>
                    <td><?= $userVoucher->has('voucher') ? $this->Html->link($userVoucher->voucher->id, ['controller' => 'Vouchers', 'action' => 'view', $userVoucher->voucher->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userVoucher->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userVoucher->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
