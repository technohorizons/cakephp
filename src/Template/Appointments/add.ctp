<div class="users form">
<?= $this->Form->create($appointment) ?>
    <fieldset>
        <legend><?= __('Add Appointment') ?></legend>
        <?= $this->Form->control('doctor_id', array('class' => 'chzn-select', 'options' => $doctors, 'label' =>'Select Doctor')); ?>
        <?= $this->Form->control('date') ?>
        <?= $this->Form->control('time') ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>