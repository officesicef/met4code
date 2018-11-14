<?php echo form_open('role/edit/'.$role['ROLEID']); ?>

	<div>
		<span class="text-danger">*</span>ROLENAZIV : 
		<input type="text" name="ROLENAZIV" value="<?php echo ($this->input->post('ROLENAZIV') ? $this->input->post('ROLENAZIV') : $role['ROLENAZIV']); ?>" />
		<span class="text-danger"><?php echo form_error('ROLENAZIV');?></span>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>