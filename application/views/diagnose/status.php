<?php $this->load->view('commons/header'); ?>

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