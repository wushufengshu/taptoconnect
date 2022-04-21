<?= $this->Flash->render() ?>
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">User cards list</h5>
                <p class="mb-0 pt-1 mt-2 mb-0"></p>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1 mt-2" role="tablist">

                    <?php
                    if ($identity->role_id == 1) {
                        echo $this->Form->postLink(
                            __('Scan user cards'),
                            ['action' => 'checkusersubscription'],
                            ['class' => 'btn btn-primary text-white']
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-864f5a02-4c23-4e2f-888a-06238311a2e3" id="dom-864f5a02-4c23-4e2f-888a-06238311a2e3">
                <div id="tableExample2" data-list='{"valueNames":["name","serialcardno","verificationcardno","expiration_date","status","created"],"page":100,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                        <dl>
                            <dt class="green"></dt>
                            <dd>Activated</dd>

                            <dt style="background:#fde6d8"></dt>
                            <dd>For expiry</dd>

                            <dt class="red"></dt>
                            <dd>Expired</dd>

                            <dt style="background:#e3e6ea" ;></dt>
                            <dd>Not yet activated</dd>
                        </dl>
                        <table class="table table-bordered table-hover fs--1 mb-0">
                            <thead class="bg-200 text-900">
                                <tr>

                                    <th class="sort" data-sort="name">Name</th>
                                    <th class="sort" data-sort="serialcardno">Card Serial Code</th>
                                    <th class="sort" data-sort="verificationcardno">Verification Code</th>
                                    <th class="sort" data-sort="expiration_date">Expiration Date</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="created">Activated on</th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                <?php foreach ($userCards as $userCard) : ?>

                                    <?php
                                    if ($userCard->status == 1) { //not yet status
                                        $tr_class = "table-success";
                                        $status = "Activated";

                                        $expiration_date = date('Y-m-d', strtotime($userCard->expiration_date));
                                        $monthbeforeexpiration = date('Y-m-d', (strtotime('-1 month', strtotime($expiration_date))));

                                        if ((date('Y-m-d') >= $monthbeforeexpiration && date('Y-m-d') <= $expiration_date)) {

                                            $tr_class = "table-warning";
                                            $status = "For expiry";
                                        }
                                    } elseif ($userCard->status == 2) { //activated
                                        $tr_class = "table-danger";
                                        $status = 'Expired';
                                    } elseif ($userCard->status == 3) { //activated
                                        $tr_class = "table-secondary";
                                        $status = 'Not yet activated';
                                    } else {
                                        $tr_class = '';
                                    }
                                    ?>
                                    <tr class="<?php echo $tr_class; ?>">
                                        <td class="name"><?= $userCard->user->firstname . ' ' . $userCard->user->lastname  ?></td>
                                        <td class="serialcardno"><?= $userCard->card->serial_code  ?></td>
                                        <td class="verificationcardno"><?= $userCard->card->verification_code  ?></td>
                                        <td class="expiration_date"><?= h($userCard->expiration_date) ?></td>
                                        <td class="status">
                                            <?php
                                            echo $status

                                            ?>
                                        </td>
                                        <td class="created"><?= h($userCard->created) ?></td>
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