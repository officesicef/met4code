<br><br><br>
<div class="row">
	<div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="white-box">
            <br><br>
			<h2 style="text-align: center;">Odabir lekara i traume</h2>
			<p style="text-align: center;">Ovde možete odabrati svog lekara i traumu koja vas muči</p>
			<br>
            <form method="post" action="<?php echo site_url('Lekarpacijent/inicializujProgram');?>" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-12">Izaberi lekara</label>
					<select name="KORISNIKLEKARID" data-placeholder="Izaberi lekara" class="custom-select col-12" style="width:100%;height: 40px;">
						<?php foreach($doktori as $D){ ?>
						    <option value="<?php print $D->KORISNIKID ?>"><?php print $D->USERNAME ?></option>
						<?php } ?>
					</select><br><br>
				</div>
				<div class="form-group">
					<label class="col-sm-12">Izaberi traumu</label>
					<select name="TRAUMAID" data-placeholder="Izaberi lekara" class="custom-select col-12" style="width:100%;height: 40px;">
						<?php foreach($traume as $T){ ?>
						    <option value="<?php print $T['TRAUMAID'] ?>"><?php print $T['TRAUMANAZIV'] ?></option>
						<?php } ?>
					</select><br><br>
					<button class="btn btn-success" type="submit">Započni</button>
                </div>
            </form>
        </div>
    </div>
</div>