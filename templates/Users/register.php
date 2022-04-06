<div class="row justify-content-center pt-6">
    <div class="col-sm-10 col-lg-7 col-xxl-5"><a class="d-flex flex-center mb-4" href="#">
            <?= $this->Html->image('/ttc/apple-touch-icon.png', ['width' => 45, 'class' => 'me-2']) ?>
            <span class="font-sans-serif fw-bolder fs-4 d-inline-block">Ubivelox</span></a>
        <div class="card theme-wizard mb-5" id="wizard">
            <div class="card-header bg-light pt-3 pb-2">
                <ul class="nav justify-content-between nav-wizard">
                    <li class="nav-item"><a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-tab1" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Account</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab2" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-user"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Personal</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab3" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Done</span></a></li>
                </ul>
            </div>
            <?= $this->Form->create($user, ['class' => 'needs-validation', 'novalidate' => "novalidate", 'type' => 'file']) ?>
            <div class="card-body py-4" id="wizard-controller">
                <div class="tab-content">
                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">


                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-username">Username*</label>
                            <input class="form-control" name="username" placeholder="Username" required="required" id="bootstrap-wizard-wizard-username" data-wizard-validate-username="true" />
                            <div class="invalid-feedback">Please enter username</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-email">Email*</label>
                            <input class="form-control" type="email" name="email" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" id="bootstrap-wizard-wizard-email" data-wizard-validate-email="true" />
                            <div class="invalid-feedback">You must add email</div>

                            <?php /*$this->Form->control('email', [
                                    'class' => 'form-control', 'placeholder' => "Email address",  'pattern' => "^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$", 'required' => true, 'id' => 'bootstrap-wizard-wizard-email',  'data-wizard-validate-email' => "true",
                                    'label' => ['text' => 'Email address*', 'for' => 'bootstrap-wizard-wizard-email', 'class' => 'form-label']
                                ]) */ ?>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-wizard-password">Password*</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required="required" id="bootstrap-wizard-wizard-password" data-wizard-validate-password="true" />
                                    <div class="invalid-feedback">Please enter password</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-wizard-confirm-password">Confirm Password*</label>
                                    <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password" required="required" id="bootstrap-wizard-wizard-confirm-password" data-wizard-validate-confirm-password="true" />
                                    <div class="invalid-feedback">Passwords need to match</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab2" id="bootstrap-wizard-tab2">

                        <div class="mb-3">
                            <div class="row" data-dropzone="data-dropzone" data-options='{"maxFiles":1,"data":[{"name":"avatar.png","size":"54kb","url":"../../assets/img/team"}]}'>
                                <div class="fallback">
                                    <input type="file" name="file" />
                                </div>
                                <div class="col-md-auto">
                                    <div class="dz-preview dz-preview-single">
                                        <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0">
                                            <div class="avatar avatar-4xl"><img class="rounded-circle" src="../../assets/img/team/avatar.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
                                        <div class="text-center"><img class="me-2" src="../../assets/img/icons/cloud-upload.svg" width="25" alt="" />Upload your profile picture
                                            <p class="mb-0 fs--1 text-400">Upload a 300x300 jpg image with <br />a maximum size of 400KB</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label class="form-label" for="bootstrap-wizard-wizard-firstname">First name* </label>
                                <input class="form-control" type="text" name="firstname" placeholder="First name" id="bootstrap-wizard-wizard-firstname" required="true" data-wizard-validate-firstname="true" />
                                <div class="invalid-feedback">Please enter first name</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="bootstrap-wizard-wizard-middlename">Middle name</label>
                                <input class="form-control" type="text" name="middlename" placeholder="Middle name" id="bootstrap-wizard-wizard-middlename" />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="bootstrap-wizard-wizard-lastname">Last name* </label>
                                <input class="form-control" type="text" name="lastname" placeholder="Last name" id="bootstrap-wizard-wizard-lastname" required="true" data-wizard-validate-firstname="true" />
                                <div class="invalid-feedback">Please enter last name name</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-phone">Contact number</label>
                            <input class="form-control" type="text" name="contactno" placeholder="Contact number" id="bootstrap-wizard-wizard-contactno" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-datepicker">Date of Birth</label>
                            <input class="form-control datetimepicker" type="text" placeholder="d/m/y" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="bootstrap-wizard-wizard-datepicker" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-gender">Gender</label>
                            <select class="form-select" name="gender" id="bootstrap-wizard-gender">
                                <option value="">Select your gender ...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-pronouns">Pronouns</label>
                            <select class="form-select" name="pronouns" id="bootstrap-wizard-pronouns">
                                <option value="">Select your pronouns ...</option>
                                <option value="he/him">He/Him</option>
                                <option value="she/her">She/Her</option>
                                <option value="they/them">they/them</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-address">Address</label>
                            <textarea class="form-control" rows="4" id="bootstrap-wizard-wizard-address"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab3" id="bootstrap-wizard-tab3">
                        <div class="wizard-lottie-wrapper">
                            <div class="lottie wizard-lottie mx-auto my-3" data-options='{"path":"../../assets/img/animated-icons/celebration.json"}'></div>
                        </div>
                        <h4 class="mb-1">Your account is all set!</h4>
                        <p>Now you can access to your account</p><a class="btn btn-primary px-5 my-3" href="../../pages/authentication/wizard.html">Start Over</a>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="px-sm-3 px-md-5">
                    <ul class="pager wizard list-inline mb-0">
                        <li class="previous">
                            <button class="btn btn-link ps-0" type="button"><span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span>Prev</button>
                        </li>
                        <li class="next">

                            <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span></button>
                        </li>
                    </ul>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px">
            <div class="modal-content position-relative p-5">
                <div class="d-flex align-items-center">
                    <div class="lottie me-3" data-options='{"path":"../../assets/img/animated-icons/warning-light.json"}'></div>
                    <div class="flex-1">
                        <button class="btn btn-link text-danger position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal"><span class="fas fa-times"></span></button>
                        <p class="mb-0">You don't have access to the link. Please try again.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>