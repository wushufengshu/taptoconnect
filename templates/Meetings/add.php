<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
//$user = $this->request->getAttribute('identity')->getOriginalData();  
//dd($user);
?>
        <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Add Meeting</h5>
                </div>
              </div>
            </div>
            <div class="card-body bg-light">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-872001c1-fbf7-4ca6-84a9-1e6de71adf6d" id="dom-872001c1-fbf7-4ca6-84a9-1e6de71adf6d">
                    <?= $this->Form->create($meeting, array('class' => 'row g-3 needs-validation')) ?>
                    <!--
                    <div class="col-md-3">
                      <?php //echo $this->Form->control('user_id',['class' => 'form-control'], ['options' => $users]); ?>
                    </div>
                    -->
                    <div class="col-md-4">
                      <?php  echo $this->Form->control('meeting_date', ['class' => 'form-control','type' => 'date']); ?>
                    </div>
                    <div class="col-md-4">
                      <?php  echo $this->Form->control('time_from', ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                      <?php  echo $this->Form->control('time_to', ['class' => 'form-control']); ?>
                    </div>

                    <div class="col-md-12">
                      <?php  echo $this->Form->control('meeting_name', ['class' => 'form-control']); ?>
                    </div>

                    <div class="col-md-6">
                      <?php  echo $this->Form->control('organized_by', ['class' => 'form-control']); ?>
                    </div>

                    <div class="col-md-6">
                      <?php  echo $this->Form->control('meeting_place', ['class' => 'form-control']); ?>
                    </div>

                    <div class="col-12">
                      <?= $this->Form->button(__('Add'),array('class' => 'btn btn-primary')) ?>
                      <a href="<?php echo $this->Url->build(('/users/view/'.$identity->id)); ?>" class="btn btn-warning">Cancel</a>
                    </div>
                  <?= $this->Form->end() ?>

                </div>
              </div>
            </div>
          </div>
