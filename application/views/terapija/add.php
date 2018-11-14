<?php echo form_open('terapija/add'); ?>

	<div>
		<span class="text-danger">*</span>LEKARPACIJENT : 
		<input type="text" name="LEKARPACIJENT" value="<?php echo $this->input->post('LEKARPACIJENT'); ?>" />
		<span class="text-danger"><?php echo form_error('LEKARPACIJENT');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>VEZBAID : 
		<input type="text" name="VEZBAID" value="<?php echo $this->input->post('VEZBAID'); ?>" />
		<span class="text-danger"><?php echo form_error('VEZBAID');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>TERAPIJADATUM : 
		<input type="text" name="TERAPIJADATUM" value="<?php echo $this->input->post('TERAPIJADATUM'); ?>" />
		<span class="text-danger"><?php echo form_error('TERAPIJADATUM');?></span>
	</div>
	<div>
		RADKOMENTAR : 
		<textarea name="RADKOMENTAR"><?php echo $this->input->post('RADKOMENTAR'); ?></textarea>
	</div>
	<div>
		UPUTSTVO : 
		<textarea name="editor1" class="ckeditor"></textarea>
	</div>
	
	<button type="submit">Save</button>
	<button type="button" id="a">Save</button>

<?php echo form_close(); ?>