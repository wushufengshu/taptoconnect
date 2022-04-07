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

            <div class="card-body py-4" id="wizard-controller">
                <div class="tab-content">
                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                        <form class="needs-validation" novalidate="novalidate">
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
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-wizard-password">Password*</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required="required" id="bootstrap-wizard-wizard-password" data-wizard-validate-password="true" />
                                    <div class="invalid-feedback">Please enter password</div>
                                </div>
                                <!-- <div class="mb-3">
                                        <label class="form-label" for="bootstrap-wizard-wizard-confirm-password">Confirm Password*</label>
                                        <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password" required="required" id="bootstrap-wizard-wizard-confirm-password" data-wizard-validate-confirm-password="true" />
                                        <div class="invalid-feedback">Passwords need to match</div>
                                    </div>  -->
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab2" id="bootstrap-wizard-tab2">
                        <form class="needs-validation" novalidate2="novalidate">
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
                                    <input class="form-control" type="text" name="lastname" placeholder="Last name" id="bootstrap-wizard-wizard-lastname" required="true" data-wizard-validate-lastname="true" />
                                    <div class="invalid-feedback">Please enter last name</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-wizard-phone">Contact number</label>
                                <input class="form-control" type="text" name="contactno" placeholder="Contact number" id="bootstrap-wizard-wizard-contactno" required="true" data-wizard-validate-contactno="true" />
                                <div class="invalid-feedback">Please enter contact number</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-wizard-datepicker">Date of Birth</label>
                                <input class="form-control datetimepicker" name="birth_date" type="text" placeholder="d/m/y" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="bootstrap-wizard-wizard-datepicker" data-wizard-validate-datepicker="true" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bootstrap-wizard-gender">Gender</label>
                                        <select class="form-select" name="gender" id="bootstrap-wizard-gender">
                                            <option value="">Select your gender ...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bootstrap-wizard-pronouns">Pronouns</label>
                                        <select class="form-select" name="pronouns" id="bootstrap-wizard-pronouns">
                                            <option value="">Select your pronouns ...</option>
                                            <option value="he/him">He/Him</option>
                                            <option value="she/her">She/Her</option>
                                            <option value="they/them">they/them</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-wizard-address">Bio</label>
                                <textarea class="form-control" name="user_desc" rows="4" id="bootstrap-wizard-wizard-user_desc"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-wizard-address">Address</label>
                                <textarea class="form-control" name="addresss" rows="4" id="bootstrap-wizard-wizard-address"></textarea>
                            </div>
                        </form>
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

                            <button type="button" class="btn btn-primary px-5 px-sm-6 d-none" id="register">Register</button>
                        </li>
                    </ul>
                </div>
            </div>

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

