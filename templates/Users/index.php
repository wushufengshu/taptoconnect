<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
        <?= $this->Flash->render() ?>
        <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">User List</h5>
                  <p class="mb-0 pt-1 mt-2 mb-0"></p>
                </div>
                <div class="col-auto ms-auto">
                  <div class="nav nav-pills nav-pills-falcon flex-grow-1 mt-2" role="tablist">
                    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right btn btn-sm active']) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-864f5a02-4c23-4e2f-888a-06238311a2e3" id="dom-864f5a02-4c23-4e2f-888a-06238311a2e3">
                  <div id="tableExample2" data-list='{"valueNames":["name","email","contactno","username","activated","created"],"page":5,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                    <dl>
                      <dt class="green"></dt>
                      <dd>Activated</dd>

                      <dt class="red"></dt>
                      <dd>No Yet Activated</dd>
                    </dl>
                      <table class="table table-bordered table-hover fs--1 mb-0">
                        <thead class="bg-200 text-900">
                          <tr>
                            <th class="sort" data-sort="name">Name</th>
                            <th class="sort" data-sort="email">Email</th>
                            <th class="sort" data-sort="contactno">Contact No</th>
                            <th class="sort" data-sort="username">Username</th>
                            <th class="sort" data-sort="activated">Activated?</th>
                            <th class="sort" data-sort="created">Date Created</th>
                            <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php foreach ($users as $user): ?>
                            <?php 
                              if($user->activated == 0){ //not yet activated
                                  $tr_class = "table-danger";
                                  $status = "Not Yet Activated";
                              }
                              elseif($user->activated == 1){ //activated
                                  $tr_class = "table-success";
                                  $status = "Activated";
                              }
                              else{
                                $tr_class = '';
                              }
                            ?>
                          <tr class="<?php echo $tr_class; ?>">
                            <td class="name"><?= h($user->firstname." ".$user->middlename." ".$user->lastname) ?></td>
                            <td class="email"><?= h($user->email) ?></td>
                            <td class="contactno"><?= h($user->contactno) ?></td>
                            <td class="username"><?= h($user->username) ?></td>
                            <td class="activated"><?php echo $status; ?></td>
                            <td class="created"><?= h($user->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                            </td>
                           </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                      <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                      <ul class="pagination mb-0"></ul>
                      <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane code-tab-pane" role="tabpanel" aria-labelledby="tab-dom-49c45fc1-d94c-41a0-aadb-9c63374711dd" id="dom-49c45fc1-d94c-41a0-aadb-9c63374711dd">
                  
                </div>
              </div>
            </div>
          </div>
