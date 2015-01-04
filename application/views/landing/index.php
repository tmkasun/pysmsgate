<?php $this->load->view('commons/header'); ?>
    <style>
        .thumbnail:hover {
        background-color: rgb(244, 244, 242);

        }
    </style>

    <div class="row" style="width: 75%;
margin-left: auto;
margin-right: auto;
padding-top: 10px;">
        <div class="col-sm-3 ">
            <div class="thumbnail">
                <a href="<?= site_url("message/quick")?>">

                <img alt="quick message" src="<?= base_url() ?>assets/images/landing/quick_message.svg"
                     data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

                </a>
                <div class="caption">
                    <h3>Quick Message</h3>

                    <p>Send a quick message,simple.Only need number and message</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-offset-1">
            <div class="thumbnail">
                <img alt="Promotions" src="<?= base_url() ?>assets/images/landing/promotion_messages.svg"
                     data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

                <div class="caption">
                    <h3>Bulk Messages</h3>

                    <p>Bulk messages to group of people,can send custom messages per user</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-offset-1">
            <div class="thumbnail">
                <img alt="100%x200" src="<?= base_url() ?>assets/images/landing/diagnosis.svg"
                     data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

                <div class="caption">
                    <h3>Diagnose Service</h3>

                    <p>Show the health of the SMS service</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="width: 75%;
margin-left: auto;
margin-right: auto;
padding-top: 10px;">
        <div class="col-sm-3">
            <div class="thumbnail">
                <img alt="add new modem" src="<?= base_url() ?>assets/images/landing/add_modem.svg"
                     data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

                <div class="caption">
                    <h3>Add new Modem</h3>

                    <p>Add new messaging device</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-offset-1">
            <div class="thumbnail">
                <img alt="settings" src="<?= base_url() ?>assets/images/landing/settings.svg"
                     data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

                <div class="caption">
                    <h3>Settings</h3>

                    <p>Add/remove new users,change login credentials and more setting on platform</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-offset-1">
            <div class="thumbnail">
                <a href="<?= site_url("/api")?>">

                <img alt="API" src="<?= base_url() ?>assets/images/landing/api.svg" data-holder-rendered="true"
                     style="height: 200px; width: 100%; display: block;">
</a>
                <div class="caption">
                    <h3>API</h3>

                    <p>SMS Gateway API Documentation</p>
                </div>
            </div>
        </div>

    </div>

<?php $this->load->view('commons/footer'); ?>