<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cards view content">
            <h3><?= h($card->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Serial Code') ?></th>
                    <td><?= h($card->serial_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Verification Code') ?></th>
                    <td><?= h($card->verification_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($card->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($card->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Card Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($card->card_link)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($card->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Card Id') ?></th>
                            <th><?= __('Serial Code') ?></th>
                            <th><?= __('Verification Code') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Middlename') ?></th>
                            <th><?= __('Birth Date') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('User Desc') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Contactno') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Pronouns') ?></th>
                            <th><?= __('Activated') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Token') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Modified By') ?></th>
                            <th><?= __('Trashed') ?></th>
                            <th><?= __('Deleted By') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($card->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->role_id) ?></td>
                            <td><?= h($users->card_id) ?></td>
                            <td><?= h($users->serial_code) ?></td>
                            <td><?= h($users->verification_code) ?></td>
                            <td><?= h($users->firstname) ?></td>
                            <td><?= h($users->lastname) ?></td>
                            <td><?= h($users->middlename) ?></td>
                            <td><?= h($users->birth_date) ?></td>
                            <td><?= h($users->address) ?></td>
                            <td><?= h($users->user_desc) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->contactno) ?></td>
                            <td><?= h($users->website) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->gender) ?></td>
                            <td><?= h($users->pronouns) ?></td>
                            <td><?= h($users->activated) ?></td>
                            <td><?= h($users->image) ?></td>
                            <td><?= h($users->token) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->created_by) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td><?= h($users->modified_by) ?></td>
                            <td><?= h($users->trashed) ?></td>
                            <td><?= h($users->deleted_by) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
