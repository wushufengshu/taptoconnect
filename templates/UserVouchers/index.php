<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserVoucher[]|\Cake\Collection\CollectionInterface $userVouchers
 */
?>
<?= $this->Flash->render() ?>
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">My vouchers list</h5>
                <p class="mb-0 pt-1 mt-2 mb-0"></p>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1 mt-2" role="tablist">

                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-864f5a02-4c23-4e2f-888a-06238311a2e3" id="dom-864f5a02-4c23-4e2f-888a-06238311a2e3">
                <div id="tableExample2" data-list='{"valueNames":["name","serialcardno","verificationcardno","expiration_date","status","created"],"page":100,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                        <!-- <dl>
                            <dt class="green"></dt>
                            <dd>Activated</dd>

                            <dt style="background:#fde6d8"></dt>
                            <dd>For expiry</dd>

                            <dt class="red"></dt>
                            <dd>Expired</dd>

                            <dt style="background:#e3e6ea" ;></dt>
                            <dd>Not yet activated</dd>
                        </dl> -->
                        <table class="table table-bordered table-hover fs--1 mb-0">
                            <thead class="bg-200 text-900">
                                <tr>
                                    <?php if ($identity->role_id == 1) { ?>
                                        <th class="sort" data-sort="name">Name</th>
                                    <?php } ?>
                                    <th class="sort" data-sort="name">Voucher</th>
                                    <th class="sort" data-sort="name">Created</th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                <?php foreach ($userVouchers as $userVoucher) : ?>
                                    <tr>

                                        <?php if ($identity->role_id == 1) { ?>
                                            <td class="name"><?= $userVoucher->user->firstname . ' ' .  $this->Common->get_starred($userVoucher->user->lastname) ?></td>
                                        <?php } ?>
                                        <td><?= $userVoucher->voucher->voucher_code ?></td>
                                        <td><?= h($userVoucher->created) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                        <ul class="pagination mb-0"></ul>
                        <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                    </div>
                </div>
            </div>
            <div class="tab-pane code-tab-pane" role="tabpanel" aria-labelledby="tab-dom-49c45fc1-d94c-41a0-aadb-9c63374711dd" id="dom-49c45fc1-d94c-41a0-aadb-9c63374711dd">

            </div>
        </div>
    </div>
</div>