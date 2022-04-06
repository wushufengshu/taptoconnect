<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMedia $socialMedia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Social Media'), ['action' => 'edit', $socialMedia->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Social Media'), ['action' => 'delete', $socialMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Social Media'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Social Media'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socialMedia view content">
            <h3><?= h($socialMedia->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $socialMedia->has('user') ? $this->Html->link($socialMedia->user->id, ['controller' => 'Users', 'action' => 'view', $socialMedia->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($socialMedia->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($socialMedia->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $this->Number->format($socialMedia->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted By') ?></th>
                    <td><?= $this->Number->format($socialMedia->deleted_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($socialMedia->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($socialMedia->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trashed') ?></th>
                    <td><?= h($socialMedia->trashed) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Social Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($socialMedia->social_link)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
