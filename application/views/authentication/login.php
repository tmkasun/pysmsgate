<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <meta name="description" content="Simple SMS gateway using USB GSM Modems">
    <meta name="author" content="Knnect">
    <title>SMS Gateway Service</title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.theme.css">

    <!--Custom CSS styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">

    <script src="<?= base_url() ?>assets/js/jquery-2.1.3.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>

    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

    <!--Custom Javascript file -->
    <script src="<?= base_url() ?>assets/js/login/login.js"></script>

    <!--bootstrap-application-wizard-->
    <!-- Source: http://www.panopta.com/2013/02/06/bootstrap-application-wizard-2/ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-wizard-lib/bootstrap-wizard.css">
    <!--bootstrap-application-wizard-->
    <script src="<?= base_url() ?>assets/js/bootstrap-wizard-lib/bootstrap-wizard.js"></script>


</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Log in with your user account</h1>

                    <form role="form" action="<?= base_url() ?>authenticate/login" method="post" id="login-form"
                          autocomplete="off">
                        <div class="form-group">
                            <label for="user" class="sr-only">User</label>
                            <input type="text" name="user" id="user" class="form-control"
                                   placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your
                        password?</a>
                    <hr>
                </div>
            </div>
            <!-- /.col-xs-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Recovery password</h4>
            </div>
            <div class="modal-body">
                <p>Type your email account</p>
                <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom">Recovery</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="setup_wizard" style="display: none;">

</div>
<footer id="footer">
    <div class="container">
        <div class="row">
            <span><a
                    onclick="$('#setup_wizard').load('system_tools/setup_wizard',function(data){initWizard()});return false">Need
                    a help <i class="fa fa-question-circle"></i>, Try
                    <span style="color: rgba(168, 0, 148, 1);cursor: pointer;">Setup-Wizard</span></a></span>

            <div class="col-xs-12">
                <p>Powered by <strong><a href="http://www.knnect.com"
                                         target="_blank">Knnect</a></strong></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>