<div class="posts index">
	<h2><?php echo __('Appointments'); ?></h2>

    <table cellpadding="0" cellspacing="0">

    <tr>

            <th><?= $this->Paginator->sort('id'); ?></th>

            <th><?= $this->Paginator->sort('date'); ?></th>

            <th><?= $this->Paginator->sort('time'); ?></th>
			
			<th><?= $this->Paginator->sort('status'); ?></th>

			<th><?= $this->Paginator->sort('created'); ?></th>
			
			<th class="actions"><?= __('Actions'); ?></th>

    </tr>

    <?php foreach ($appointments as $appointment): ?>

    <tr>

        <td><?= $appointment->id; ?>&nbsp;</td>

       	<td><?= $appointment->date; ?>&nbsp;</td>

		<td><?= $appointment->time; ?>&nbsp;</td>

		<td><?= ($appointment->status==='0')?'Pending':'Cancelled'; ?>&nbsp;</td>		

        <td><?= $appointment->created; ?>&nbsp;</td>

     
        <td class="actions">

        	 <?= ($appointment->status==='0')?
                        $this->Html->link(
                        'Cancel',
                        '/appointments/cancel/'. $appointment->id,
                        []
                        ):'';
                        ?> 

           

        </td>

    </tr>

<?php endforeach; ?>

    </table>

    
    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
<?php if($this->request->session()->read('Auth.User.role')!='doctor') { ?>
<div class="actions">

    <h3><?php echo __('Actions'); ?></h3>

    <ul>

        <li><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add')); ?></li>

    </ul>

</div>
<?php } ?>
