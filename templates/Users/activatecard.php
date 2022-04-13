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
                    <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="/users/login">UB Tap</a></div>
                    <div class="card-body p-4">

                        <div class="row flex-between-center">
                            <div class="col-auto">
                                <h3>Activate Card</h3>
                            </div>
                        </div>
                        <!-- this form is moved to /templates/element/forms/activatecard.php -->
                        <?= $this->element('forms/activatecard') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>