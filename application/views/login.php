<section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form method="post" action="<?php echo site_url('Dashboard/user_validation');?>" class="form-horizontal form-material" id="loginform" >
                    <h3 class="box-title m-b-20">Logovanje</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input placeholder="Korisničko ime" name="username" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input placeholder="Lozinka" name="password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ulogujte se</button>
                        </div>
                    </div>
                    
                </form>
                <?php if ($this->session->flashdata('error') != '') {
                        echo '<br>'. $this->session->flashdata('error');
                    }
                ?>
            </div>
        </div>
    </section>
