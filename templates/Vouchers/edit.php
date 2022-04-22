<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
//s$user = $this->request->getAttribute('identity')->getOriginalData();  
?>
        <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Update Voucher Code</h5>
                </div>
              </div>
            </div>
            <div class="card-body bg-light">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-872001c1-fbf7-4ca6-84a9-1e6de71adf6d" id="dom-872001c1-fbf7-4ca6-84a9-1e6de71adf6d">
                    <?= $this->Form->create($voucher, array('class' => 'row g-3 needs-validation')) ?>

                    <div class="col-md-6">
                      <?php echo $this->Form->control('voucher_code',['class' => 'form-control']); ?>
                    </div>

                    <div class="col-md-6">
                      <label>Status</label>
                      <select name="status" class="form-control" required="">
                        <option value="<?php echo $voucher->status; ?>">
                            <?php 
                            if($voucher->status == 0){
                                echo "Available";
                            ?>
                            <option value="0" selected="selected">Available</option>
                            <option value="1">Used</option>
                            <?php
                            }
                            elseif($voucher->status == 1){
                                echo "Used";
                            ?>
                            <option value="0">Available</option>
                            <option value="1" selected="selected">Used</option>
                            <?php
                            }
                            else{
                                echo "";
                            }
                            ?>
                        </option>
                      </select>
                    </div>

                    <div class="col-12">
                      <?= $this->Form->button(__('Update'),array('class' => 'btn btn-success')) ?>
                       <a href="<?php echo $this->Url->build(('/vouchers')); ?>" class="btn btn-warning">Cancel</a>
                    </div>
                  <?= $this->Form->end() ?>

                </div>
              </div>
            </div>
          </div>
