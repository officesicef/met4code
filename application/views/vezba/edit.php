<br><br>
<h2 style="text-align: center;">Izmena postojećih vežbi</h2>
<p style="text-align: center;">Ovde možete izmeniti postojeću vežbu</p>
<br>

<div class="row">
	<div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="white-box">
            <?php echo form_open('vezba/edit/'.$vezba['VEZBAID']); ?>
                <div class="form-group">
                    <label class="col-md-12">Vežba naziv</label>
                    <div class="col-md-12">
                        <input type="text" name="VEZBANAZIV" value="<?php echo ($this->input->post('VEZBANAZIV') ? $this->input->post('VEZBANAZIV') : $vezba['VEZBANAZIV']); ?>" class="form-control"/>
                    </div>
                    <span class="text-danger"><?php echo form_error('VEZBANAZIV');?></span>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="example-email">Vežba opis</label>
                    <div class="col-md-12">
                        <textarea name="VEZBAOPIS" class="form-control"><?php echo ($this->input->post('VEZBAOPIS') ? $this->input->post('VEZBAOPIS') : $vezba['VEZBAOPIS']); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<button class="btn btn-success" type="submit">Sačuvaj</button>
            	</div>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>