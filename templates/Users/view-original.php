<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($user->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($user->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Middlename') ?></th>
                    <td><?= h($user->middlename) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contactno') ?></th>
                    <td><?= h($user->contactno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activated') ?></th>
                    <td><?= $this->Number->format($user->activated) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($user->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $this->Number->format($user->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted By') ?></th>
                    <td><?= $this->Number->format($user->deleted_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trashed') ?></th>
                    <td><?= h($user->trashed) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->address)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('User Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->user_desc)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Website') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->website)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Image') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->image)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Meetings') ?></h4>
                <?php if (!empty($user->meetings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Meeting Date') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Modified By') ?></th>
                            <th><?= __('Trashed') ?></th>
                            <th><?= __('Deleted By') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->meetings as $meetings) : ?>
                        <tr>
                            <td><?= h($meetings->id) ?></td>
                            <td><?= h($meetings->user_id) ?></td>
                            <td><?= h($meetings->meeting_date) ?></td>
                            <td><?= h($meetings->created) ?></td>
                            <td><?= h($meetings->created_by) ?></td>
                            <td><?= h($meetings->modified) ?></td>
                            <td><?= h($meetings->modified_by) ?></td>
                            <td><?= h($meetings->trashed) ?></td>
                            <td><?= h($meetings->deleted_by) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Meetings', 'action' => 'view', $meetings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Meetings', 'action' => 'edit', $meetings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meetings', 'action' => 'delete', $meetings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Music Video') ?></h4>
                <?php if (!empty($user->music_video)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Music Video Link') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Modified By') ?></th>
                            <th><?= __('Trashed') ?></th>
                            <th><?= __('Deleted By') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->music_video as $musicVideo) : ?>
                        <tr>
                            <td><?= h($musicVideo->id) ?></td>
                            <td><?= h($musicVideo->user_id) ?></td>
                            <td><?= h($musicVideo->music_video_link) ?></td>
                            <td><?= h($musicVideo->created) ?></td>
                            <td><?= h($musicVideo->created_by) ?></td>
                            <td><?= h($musicVideo->modified) ?></td>
                            <td><?= h($musicVideo->modified_by) ?></td>
                            <td><?= h($musicVideo->trashed) ?></td>
                            <td><?= h($musicVideo->deleted_by) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MusicVideo', 'action' => 'view', $musicVideo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MusicVideo', 'action' => 'edit', $musicVideo->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MusicVideo', 'action' => 'delete', $musicVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicVideo->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Social Media') ?></h4>
                <?php if (!empty($user->social_media)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Social Link') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Modified By') ?></th>
                            <th><?= __('Trashed') ?></th>
                            <th><?= __('Deleted By') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->social_media as $socialMedia) : ?>
                        <tr>
                            <td><?= h($socialMedia->id) ?></td>
                            <td><?= h($socialMedia->user_id) ?></td>
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
