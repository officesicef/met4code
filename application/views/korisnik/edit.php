<?php echo form_open('korisnik/edit/'.$korisnik['KORISNIKID']); ?>

	<div>
		<span class="text-danger">*</span>PASSWORD : 
		<input type="password" name="PASSWORD" value="<?php echo ($this->input->post('PASSWORD') ? $this->input->post('PASSWORD') : $korisnik['PASSWORD']); ?>" />
		<span class="text-danger"><?php echo form_error('PASSWORD');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>ROLEID : 
		<input type="text" name="ROLEID" value="<?php echo ($this->input->post('ROLEID') ? $this->input->post('ROLEID') : $korisnik['ROLEID']); ?>" />
		<span class="text-danger"><?php echo form_error('ROLEID');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>USERNAME : 
		<input type="text" name="USERNAME" value="<?php echo ($this->input->post('USERNAME') ? $this->input->post('USERNAME') : $korisnik['USERNAME']); ?>" />
		<span class="text-danger"><?php echo form_error('USERNAME');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>EMAIL : 
		<input type="text" name="EMAIL" value="<?php echo ($this->input->post('EMAIL') ? $this->input->post('EMAIL') : $korisnik['EMAIL']); ?>" />
		<span class="text-danger"><?php echo form_error('EMAIL');?></span>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>