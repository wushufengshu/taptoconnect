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
<div class="mb-3">

    <?= $this->Form->submit(__('Activate Card'), ['class' => 'btn btn-primary d-block w-100 mt-3']); ?>
</div>
<?= $this->Form->end() ?>