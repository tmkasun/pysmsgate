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
    <!--Documentation @ http://daneden.github.io/animate.css/ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">

    <!--Custom CSS styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/breadcrumb-custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/footer-bottom.css">

    <script src="<?= base_url() ?>assets/js/jquery-2.1.3.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>

    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap-growl.js"></script>

    <!--Custom JavaScript files -->
    <script src="<?= base_url() ?>assets/js/application.js"></script>

</head>
<body>
<nav class="navbar navbar-default" style="margin-bottom: 0px">
    <div class="container-fluid" style="width: 75%;">
        <div class="navbar-header">
            <a class="navbar-brand disabled" href="/">
                <i class="fa fa-envelope-o"><span style="font-size: x-small;display: block">SMS</span></i>
            </a>
        </div>
    </div>
</nav>

<div class="container-fluid" style="width: 75%;margin-left: auto;margin-right: auto;">
<div class="container">
    <div class="row">
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-default">Home</a>
            <a href="#" class="btn btn-default"><?= ucfirst($this->router->fetch_class()); ?></a>
            <a href="#" class="btn btn-default"><?= ucfirst($this->router->fetch_method()); ?></a>
        </div>
    </div>
</div>

    </div>
<hr style="margin: 0px" />
