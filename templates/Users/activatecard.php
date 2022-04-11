<div class="row min-vh-100 bg-100">
    <div class="col-6 d-none d-lg-block position-relative">
        <div class="bg-holder" style="background-image:url(../../../assets/img/generic/20.jpg);background-position: 50% 20%;">
        </div>
        <!--/.bg-holder-->

    </div>
    <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
        <div class="row justify-content-center g-0">
            <div class="col-lg-9 col-xl-8 col-xxl-6">
                <?= $this->Flash->render() ?>
                <div class="card">
                    <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="#">UB Tap</a></div>
                    <div class="card-body p-4">

                        <div class="row flex-between-center">
                            <div class="col-auto">
                                <h3>Activate Card</h3>
                            </div>
                        </div>

                        <?= $this->Form->create() ?>
                        <div class="mb-3">
                            <?= $this->Form->control('serial_code', [
                                'required' => true, 'class' => 'form-control', 'id' => 'split-login-serial_code', 'label' => [
                                    'for' => 'split-login-serial_code',
                                    'class' => 'form-label'
                                ]
                            ]) ?>
                        </div>
                        <div class="mb-3">

                            <?= $this->Form->control('verification_code', [
                                'required' => true, 'class' => 'form-control', 'id' => 'split-login-verification_code', 'label' => [
                                    'for' => 'split-login-verification_code',
                                    'class' => 'form-label'
                                ]
                            ]) ?>
                        </div>
                        <!-- <div class="row flex-between-center">
                            <div class="col-auto">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="split-checkbox" />
                                    <label class="form-check-label mb-0" for="split-checkbox">Remember me</label>
                                </div>
                            </div>
                            <div class="col-auto"><a class="fs--1" href="../../../pages/authentication/split/forgot-password.html">Forgot Password?</a></div>
                        </div> -->
                        <div class="mb-3">

                            <?= $this->Form->submit(__('Activate Card'), ['class' => 'btn btn-primary d-block w-100 mt-3']); ?>
                        </div>
                        <?= $this->Form->end() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>