<?php

$class = "alert-danger";
if ($response->result == true and $response->failures == 0) {
    $class = "alert-success";
} else if ($response->result == true) {
    $class = "alert-warning";
}

$this->load->view('commons/header', array('class' => $class)); ?>

    <style>
        hr.shadow-line {
            border: 0;
            height: 1px;
            position: relative;
            margin: 0.5em 0; /* Keep other elements away from pseudo elements*/
        }

        hr.shadow-line:before {
            top: -0.5em;
            height: 1em;
        }

        hr.shadow-line:after {
            content: '';
            height: 0.5em; /* half the height of :before */
            top: 1px; /* height of hr*/
        }

        hr.shadow-line:before, hr.shadow-line:after {
            content: '';
            position: absolute;
            width: 100%;
        }

        hr.shadow-line, hr.shadow-line:before {
            background: -moz-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0) 75%);
            background: -webkit-gradient(radial, center center, 0px, center center, 75%, color-stop(0%, rgba(0, 0, 0, 0.1)), color-stop(75%, rgba(0, 0, 0, 0)));
            background: -webkit-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0) 75%);
            background: -o-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0) 75%);
            background: -ms-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0) 75%);
            background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0) 75%);
        }

        .blink_me {
            -webkit-animation-name: blinker;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: infinite;

            -moz-animation-name: blinker;
            -moz-animation-duration: 1s;
            -moz-animation-timing-function: linear;
            -moz-animation-iteration-count: infinite;

            animation-name: blinker;
            animation-duration: 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @-moz-keyframes blinker {
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

        @-webkit-keyframes blinker {
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

        @keyframes blinker {
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

    </style>
    <div class="container-fluid">
        <div class="row" style="width: 75%;margin-left: auto;margin-right: auto">
            <h2 class="header">Available Modems <i class="fa fa-refresh text-info" style="font-size: medium;cursor: pointer;"></i>
            </h2>
            <hr class="shadow-line">
            <?php
            if($response->result) {
                $this->load->view('/diagnose/partials/modems', array('modems' => $response->modems));

            }
            else{
                $this->load->view('/commons/service_error');
            }
                ?>
            <h2 class="sub-header">Section title</h2>
            <hr class="shadow-line">
        </div>
    </div>
<?php $this->load->view('commons/footer'); ?>