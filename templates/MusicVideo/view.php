<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MusicVideo $musicVideo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Music Video'), ['action' => 'edit', $musicVideo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Music Video'), ['action' => 'delete', $musicVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicVideo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Music Video'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Music Video'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="musicVideo view content">
            <h3><?= h($musicVideo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $musicVideo->has('user') ? $this->Html->link($musicVideo->user->id, ['controller' => 'Users', 'action' => 'view', $musicVideo->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($musicVideo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($musicVideo->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $this->Number->format($musicVideo->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted By') ?></th>
                    <td><?= $this->Number->format($musicVideo->deleted_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($musicVideo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($musicVideo->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trashed') ?></th>
                    <td><?= h($musicVideo->trashed) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Music Video Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($musicVideo->music_video_link)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
