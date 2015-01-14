<script xmlns="http://www.w3.org/1999/html">
    $("#dial_diag").submit(function () {
        var alertMessage =diag_alert('Dialing');
        var url = "<?= site_url('/diagnose/dial')?>"; // the script where you handle the form input.
        $.ajax({
            type: "POST",
            url: url,
            data: $("#dial_diag").serialize(), // serializes the form's elements.
            success: function (data) {
                $("#number").val("");
                console.log(data); // show response from the php script.
                alertMessage.update('type', 'success');
                alertMessage.update('message', 'Ringing..');
                setTimeout(function () {
                    alertMessage.close()
                }, 5000);
            }
        });
        return false; // avoid to execute the actual submit of the form.
    });

    $("#sms_diag").submit(function () {
        var alertMessage =diag_alert('Sending');
        var url = "<?= site_url('/diagnose/send')?>"; // the script where you handle the form input.
        $.ajax({
            type: "POST",
            url: url,
            data: $("#sms_diag").serialize(), // serializes the form's elements.
            success: function (data) {
                $("#sms_number").val("");
                console.log(data); // show response from the php script.
                alertMessage.update('type', 'success');
                alertMessage.update('message', 'Sent!');
                setTimeout(function () {
                    alertMessage.close()
                }, 5000);
            }
        });
        return false; // avoid to execute the actual submit of the form.
    });

    function diag_alert(message){
        return $.growl(
            {
//                    title: '<strong>Feedback:</strong> ',
                message: message+'...'
            },
            {
                type: 'info',
                timer: 1000,
                delay: 10000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
                , placement: {
                from: "top",
                align: "center"
            }
            });
    }
</script>
<div class="panel panel-default">
    <div class="panel-heading"><h4><?= ucfirst($modem->modems->manufacturer) ?> <span
                style="font-size: small"><?= ucfirst($modem->modems->model) ?></span></h4></div>
    <div class="panel-body">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#A" data-toggle="tab">Call</a></li>
            <li class=""><a href="#B" data-toggle="tab">Sms</a></li>
        </ul>
        <div class="tabbable">
            <div class="tab-content">
                <div class="tab-pane active" id="A">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="dial_diag" action="/diagnose/dial" method="post">
                            <div class="form-group">
                                <label for="number">Dial</label>

                                <div class="input-group" data-validate="number">
                                    <input type="text" class="form-control" name="number" id="number"
                                           placeholder="Phone number" required>
                                    <input type="hidden" name="fd" id="fd" value="<?= $modem->modems->port ?>" required>
                                    <span class="input-group-addon danger"><i class="fa fa-phone"></i></span>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success col-xs-12" value="Call">
                        </form>
                    </div>
                </div>

                <div class="tab-pane" id="B">
                    <div class="col-md-8 ">
                        <form id="sms_diag" action="/diagnose/send" method="post">
                            <div class="form-group">
                                <label for="sms_number">Send</label>

                                <div class="input-group" data-validate="sms_number">
                                    <input type="text" class="form-control" name="sms_number" id="sms_number"
                                           placeholder="Phone number" required>
                                    <input type="hidden" name="fd" id="fd" value="<?= $modem->modems->port ?>" required>
                                    <span class="input-group-addon danger"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success col-xs-12" value="Send">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a style="padding-top: 25px;" class="btn" data-toggle="collapse" href="#collapseExample"
                           aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-eye"></i>
                        </a>

                        <div class="collapse" id="collapseExample">
                            <div class="well well-sm">
                                Knnect SMS Gateway Service<br/>
                                Testing SMS<br/>
                                <?php $signal_pre = round($modem->modems->signalStrength * 100 / 32.2, 2) ?>
                                Signal <span class="text-info" style="float: right;"> <?= $signal_pre ?> %</span><br/>
                                Imei <span class="text-info"
                                           style="float: right;"> <?= $modem->modems->imei ?> </span><br/>
                                Network <span class="text-info"
                                              style="float: right;"> <?= $modem->modems->networkName ?> </span><br/>
                                SMSC <span class="text-info"
                                           style="float: right;"> <?= $modem->modems->smsc ?> </span><br/>
                                IMSI <span class="text-info"
                                           style="float: right;"> <?= $modem->modems->imsi ?> </span><br/>
                                Modem path <span class="text-info"
                                                 style="float: right;"> <?= $modem->modems->port ?> </span><br/>
                                Baudrate <span class="text-info"
                                               style="float: right;"> <?= $modem->modems->baudrate ?> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /tabbable -->

    </div>
    <!--/panel-body-->
</div>