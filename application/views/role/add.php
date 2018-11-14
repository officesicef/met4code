<?php echo form_open('role/add'); ?>

	<div>
		<span class="text-danger">*</span>ROLENAZIV : 
		<input type="text" name="ROLENAZIV" value="<?php echo $this->input->post('ROLENAZIV'); ?>" />
		<span class="text-danger"><?php echo form_error('ROLENAZIV');?></span>
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>