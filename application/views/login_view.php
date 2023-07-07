<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login - <?php echo $this->config->item('company'); ?></title>
        <?php $this->load->view('includes/head'); ?> 
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <section id="wrapper">

            <div class="login-register header-filter" filter-color="black" style="background-image: url('assets/images/background/login.jpg');">
                <div class="container">
                    <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                        <div class="login-box card">

                            <div class="card-header card-header-rose text-center">
                                <div class="card-text" style="width: 100%">
                                    <h4 class="card-title text-center">Login</h4>
                                    <p class="card-category loginP">Welcome <?= date("d-M-Y") ?></p>
                                </div>
                            </div>
                                <div class="errorMsg">
                                <?php if (!empty($message)) { ?>
                                    <div id="message">
                                        <?php echo $message; ?>
                                    </div>
                                <?php } ?>
                                </div>
                            <div class="card-body loginCard">
                                <div class="clearfix"></div>
                                
                                <?php echo form_open(current_url(), 'id="loginform" class="parallel form-horizontal form-material"'); ?>  
                                <div class="text-center pb-3 loginImg">
                                    <img src="assets/images/logo.png" />
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ti-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="identity" placeholder="User Name" name="login_identity" value="<?php echo set_value('login_identity', ''); ?>" class="form-control" autocomplete="off"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ti-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" required="" placeholder="Password" id="password" name="login_password" value="<?php echo set_value('login_password', ''); ?>" autocomplete="nope"/>
                                    </div>
                                </div>

                                <?php
                                # Below are 2 examples, the first shows how to implement 'reCaptcha' (By Google - http://www.google.com/recaptcha),
                                # the second shows 'math_captcha' - a simple math question based captcha that is native to the flexi auth library. 
                                # This example is setup to use reCaptcha by default, if using math_captcha, ensure the 'auth' controller and 'demo_auth_model' are updated.
                                # reCAPTCHA Example
                                # To activate reCAPTCHA, ensure the 'if' statement immediately below is uncommented and then comment out the math captcha 'if' statement further below.
                                # You will also need to enable the recaptcha examples in 'controllers/auth.php', and 'models/demo_auth_model.php'.
                                #/*
                                #if (isset($captcha)) {
                                #    echo "<li>\n";
                                #    echo $captcha;
                                #    echo "</li>\n";
                                #}
                                #*/

                                /* math_captcha Example
                                  # To activate math_captcha, ensure the 'if' statement immediately below is uncommented and then comment out the reCAPTCHA 'if' statement just above.
                                  # You will also need to enable the math_captcha examples in 'controllers/auth.php', and 'models/demo_auth_model.php'.
                                 */



                                if (isset($captcha)) {
                                    echo '<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label for=\"captcha\">Captcha Question: ' . $captcha . ' = </label>
                                        </div>
                                        <input type="text" id="captcha" name="login_captcha"  class="form-control" required="" />;
                                    </div>
                                </div>';
                                    #echo "<label for=\"captcha\">Captcha Question:</label>\n";
                                    #echo $captcha . ' = <input type="text" id="captcha" name="login_captcha" class="width_50"/>' . "\n";
                                }
                                ?>
                                <!--                            <div class="form-group">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div class="checkbox checkbox-primary p-t-0">
                                                                        <input id="checkbox-signup" type="checkbox">
                                                                        <label for="checkbox-signup"> Remember me </label>
                                                                    </div> 
                                                                    <div class="ml-auto">
                                                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> 
                                                                    </div>
                                                                </div>
                                                            </div>-->
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <button type="submit" name="login_user" id="submit" value="Submit" class="btn btn-rose btn-link text-uppercase waves-effect waves-light">Lets Go</button>
                                    </div>
                                </div>
                                </form>
                                <form class="form-horizontal" id="recoverform" action="index.html">
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <h3>Recover Password</h3>
                                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                                    </div>
                                    <div class="form-group text-center m-t-20">
                                        <div class="col-xs-12">
                                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loginFooter">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                               <div class="companyInfo">
                                    <h1>Web Next Technology</h1>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <div class="footerAddress">
                                <ul>
                                    <li><i class="fa fa-home"></i> JVS Tower, E-12/2, First Floor,</li>
                                    <li>Sector 1, Noida, U.P. 201301</li>
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="footerContact">
                                <ul>
                                    <li><i class="fa fa-phone"> </i> +91 9971618434, 9315015872</li>
                                    <li><i class="fa fa-envelope "> </i> support@webnexttechnology.in</li>
                                </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <?php $this->load->view('includes/scripts'); ?> 

    </body>

</html>