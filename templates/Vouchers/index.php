<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?= $this->Form->create($voucher,['method' => 'post']) ?>
<div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Card's Voucher Code</h5>
      </div>
      <div class="modal-body">
        <label>Enter Voucher Quantity:</label>
        <input type="number" name="quantity" class="form-control" placeholder="Enter Voucher Quantity" required="">
      </div>
      <div class="modal-body">
        <label>Enter Voucher Duration (In Months):</label><small> example: <font color="blue">12</font> months</small>
        <input type="number" name="duration" class="form-control" placeholder="Enter Voucher Duration" required="">
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
                  <h5 class="mb-0" data-anchor="data-anchor">Voucher List</h5>
                  <p class="mb-0 pt-1 mt-2 mb-0"></p>
                </div>
                <div class="col-auto ms-auto">
                  <div class="nav nav-pills nav-pills-falcon flex-grow-1 mt-2" role="tablist">
                    <?= $this->Html->link(
                      "<font color='white' size='3px'><i class='fas fa-cloud-download-alt'></i> </font>",
                      ['action' => 'exportcsv'], 
                      ['class' => 'float-right btn btn-success float-left mr-2 ',
                      'title' => 'Download CSV (All Voucher Data)',
                      'escape' => false ]) 
                    ?>

                    <?= $this->Html->link(
                      "<font color='white' size='3px'><i class='fas fa-cloud-upload-alt'></i> </font>", 
                      ['action' => 'index'], 
                      ['class' => 'float-right btn btn-primary float-left mr-2 ',
                      'title' => 'Generate Voucher Code',
                      'data-bs-toggle' => 'modal','data-bs-target' => '#generateModal', 'escape' => false ]) 
                    ?>
                    
                    <?= $this->Html->link(
                      "<font color='white' size='3px'><i class='fas fa-plus'></i> </font>", 
                      ['action' => 'add'], 
                      ['class' => 'float-right btn btn-success float-right mr-2 ',
                      'title' => 'New Voucher',
                      'escape' => false ]) 
                    ?>

                  </div>
                </div>

              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-864f5a02-4c23-4e2f-888a-06238311a2e3" id="dom-864f5a02-4c23-4e2f-888a-06238311a2e3">
                  <div id="tableExample2" data-list='{"valueNames":["voucher_code","duration","status","created"],"page":100,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                        <dl>
                            <dt class="green"></dt>
                            <dd>Available</dd>

                            <dt class="red"></dt>
                            <dd>Used</dd>

                        </dl>
                      <form method="post">
                      <table class="table table-bordered table-hover fs--1 mb-0" id="tableExample2">
                        <thead class="bg-200 text-900">
                          <tr>
                            <th colspan="12"><button type="submit" name="export_selected" class="btn btn-success float-right mr-2"><i class='fas fa-cloud-download-alt'></i> Download CSV (Selected)</button></th>
                          </tr>
                          <tr>
                            <th style="width: 50px;">Select All&nbsp;<input type="checkbox" onclick="toggle(this);"></th>
                            <th class="sort" data-sort="voucher_code">Voucher Code</th>
                            <th class="sort" data-sort="duration" style="width: 50px;">Duration (In Months)</th>
                            <th class="sort" data-sort="status">Status</th>
                            <th class="sort" data-sort="created">Date Created</th>
                            <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php foreach ($vouchers as $voucher): ?>
                        <?php 
                                          if ($voucher->status == 0) { //available
                                        $tr_class = "table-success";
                                        $status = "Available";
                                    } elseif ($voucher->status == 1) { //used
                                        $tr_class = "table-danger";
                                        $status = 'Used';
                                    } else {
                                        $tr_class = '';
                                    }
                        ?>
                          <tr class="<?php echo $tr_class; ?>">
                            <td><input type="checkbox" name="checked_item[]" value="<?php echo $voucher->id; ?>"><?php  //echo $card->id; ?></td>
                            <td class="voucher_code">
                              <input id="pass_log_id" type="password" name="pass" value="MySecretPass">
<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                              <?= h($this->Common->put_asterisk($voucher->voucher_code)) ?>
                                
                              </td>
                            <td class="duration"><?= h($voucher->duration) ?></td>
                            <td class="status"><?= h($status) ?></td>
                            <td class="created"><?= h($voucher->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<font color="blue" size="4px"><i class="far fa-eye"></i></font>'), ['action' => 'view', $voucher->id], [ 'escape' => false]) ?>
                                <?= $this->Html->link(__('<font color="green" size="4px"><i class="far fa-edit"></i></font>'), ['action' => 'edit', $voucher->id], [ 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<font color="red" size="4px"><i class="far fa-trash-alt"></i></font>'), ['action' => 'delete', $voucher->id], 
                                [
                                'confirm' => __('Are you sure you want to delete # {0}?', $voucher->id),
                                'escape' => false //'escape' => false - convert plain text to html
                                ]) ?>
                            </td>
                           </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                      </form>
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

          <script type="text/javascript">
            function toggle(source) {
              var checkboxes = document.querySelectorAll('input[type="checkbox"]');
              for (var i = 0; i < checkboxes.length; i++) {
                  if (checkboxes[i] != source)
                      checkboxes[i].checked = source.checked;
              }
          }
          </script>

          <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') ?>
          <script type="text/javascript">
            $(document).on('click', '.toggle-password', function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                
                var input = $("#pass_log_id");
                input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
            });
          </script>
