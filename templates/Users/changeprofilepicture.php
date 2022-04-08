     <div class="row">
            <div class="col-12">
              <div class="card mb-3 btn-reveal-trigger">
                <div class="card-header position-relative min-vh-25 mb-8">
                  <div class="cover-image">
                    <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../../assets/img/generic/ubivelox1.png);">
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
                        if(!$user->image){      
                          echo $this->Html->image('avatar.png', ['style' => $imagestyle,'alt'=>'User img' ]); 
                        }else{
                          echo $this->Html->image('uploads/profilepicture/'.$user->id.'/'.$user->image, ['style' => $imagestyle,'alt'=>'User img' ]);   
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
                  <h5 class="mb-0">Change Profile Picture</h5>
                </div>
                <div class="card-body bg-light">
                  <!--<form class="row g-3">-->
                  <?= $this->Form->create($user,  ['type' => 'file','class' => 'row g-3', 'url' => ['controller'=> 'Users', 'action' => 'changeprofilepicture']]) ?>
                    <div class="col-lg-12">
                    <?php 
                              $imageclass = 'rounded-circle align-self-center mr-3';
                              $imagestyle = 'height:5rem;width:5rem;object-fit: cover;';
                              if(!$user->image){      
                                  echo $this->Html->image('avatar.png', ['class' => $imageclass, 'style' => $imagestyle,'alt'=>'User img', 'id' => 'imageRender' ]); 

                              }else{
                                  echo $this->Html->image('uploads/profilepicture/'.$user->id.'/'.$user->image, ['class' => $imageclass, 'style' => $imagestyle,'alt'=>'User img', 'id' => 'imageRender' ]);   
                              
                              }
                    ?>
                    <div class="custom-file mt-3">
                      <?= $this->Form->control('image_file', ['type' => 'file','class' => 'custom-file-input','id' => 'customFile', 'placeholder' => 'Image', 'label'=> false , 
                                      "accept"=>"image/png, image/gif, image/jpeg"
                                      ]); ?> 
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <span class="text-danger">
                        <small>
                            <b> Only accepts .png, .jpg, .jpeg. File size must not exceed 5MB</b> </small>
                        </span>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                      <div class="form-group"> 
                           <?= $this->Form->button(__('Update'), ['class' => 'btn btn-primary']) ?>

                           <?php echo $this->Html->link("Cancel", ['controller' => 'Users', 'action' => 'profile'], ['class' => 'btn btn-warning']); ?>
                       </div>
                    </div>
                  <!--</form>-->
                  <?= $this->Form->end() ?>
                </div>
              </div>
            </div>
          </div>

      <script>
        document.getElementById("customFile").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("imageRender").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
      </script>