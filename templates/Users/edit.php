<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
        <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Update User</h5>
                </div>
              </div>
            </div>
            <div class="card-body bg-light">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-872001c1-fbf7-4ca6-84a9-1e6de71adf6d" id="dom-872001c1-fbf7-4ca6-84a9-1e6de71adf6d">
                    <?= $this->Form->create($user, array('class' => 'row g-3 needs-validation')) ?>
                    <div class="col-md-4">
                      <label>Pronouns</label>
                      <select name="pronouns" class="form-control">
                        <option value="<?php echo $user->pronouns; ?>"><?php echo $user->pronouns; ?></option>
                        <option value="He/Him">He/Him</option>
                        <option value="She/Hers">She/Hers</option>
                        <option value="They/Them">They/Them</option>
                      </select>
                      <small>he/him, she/hers, they/them</small>
                    </div>
                    <div class="col-md-4">
                      <?php echo $this->Form->control('firstname',array('class' => 'form-control','placeholder' => 'Enter Firstname')); ?>
                    </div>
                    <div class="col-md-4">
                      <?php echo $this->Form->control('lastname',array('class' => 'form-control','placeholder' => 'Enter Lastname')); ?>
                    </div>
                    <div class="col-md-4">
                      <?php echo $this->Form->control('middlename',array('class' => 'form-control','placeholder' => 'Enter Middlename')); ?>
                    </div>
                    <div class="col-md-4">
                      <?php echo $this->Form->control('birth_date',array('class' => 'form-control','placeholder' => 'Enter Date of Birth')); ?>
                    </div>
                    <div class="col-md-4">
                      <label>Gender</label>
                      <select name="gender" class="form-control">
                        <option value="<?php echo $user->gender; ?>"><?php echo $user->gender; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <?php echo $this->Form->control('address',array('class' => 'form-control','placeholder' => 'Enter Address')); ?>
                    </div>
                    <div class="col-md-4">
                      <?php echo $this->Form->control('user_desc',array('class' => 'form-control','placeholder' => 'Enter User Description')); ?>
                    </div>
                    <div class="col-md-4">
                      <?php echo $this->Form->control('website',array('class' => 'form-control','placeholder' => 'Enter Website')); ?>
                    </div>
                    <div class="col-md-3">
                      <?php echo $this->Form->control('email',array('class' => 'form-control','placeholder' => 'Enter Email')); ?>
                    </div>
                    <div class="col-md-3">
                      <?php echo $this->Form->control('contactno',array('class' => 'form-control','placeholder' => 'Enter Contact No')); ?>
                    </div>
                    <div class="col-md-3">
                      <?php echo $this->Form->control('username',array('class' => 'form-control','placeholder' => 'Enter Username')); ?>
                    </div>
                    <div class="col-md-3">
                      <?php echo $this->Form->control('password',array('class' => 'form-control','placeholder' => 'Enter Password')); ?>
                    </div>

                    <div class="col-12">
                      <?= $this->Form->button(__('Update'),array('class' => 'btn btn-success')) ?>
                      <a href="<?php echo $this->Url->build(('/users')); ?>" class="btn btn-warning">Cancel</a>
                    </div>
                  <?= $this->Form->end() ?>

                </div>
              </div>
            </div>
          </div>