<script src="/jquery/jquery.min.js"></script>
<script>
    /* -------------------------------------------------------------------------- */

    /*                                 step wizard                                */

    /* -------------------------------------------------------------------------- */

    // var nextButton = wizard.querySelector('.next button');

    // $(document).ready(function() {
    //     $('#register').click(function() {
    //         var username = $("#bootstrap-wizard-wizard-username").val()
    //         var email = $("#bootstrap-wizard-wizard-email").val()
    //         var password = $("#bootstrap-wizard-wizard-password").val()
    //         if (quantity <= 0 || quantity == null || quantity == "") {
    //             $('.errorMsgQuantity').html('<small>Please enter a valid value</small>')
    //             $("#" + itemId).addClass("is-invalid").focus()
    //         } else {
    //             $.ajax({
    //                 method: "POST",
    //                 url: "<?= $this->Url->build(['controller' => 'Items', 'action' => 'addStocksQuantity']) ?>",
    //                 type: "JSON",
    //                 data: {
    //                     item_id: itemId,
    //                     quantity: quantity
    //                 },
    //                 headers: {
    //                     'X-CSRF-Token': $("[name='_csrfToken']").val()
    //                 },

    //                 beforeSend: function() {},
    //                 success: function(msg) {

    //                     location.reload();

    //                 },
    //                 cache: false,
    //                 error: function(xhr, ajaxOptions, thrownError) {
    //                     alert(thrownError);
    //                 }
    //             })
    //         }
    //     })


    // });


    var wizardInit = function wizardInit() {
        var wizards = document.querySelectorAll('.theme-wizard');
        var tabPillEl = document.querySelectorAll('#pill-tab2 [data-bs-toggle="pill"]');
        var tabProgressBar = document.querySelector('.theme-wizard .progress');
        wizards.forEach(function(wizard) {
            var tabToggleButtonEl = wizard.querySelectorAll('[data-wizard-step]');
            var inputUsername = wizard.querySelector('[data-wizard-validate-username]');
            var inputEmail = wizard.querySelector('[data-wizard-validate-email]');
            var emailPattern = inputEmail.getAttribute('pattern');
            var inputPassword = wizard.querySelector('[data-wizard-validate-password]');
            // var inputConfirmPassword = wizard.querySelector('[data-wizard-validate-confirm-password]');

            var inputFirstname = wizard.querySelector('[data-wizard-validate-firstname]');
            var inputLastname = wizard.querySelector('[data-wizard-validate-lastname]');
            var inputContactno = wizard.querySelector('[data-wizard-validate-contactno]');

            var form = wizard.querySelector('[novalidate]');
            var form2 = wizard.querySelector('[novalidate2]');
            var nextButton = wizard.querySelector('.next button');
            var prevButton = wizard.querySelector('.previous button');
            var saveButton = wizard.querySelector('#register');
            var cardFooter = wizard.querySelector('.theme-wizard .card-footer');
            var count = 0;

            function validatePattern(pattern, value) {
                var regexPattern = new RegExp(pattern);
                return regexPattern.test(String(value).toLowerCase());
            };

            prevButton.classList.add('d-none'); // on button click tab change

            nextButton.addEventListener('click', function() {
                if ((!inputUsername.value || !(inputEmail.value && validatePattern(emailPattern, inputEmail.value)) || !inputPassword.value) && form.className.includes('needs-validation')) {
                    form.classList.add('was-validated');
                } else {
                    count += 1;
                    var tab = new window.bootstrap.Tab(tabToggleButtonEl[count]);
                    tab.show();
                    nextButton.classList.add('d-none');
                    saveButton.classList.remove('d-none');
                }
            });

            saveButton.addEventListener('click', function() {
                if ((!inputFirstname.value || !inputLastname.value || !inputContactno.value) && form2.className.includes('needs-validation')) {
                    form2.classList.add('was-validated');
                } else {
                    count += 1;
                    var tab = new window.bootstrap.Tab(tabToggleButtonEl[count]);
                    tab.show();
                    nextButton.classList.add('d-none');
                    saveButton.classList.remove('d-none');
                }
            });

            prevButton.addEventListener('click', function() {
                count -= 1;
                var tab = new window.bootstrap.Tab(tabToggleButtonEl[count]);
                tab.show();
                saveButton.classList.add('d-none');
                nextButton.classList.remove('d-none');
            });

            if (tabToggleButtonEl.length) {
                tabToggleButtonEl.forEach(function(item, index) {
                    /* eslint-disable */
                    item.addEventListener('show.bs.tab', function(e) {
                        if ((!(inputEmail.value && validatePattern(emailPattern, inputEmail.value)) || !inputPassword.value) && form.className.includes('needs-validation')) {
                            e.preventDefault();
                            form.classList.add('was-validated');
                            return null;
                            /* eslint-enable */
                        }

                        count = index; // can't go back tab

                        if (count === tabToggleButtonEl.length - 1) {
                            tabToggleButtonEl.forEach(function(tab) {
                                tab.setAttribute('data-bs-toggle', 'modal');
                                tab.setAttribute('data-bs-target', '#error-modal');
                            });
                        } //add done class


                        for (var i = 0; i < count; i += 1) {
                            tabToggleButtonEl[i].classList.add('done');
                        } //remove done class


                        for (var j = count; j < tabToggleButtonEl.length; j += 1) {
                            tabToggleButtonEl[j].classList.remove('done');
                        } // card footer remove at last step


                        if (count > tabToggleButtonEl.length - 2) {
                            item.classList.add('done');
                            cardFooter.classList.add('d-none');
                        } else {
                            cardFooter.classList.remove('d-none');
                        } // prev-button removing


                        if (count > 0) {
                            prevButton.classList.remove('d-none');
                        } else {
                            prevButton.classList.add('d-none');
                        }
                    });
                });
            }
        }); // control wizard progressbar

        if (tabPillEl.length) {
            var dividedProgressbar = 100 / tabPillEl.length;
            tabProgressBar.querySelector('.progress-bar').style.width = "".concat(dividedProgressbar, "%");
            tabPillEl.forEach(function(item, index) {
                item.addEventListener('show.bs.tab', function() {
                    tabProgressBar.querySelector('.progress-bar').style.width = "".concat(dividedProgressbar * (index + 1), "%");
                });
            });
        }
    };
</script>