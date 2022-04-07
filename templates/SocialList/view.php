<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialList $socialList
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Social List'), ['action' => 'edit', $socialList->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Social List'), ['action' => 'delete', $socialList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialList->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Social List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Social List'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socialList view content">
            <h3><?= h($socialList->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Social Name') ?></th>
                    <td><?= h($socialList->social_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($socialList->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Image') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($socialList->image)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Social Media') ?></h4>
                <?php if (!empty($socialList->social_media)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Social List Id') ?></th>
                            <th><?= __('Social Link') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Modified By') ?></th>
                            <th><?= __('Trashed') ?></th>
                            <th><?= __('Deleted By') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($socialList->social_media as $socialMedia) : ?>
                        <tr>
                            <td><?= h($socialMedia->id) ?></td>
                            <td><?= h($socialMedia->user_id) ?></td>
                            <td><?= h($socialMedia->social_list_id) ?></td>
                            <td><?= h($socialMedia->social_link) ?></td>
                            <td><?= h($socialMedia->created) ?></td>
                            <td><?= h($socialMedia->created_by) ?></td>
                            <td><?= h($socialMedia->modified) ?></td>
                            <td><?= h($socialMedia->modified_by) ?></td>
                            <td><?= h($socialMedia->trashed) ?></td>
                            <td><?= h($socialMedia->deleted_by) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SocialMedia', 'action' => 'view', $socialMedia->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SocialMedia', 'action' => 'edit', $socialMedia->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SocialMedia', 'action' => 'delete', $socialMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id)]) ?>
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
