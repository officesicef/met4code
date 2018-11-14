<?php echo form_open('lekarpacijent/edit/'.$lekarpacijent['LEKARPACIJENT']); ?>

	<div>
		ZAVRSENO : 
		<input type="checkbox" name="ZAVRSENO" value="1" <?php echo ($lekarpacijent['ZAVRSENO']==1 ? 'checked="checked"' : ''); ?> />
	</div>
	<div>
		<span class="text-danger">*</span>KORISNIKPACIJENTID : 
		<input type="text" name="KORISNIKPACIJENTID" value="<?php echo ($this->input->post('KORISNIKPACIJENTID') ? $this->input->post('KORISNIKPACIJENTID') : $lekarpacijent['KORISNIKPACIJENTID']); ?>" />
		<span class="text-danger"><?php echo form_error('KORISNIKPACIJENTID');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>TRAUMAID : 
		<input type="text" name="TRAUMAID" value="<?php echo ($this->input->post('TRAUMAID') ? $this->input->post('TRAUMAID') : $lekarpacijent['TRAUMAID']); ?>" />
		<span class="text-danger"><?php echo form_error('TRAUMAID');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>KORISNIKLEKARID : 
		<input type="text" name="KORISNIKLEKARID" value="<?php echo ($this->input->post('KORISNIKLEKARID') ? $this->input->post('KORISNIKLEKARID') : $lekarpacijent['KORISNIKLEKARID']); ?>" />
		<span class="text-danger"><?php echo form_error('KORISNIKLEKARID');?></span>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>