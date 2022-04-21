<div class="row justify-content-center pt-6">
    <div class="col-sm-10 col-lg-7 col-xxl-5"><a class="d-flex flex-center mb-4" href="/users/login">
            <?= $this->Html->image('/assets/img/icons/spot-illustrations/ubtap.png', ['width' => 40, 'class' => 'me-2']) ?>
            <span class="font-sans-serif fw-bolder fs-4 d-inline-block">UB Tap</span></a>
        <div class="card theme-wizard mb-5" id="wizard">
            <div class="card-header bg-light pt-3 pb-2">
                <h4>Activate Card</h4>
            </div>

            <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
            <div class="card-body py-4" id="wizard-controller">

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
                <div class="mb-3">

                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="">
                    <ul class="pager wizard list-inline mb-0">
                        <li class="previous">
                            <!-- <button class="btn btn-link ps-0" type="button"><span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span>Back to login</button> -->

                            <a href="/users/login" class="btn btn-link ps-0"><span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span>Back to login</a>
                        </li>
                        <li class="next">
                            <!-- <button type="button" class="btn btn-primary px-5 px-sm-6 " id="checkcard">Check</button> -->

                            <?= $this->Form->submit(__('Activate Card'), ['class' => 'btn btn-primary px-5 px-sm-6']); ?>
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
<script src="/jquery/jquery.min.js"></script>