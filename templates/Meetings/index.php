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
                  <h5 class="mb-0" data-anchor="data-anchor">Meetings List</h5>
                  <p class="mb-0 pt-1 mt-2 mb-0"></p>
                </div>
                <div class="col-auto ms-auto">
                  <div class="nav nav-pills nav-pills-falcon flex-grow-1 mt-2" role="tablist">
                    <?= $this->Html->link(__('New Meeting'), ['action' => 'add'], ['class' => 'button float-right btn btn-sm active']) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-864f5a02-4c23-4e2f-888a-06238311a2e3" id="dom-864f5a02-4c23-4e2f-888a-06238311a2e3">
                  <div id="tableExample2" data-list='{"valueNames":["name","musicvideo","created"],"page":100,"pagination":true}'>
                    <div class="table-responsive scrollbar">

                      <table class="table table-bordered table-hover fs--1 mb-0">
                        <thead class="bg-200 text-900">
                          <tr>
                            <th class="sort" data-sort="name">User Owner</th>
                            <th class="sort" data-sort="musicvideo">Meeting Date</th>
                            <th class="sort" data-sort="musicvideo">Meeting Name</th>
                            <th class="sort" data-sort="musicvideo">Duration</th>
                            <th class="sort" data-sort="musicvideo">Organized By</th>
                            <th class="sort" data-sort="musicvideo">Meeting Place</th>
                            <th class="sort" data-sort="created">Date Created</th>
                            <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php foreach ($meetings as $meeting): ?>
                          <tr>
                            <td class="name"><?= h($meeting->user->firstname." ".$meeting->user->lastname) ?></td>
                            <td class="musicvideo"><?= h($meeting->meeting_date) ?></td>
                            <td class="musicvideo"><?= h($meeting->meeting_name) ?></td>
                            <td class="musicvideo"><?= h($meeting->time_from." - ".$meeting->time_to) ?></td>
                            <td class="musicvideo"><?= h($meeting->organized_by) ?></td>
                            <td class="musicvideo"><?= h($meeting->meeting_place) ?></td>
                            <td class="created"><?= h($meeting->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<font color="blue" size="4px"><i class="far fa-eye"></i></font>'), ['action' => 'view', $meeting->id], [ 'escape' => false]) ?>
                                <?= $this->Html->link(__('<font color="green" size="4px"><i class="far fa-edit"></i></font>'), ['action' => 'edit', $meeting->id], [ 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<font color="red" size="4px"><i class="far fa-trash-alt"></i></font>'), ['action' => 'delete', $meeting->id], 
                                [
                                'confirm' => __('Are you sure you want to delete # {0}?', $meeting->id),
                                'escape' => false //'escape' => false - convert plain text to html
                                ]) ?>
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
