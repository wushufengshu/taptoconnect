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
                  <div id="tableExample2" data-list='{"valueNames":["name","email","contactno","username","activated","created"],"page":100,"pagination":true}'>
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
                            <td class="activated"><a href="#" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#update_modal<?php echo $user->id; ?>"><?php echo $status; ?></a></td>
                            <td class="created"><?= h($user->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<font color="blue" size="3px"><i class="far fa-eye"></i></font>'), ['action' => 'view', $user->id], [ 'escape' => false]) ?>
                                <?= $this->Html->link(__('<font color="green" size="3px"><i class="far fa-edit"></i></font>'), ['action' => 'edit', $user->id], [ 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<font color="red" size="3px"><i class="far fa-trash-alt"></i></font>'), ['action' => 'delete', $user->id], 
                                [
                                'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                                'escape' => false //'escape' => false - convert plain text to html
                                ]) ?>
                            </td>
                           </tr>
                            <div class="modal fade" id="update_modal<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                <div class="modal-content position-relative">
                                  <!--
                                  <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  -->
                                  <div class="modal-body p-0">
                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                      <center>
                                        <h4 class="mb-1" id="modalExampleDemoLabel">ACTIVATE/DEACTIVATE ACCOUNT</h4>
                                        <label class="col-form-label" for="recipient-name"><h5><?= h($user->firstname." ".$user->middlename." ".$user->lastname) ?></h5>
                                      </label>
                                      </center>
                                    </div>
                                      <?= $this->Form->create($user,['method' => 'post','enctype' => 'multipart/form-data']) ?>
                                      <input name="userid" class="form-control" id="recipient-name" type="hidden" value="<?php echo $user->id; ?>" />
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>

                                    <?= $this->Form->button(__('Deactivate'), ['class' => 'btn btn-warning','type' => 'submit','name' => 'deactivate']) ?>

                                    <?= $this->Form->button(__('Activate'), ['class' => 'btn btn-success','type' => 'submit','name' => 'activate']) ?>
                                    <?= $this->Form->end() ?>
                                  </div>
                                </div>
                              </div>
                            </div>
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

