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


    </style>
    <div class="container-fluid">
        <div class="row" style="width: 75%;margin-left: auto;margin-right: auto">
            <h1 class="header">Available Modems</h1>
            <hr class="shadow-line">
            <div class="row placeholders">

                <?php foreach ($response->modems as $modem): ?>
                    <div class="col-md-6">
                        <div style="width: 50%;margin-left: auto;margin-right: auto;">

                            <?php if (!$modem->alive): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading"><i class="fa fa-question-circle"> Unknown Device</i>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Modem path <span style="float: right;"> <?= $modem->port ?> </span>
                                            </li>
                                            <li class="list-group-item">
                                                Baudrate <span style="float: right;"> <?= $modem->baudrate ?> </span>
                                            </li>
                                            <li class="list-group-item">Alive
                                                    <span
                                                        style="float: right;color: <?= $modem->alive ? '#008000' : 'darkorange' ?> "><i
                                                            class="fa fa-circle"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            <?php else : ?>
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><?= ucfirst($modem->manufacturer) ?>
                                        <span style="font-size: 11pt;"><?= $modem->model ?></span>
                                        <span class="text-mute" style="font-size: 8pt;"><?= $modem->revision ?></span></div>
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Modem path <span style="float: right;"> <?= $modem->port ?> </span>
                                            </li>
                                            <li class="list-group-item">
                                                Baudrate <span style="float: right;"> <?= $modem->baudrate ?> </span>
                                            </li>
                                            <li class="list-group-item">Alive
                                                    <span
                                                        style="float: right;color: <?= $modem->alive ? '#008000' : 'darkorange' ?> "><i
                                                            class="fa fa-circle"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <img src="assets/images/logos/<?= $modem->manufacturer ?>.png">
                            <?php endif ?>
                            <?= var_dump($modem) ?>
                            <span class="text-muted">Something else</span>
                        </div>
                    </div>

                <?php endforeach ?>
            </div>

            <h2 class="sub-header">Section title</h2>


        </div>
    </div>
<?php $this->load->view('commons/footer'); ?>