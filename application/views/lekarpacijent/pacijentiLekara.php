<br><br>
<h2 style="text-align: center;">Pregled pacijenata</h2>
<p style="text-align: center;">Ovde možete pogledati sve svoje pacijente</p>
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
                            <th>Završeno</th>
                            <th>Korisničko ime pacijenta</th>
                            <th>Naziv traume</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pacijenti as $c){ ?>
                            <tr>
                                <td><?php if($c->ZAVRSENO == 0) {echo "Nije";} else {echo "Jeste";} ?></td>
                                <td><?php echo $c->USERNAME; ?></td>
                                <td><?php echo $c->TRAUMANAZIV; ?></td>
                                <td>
                                    <a href="<?php echo site_url('terapija/dodajTerapijuPacijentu/'.$c->LEKARPACIJENT); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> Dodaj terapiju</a> 
                                <?php if ($c->ZAVRSENO == 0) { ?>
                                    <a href="<?php echo site_url('lekarpacijent/zavrsiTerapije/' . $c->LEKARPACIJENT); ?>"
                                        class="btn btn-info"><span class="fa fa-pencil"></span> Zavrsi Terapije</a></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>