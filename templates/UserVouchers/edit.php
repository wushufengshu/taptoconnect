<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserVoucher $userVoucher
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $vouchers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userVoucher->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userVoucher->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Vouchers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userVouchers form content">
            <?= $this->Form->create($userVoucher) ?>
            <fieldset>
                <legend><?= __('Edit User Voucher') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('voucher_id', ['options' => $vouchers]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
