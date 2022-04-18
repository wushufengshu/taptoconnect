<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- Modal -->
<?= $this->Form->create($cards,['method' => 'post','enctype' => 'multipart/form-data']) ?>
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload CSV Data (Cards)</h5>
      </div>
      <div class="modal-body">
        <input type="file" name="file" accept=".csv" class="form-control" required="">
        <small><strong><font color="red">Only .csv file type is allowed</font></strong></small>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="button" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" name="submit">Import/Upload Data</button>
      </div>
    </div>
  </div>
</div>
 <?= $this->Form->end() ?>

<?= $this->Form->create($card,['method' => 'post','enctype' => 'multipart/form-data']) ?>
<div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Card's Serial/Verification Code</h5>
      </div>
      <div class="modal-body">
        <label>Enter Card Quantity:</label>
        <input type="number" name="quantity" class="form-control" placeholder="Enter Card Quantity" required="">
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="button" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" name="generate">Generate</button>
      </div>
    </div>
  </div>
</div>
 <?= $this->Form->end() ?>

        <?= $this->Flash->render() ?>
        <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Card List</h5>
                  <p class="mb-0 pt-1 mt-2 mb-0"></p>
                </div>
                <div class="col-auto ms-auto">
                  <div class="nav nav-pills nav-pills-falcon flex-grow-1 mt-2" role="tablist">
                    <?= $this->Html->link(
                      "<font color='white' size='3px'><i class='fas fa-cloud-download-alt'></i> </font>",
                      ['action' => 'exportcsv'], 
                      ['class' => 'float-right btn btn-success float-left mr-2 ',
                      'title' => 'Download CSV',
                      'escape' => false ]) 
                    ?>

                    <?= $this->Html->link(
                      "<font color='white' size='3px'><i class='fas fa-cloud-upload-alt'></i> </font>", 
                      ['action' => 'index'], 
                      ['class' => 'float-right btn btn-primary float-left mr-2 ',
                      'title' => 'Generate Card Serial/Verification Code',
                      'data-bs-toggle' => 'modal','data-bs-target' => '#generateModal', 'escape' => false ]) 
                    ?>

                    <?= $this->Html->link(
                      "<font color='white' size='3px'><i class='fa fa-file-excel'></i> </font>", 
                      ['action' => 'index'], 
                      ['class' => 'float-right btn btn-success float-right mr-2 ',
                      'title' => 'Upload CSV Data (Cards)',
                      'data-bs-toggle' => 'modal','data-bs-target' => '#uploadModal', 'escape' => false ]) 
                    ?>
                    
                    <?= $this->Html->link(
                      "<font color='white' size='3px'><i class='fas fa-plus'></i> </font>", 
                      ['action' => 'add'], 
                      ['class' => 'float-right btn btn-primary float-right mr-2 ',
                      'title' => 'New Card',
                      'escape' => false ]) 
                    ?>

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
                            <th class="sort" data-sort="name">Serial Code</th>
                            <th class="sort" data-sort="musicvideo">Verification Code</th>
                            <th class="sort" data-sort="musicvideo">Card Link</th>
                            <th class="sort" data-sort="created">Date Created</th>
                            <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php foreach ($cards as $card): ?>
                          <tr>
                            <td class="musicvideo"><?= h($card->serial_code) ?></td>
                            <td class="musicvideo"><?= h($card->verification_code) ?></td>
                            <td class="musicvideo"><?= h($card->card_link) ?></td>
                            <td class="musicvideo"><?= h($card->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<font color="blue" size="4px"><i class="far fa-eye"></i></font>'), ['action' => 'view', $card->id], [ 'escape' => false]) ?>
                                <?= $this->Html->link(__('<font color="green" size="4px"><i class="far fa-edit"></i></font>'), ['action' => 'edit', $card->id], [ 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<font color="red" size="4px"><i class="far fa-trash-alt"></i></font>'), ['action' => 'delete', $card->id], 
                                [
                                'confirm' => __('Are you sure you want to delete # {0}?', $card->id),
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
