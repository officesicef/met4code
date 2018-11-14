<br><br>
<h2 style="text-align: center;">Dodavanje novih trauma</h2>
<p style="text-align: center;">Ovde možete dodati novu traumu</p>
<br>

<div class="row">
	<div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="white-box">
           <?php echo form_open('trauma/add'); ?>
                <div class="form-group">
                    <label class="col-md-12">Trauma naziv</label>
                    <div class="col-md-12">
                        <input type="text" name="TRAUMANAZIV" value="<?php echo $this->input->post('TRAUMANAZIV'); ?>" class="form-control"/>
                    </div>
                    <span class="text-danger"><?php echo form_error('TRAUMANAZIV');?></span>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="example-email">Vežba opis</label>
                    <div class="col-md-12">
                        <textarea name="TRAUMAOPIS" class="form-control"><?php echo $this->input->post('TRAUMAOPIS'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<button class="btn btn-success" type="submit">Sačuvaj</button>
            	</div>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>