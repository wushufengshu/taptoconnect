     <div class="row">
         <div class="col-12">
             <div class="card mb-3 btn-reveal-trigger">
                 <div class="card-header position-relative min-vh-25 mb-8">
                     <div class="cover-image">
                         <div class="bg-holder rounded-3 rounded-bottom-0">
                            <img src="../../assets/img/generic/ubivelox1.png" style="width: 100%; height: auto;">
                        </div>
                         <!--/.bg-holder-->
                         <!--
                    <input class="d-none" id="upload-cover-image" type="file" />
                    <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
                    -->
                     </div>
                     <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                         <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                             <!--<img src="../../assets/img/team/2.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />-->
                             <?php
                                $imagestyle = 'width:200;';
                                if (!$user->image) {
                                    echo $this->Html->image('avatar.png', ['style' => $imagestyle, 'alt' => 'User img']);
                                } else {
                                    echo $this->Html->image('uploads/profilepicture/' . $user->id . '/' . $user->image, ['style' => $imagestyle, 'alt' => 'User img']);
                                }
                                ?>
                             <!--
                      <input class="d-none" id="profile-image" type="file" />
                    
                      <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label>-->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="row g-0">
         <div class="col-lg-12 pe-lg-2">
             <div class="card mb-3">
                 <div class="card-header">
                     <h5 class="mb-0">Update Profile Information</h5>
                     <br>

                     <?= $this->Html->link(__('Change Profile Picture'), ['action' => 'changeprofilepicture'], ['class' => 'button float-right btn btn-success float-right  ']) ?>

                     <?= $this->Html->link(__('Change password'), ['action' => 'changepassword'], ['class' => 'button float-right btn btn-success float-right  ']) ?>
                 </div>
                 <div class="card-body bg-light">
                     <!--<form class="row g-3">-->
                     <?= $this->Form->create($user,  ['type' => 'file', 'class' => 'row g-3', 'url' => ['controller' => 'Users', 'action' => 'profile']]) ?>

                     <div class="col-lg-4">
                         <label class="form-label" for="first-name">Pronouns</label>
                         <select name="pronouns" class="form-control">
                             <option value="<?php echo $user->pronouns; ?>"><?php echo $user->pronouns; ?></option>
                             <option value="He/Him">He/Him</option>
                             <option value="She/Hers">She/Hers</option>
                             <option value="They/Them">They/Them</option>
                         </select>
                         <small>he/him, she/hers, they/them</small>
                     </div>

                     <div class="col-lg-4">
                         <label class="form-label" for="first-name">Last Name</label>
                         <?= $this->Form->control('lastname', ['class' => 'form-control', 'placeholder' => 'Last name', 'label' => false]); ?>
                     </div>
                     <div class="col-lg-4">
                         <label class="form-label" for="last-name">First Name</label>
                         <?= $this->Form->control('firstname', ['class' => 'form-control', 'placeholder' => 'First name', 'label' => false]); ?>
                     </div>
                     <div class="col-lg-4">
                         <label class="form-label" for="last-name">Middle Name</label>
                         <?= $this->Form->control('middlename', ['class' => 'form-control', 'placeholder' => 'Middle name', 'label' => false]); ?>
                     </div>
                     <div class="col-lg-4">
                         <?php echo $this->Form->control('birth_date', array('class' => 'form-control', 'placeholder' => 'Enter Date of Birth')); ?>
                     </div>
                     <div class="col-lg-4">
                         <label class="form-label" for="last-name">Gender</label>
                         <select name="gender" class="form-control">
                             <option value="<?php echo $user->gender; ?>"><?php echo $user->gender; ?></option>
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                         </select>
                     </div>
                     <div class="col-lg-4">
                         <?php echo $this->Form->control('email', array('class' => 'form-control', 'placeholder' => 'Enter Email')); ?>
                     </div>
                     <div class="col-lg-4">
                         <?php echo $this->Form->control('contactno', array('class' => 'form-control', 'placeholder' => 'Enter Contact No')); ?>
                     </div>
                     <div class="col-lg-4">
                         <?php echo $this->Form->control('username', array('class' => 'form-control', 'placeholder' => 'Enter Username')); ?>
                     </div>
                     <div class="col-lg-12">
                         <?php echo $this->Form->control('website', array('class' => 'form-control', 'placeholder' => 'Enter Website')); ?>
                     </div>
                     <div class="col-lg-12">
                         <?php echo $this->Form->control('address', array('class' => 'form-control', 'placeholder' => 'Enter Address')); ?>
                     </div>
                     <div class="col-lg-12">
                         <label class="form-label" for="intro">Bio</label>
                         <?php echo $this->Form->control('user_desc', array('class' => 'form-control', 'placeholder' => 'Enter User Description', 'label' => false)); ?>
                     </div>
                     <div class="col-12 d-flex justify-content-end">
                         <div class="form-group">
                             <?= $this->Form->button(__('Update'), ['class' => 'btn btn-primary']) ?>

                             <a href="<?php echo $this->Url->build(('/users')); ?>" class="btn btn-warning">
                                 <font color="#F7F7F7">Cancel</font>
                             </a>
                         </div>
                     </div>
                     <!--</form>-->
                     <?= $this->Form->end() ?>
                 </div>
             </div>
         </div>
     </div>