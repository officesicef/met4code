<br><br>
<h2 style="text-align: center;">Dodavanje terapije pacijentima</h2>
<p style="text-align: center;">Ovde možete dodati terapiju pacijentu</p>
<br>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <div class="white-box">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Naziv vežbe</th>
                            <th>Komentar pacijenta</th>
                            <th>Datum kraja terapije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($istorijaTerapija as $c){ ?>
                            <tr>
                                <td><?php echo $c->VEZBANAZIV; ?></td>
                                <td><?php echo $c->RADKOMENTAR; ?></td>
                                <td><?php echo $c->TERAPIJADATUM; ?></td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table><br><br>
                <form method="post" action="<?php echo site_url('Terapija/dodajTerapiju');?>">
                    <label class="col-md-12">Izaberite vežbu</label>
                    <input style="display: none;" type="text" name="idLekarPacijent" value="<?php echo $idLekarPacijent ?>" >
                    <select id="VEZBAID" name="VEZBAID" style="width: 100%;height: 40px;">
                        <?php
                            foreach ($vezbe as $v) {
                                echo '<option value="' . $v['VEZBAID'] . '">' . $v['VEZBANAZIV'] . '</option>';
                            }
                        ?>
                    </select><br><br>
                    <label class="col-md-12">Datum terapije</label>
                    <input type="date" name="TERAPIJADATUM" class="has-datepicker form-control" id="TERAPIJADATUM" /><br>
                    <label class="col-md-12">Napišite uputstvo pacijentu</label>
                    <br>
                    <textarea name="editor1" class="ckeditor"></textarea>
                    <input class="btn btn-success" type="submit" value="Dodaj terapiju">
                </form>
            </div>
        </div>
    </div>
</div>