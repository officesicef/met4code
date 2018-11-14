<?php echo form_open('terapija/edit/'.$terapija['TERAPIJAID']); ?>

	<div>
		<span class="text-danger">*</span>LEKARPACIJENT : 
		<input type="text" name="LEKARPACIJENT" value="<?php echo ($this->input->post('LEKARPACIJENT') ? $this->input->post('LEKARPACIJENT') : $terapija['LEKARPACIJENT']); ?>" />
		<span class="text-danger"><?php echo form_error('LEKARPACIJENT');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>VEZBAID : 
		<input type="text" name="VEZBAID" value="<?php echo ($this->input->post('VEZBAID') ? $this->input->post('VEZBAID') : $terapija['VEZBAID']); ?>" />
		<span class="text-danger"><?php echo form_error('VEZBAID');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>TERAPIJADATUM : 
		<input type="text" name="TERAPIJADATUM" value="<?php echo ($this->input->post('TERAPIJADATUM') ? $this->input->post('TERAPIJADATUM') : $terapija['TERAPIJADATUM']); ?>" />
		<span class="text-danger"><?php echo form_error('TERAPIJADATUM');?></span>
	</div>
	<div>
		RADKOMENTAR : 
		<textarea name="RADKOMENTAR"><?php echo ($this->input->post('RADKOMENTAR') ? $this->input->post('RADKOMENTAR') : $terapija['RADKOMENTAR']); ?></textarea>
	</div>
	<div>
		UPUTSTVO : 
		<textarea name="UPUTSTVO"><?php echo ($this->input->post('UPUTSTVO') ? $this->input->post('UPUTSTVO') : $terapija['UPUTSTVO']); ?></textarea>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>