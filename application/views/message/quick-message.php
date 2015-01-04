<?php $this->load->view('commons/header'); ?>

<style>
    input, textarea, button { margin-top:10px }

    /* Required field START */

    .required-field-block {
        position: relative;
    }

    .required-field-block .required-icon {
        display: inline-block;
        vertical-align: middle;
        margin: -0.25em 0.25em 0em;
        background-color: #E8E8E8;
        border-color: #E8E8E8;
        padding: 0.5em 0.8em;
        color: rgba(0, 0, 0, 0.65);
        text-transform: uppercase;
        font-weight: normal;
        border-radius: 0.325em;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: background 0.1s linear;
        -moz-transition: background 0.1s linear;
        transition: background 0.1s linear;
        font-size: 75%;
    }

    .required-field-block .required-icon {
        background-color: transparent;
        position: absolute;
        top: 0em;
        right: 0em;
        z-index: 10;
        margin: 0em;
        width: 30px;
        height: 30px;
        padding: 0em;
        text-align: center;
        -webkit-transition: color 0.2s ease;
        -moz-transition: color 0.2s ease;
        transition: color 0.2s ease;
    }

    .required-field-block .required-icon:after {
        position: absolute;
        content: "";
        right: 1px;
        top: 1px;
        z-index: -1;
        width: 0em;
        height: 0em;
        border-top: 0em solid transparent;
        border-right: 30px solid transparent;
        border-bottom: 30px solid transparent;
        border-left: 0em solid transparent;
        border-right-color: inherit;
        -webkit-transition: border-color 0.2s ease;
        -moz-transition: border-color 0.2s ease;
        transition: border-color 0.2s ease;
    }

    .required-field-block .required-icon .text {
        color: #B80000;
        font-size: 26px;
        margin: -3px 0 0 12px;
    }
    /* Required field END */

</style>

<script>
    $(function() {
        $('.required-icon').tooltip({
            placement: 'left',
            title: 'Required field'
        });


        $("#quick_message_form").submit(function () {
            var alertMessage = $.growl(
                {
//                    title: '<strong>Feedback:</strong> ',
                    message: 'Sending message...'
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
            var url = "<?= site_url('message/quick_send')?>"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#quick_message_form").serialize(), // serializes the form's elements.
                success: function (data) {
                    $("#phone_number").val("");
                    $("#message_body").val("");
                    console.log(data); // show response from the php script.
                    alertMessage.update('type', 'success');
                    alertMessage.update('message', 'Message sent.');
                    setTimeout(function(){alertMessage.close()},2000);
                }
            });
            return false; // avoid to execute the actual submit of the form.
        });

    });

</script>
    <div class="container">

        <form id="quick_message_form" role="form" method="post" action="<?= site_url('message/quick_send') ?>" style="width:400px; margin: 0 auto;">
            <h1 class="text-info">Quick SMS</h1>

            <div class="required-field-block">
                <input autofocus="true" id="phone_number" name="phone_number" type="text" placeholder="Phone" class="form-control">
                <div class="required-icon">
                    <div class="text">*</div>
                </div>
            </div>
            <div class="required-field-block">
                <textarea id="message_body" name="message_body" rows="3" class="form-control" placeholder="Message"></textarea>
                <div class="required-icon">
                    <div class="text">*</div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Send" />
        </form>
    </div>

<?php $this->load->view('commons/footer'); ?>