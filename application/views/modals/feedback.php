<html>
<head>
    <!--Custom CSS styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/feedback-form.css">
    <script>
        $("#feedback-form").submit(function () {
           var alertMessage = $.growl(
                {
//                    title: '<strong>Feedback:</strong> ',
                    message: 'Sending feedback...'
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
            var url = "system_tools/submit_feedback"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#feedback-form").serialize(), // serializes the form's elements.
                success: function (data) {
                    console.log(data); // show response from the php script.
                    alertMessage.update('type', 'success');
                    alertMessage.update('message', 'Feedback sent.Thank you.');
                    setTimeout(function(){alertMessage.close()},2000);
                }
            });
            closeAll();
            return false; // avoid to execute the actual submit of the form.
        });
    </script>
</head>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Any
            questions? Feel free to contact us.</h4>
    </div>
    <form id="feedback-form" action="system_tools/submit_feedback" method="post" accept-charset="utf-8">
        <div class="modal-body" style="padding: 5px;">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                    <input class="form-control" name="firstname" placeholder="Firstname" type="text" required
                           autofocus/>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                    <input class="form-control" name="lastname" placeholder="Lastname" type="text" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                    <input class="form-control" name="email" placeholder="E-mail" type="text" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                    <input class="form-control" name="subject" placeholder="Subject" type="text" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                            <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6"
                                      name="comment" required></textarea>
                </div>
            </div>
        </div>
        <div class="panel-footer" style="margin-bottom:-14px;">
            <input type="submit" class="btn btn-success" value="Send"/>
            <!--<span class="glyphicon glyphicon-ok"></span>-->
            <input type="reset" class="btn btn-danger" value="Clear"/>
            <!--<span class="glyphicon glyphicon-remove"></span>-->
            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">
                Close
            </button>
        </div>
</div>

</body>
</html>
