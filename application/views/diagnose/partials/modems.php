<div class="row placeholders">
    <?php foreach ($modems as $modem): ?>
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
                            <span class="text-mute" style="font-size: 8pt;"><?= $modem->revision ?></span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li style="padding: 0px;margin: 0px;border: none;" class="list-group-item">
                                    <div style="padding: 0px;margin: 0px;" class="progress">
                                        <?php
                                        $signal_pre = round($modem->signalStrength * 100 / 32.2, 2)
                                        ?>
                                        <div class="progress-bar progress-bar-success"
                                             style="width: <?= $signal_pre ?>%">
                                            <i class="fa fa-signal">  <?= $signal_pre ?> %</i>
                                            <span class="sr-only">35% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    Imei <span style="float: right;"> <?= $modem->imei ?> </span>
                                </li>
                                <li class="list-group-item">
                                    Network <span style="float: right;"> <?= $modem->networkName ?> </span>
                                </li>
                                <li class="list-group-item">
                                    SMSC <span style="float: right;"> <?= $modem->smsc ?> </span>
                                </li>
                                <li class="list-group-item">
                                    IMSI <span style="float: right;"> <?= $modem->imsi ?> </span>
                                </li>
                                <li class="list-group-item">
                                    Modem path <span style="float: right;"> <?= $modem->port ?> </span>
                                </li>
                                <li class="list-group-item">
                                    Baudrate <span style="float: right;"> <?= $modem->baudrate ?> </span>
                                </li>
                                <li class="list-group-item">Alive
                                                    <span
                                                        style="float: right;color: <?= $modem->alive ? '#008000' : 'darkorange' ?> "><i
                                                            class="fa fa-circle blink_me"></i></span>
                                </li>
                            </ul>
                            <button type="button" onclick="$('#commonModal').modal('show').find('.modal-content').load('/diagnose/modal',{fd: '<?= $modem->port ?>'});return false" class="btn btn-default btn-lg btn-block">Diagnose</button>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
</div>