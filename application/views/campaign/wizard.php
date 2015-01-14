<?php
/**
 * Created by PhpStorm.
 * User: kbsoft
 * Date: 1/14/15
 * Time: 7:21 AM
 */ ?>

<?php $this->load->view('commons/header'); ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fuelux.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?= base_url() ?>assets/js/fuelux.min.js"></script>


    <script>
        $(function () {
            var campaignWizard = $('#MyWizard');
            campaignWizard.wizard();
            campaignWizard.on('change', function (e, data) {
                console.log('change');
                if (data.step === 3 && data.direction === 'next') {
                    // return e.preventDefault();
                }
            });
            campaignWizard.on('changed.fu.wizard', function (e, data) {
                console.log('changed');
                console.log(data);
            });
            campaignWizard.on('finished.fu.wizard', function (e, data) {
                console.log('finished');
                console.log(data);
            });
            $('#btnWizardPrev').on('click', function () {
                campaignWizard.wizard('previous');
            });
            $('#btnWizardNext').on('click', function () {
                campaignWizard.wizard('next', 'foo');
            });
            $('#btnWizardStep').on('click', function () {
                var item = campaignWizard.wizard('selectedItem');
                console.log(item.step);
            });
            campaignWizard.on('stepclick', function (e, data) {
                console.log('step' + data.step + ' clicked');
                if (data.step === 1) {
                    // return e.preventDefault();
                }
            });

            // optionally navigate back to 2nd step
            $('#btnStep2').on('click', function (e, data) {
                $('[data-target=#step2]').trigger("click");
            });


        });

    </script>
    <div class="fuelux">

        <div class="well wizard-example">
            <div class="wizard" id="MyWizard">
                <ul class="steps">
                    <li data-step="1" class="active"><span class="badge">1</span>Campaign<span class="chevron"></span>
                    </li>
                    <li data-step="2"><span class="badge">2</span>Recipients<span class="chevron"></span></li>
                    <li data-step="3"><span class="badge">3</span>Template<span class="chevron"></span></li>
                </ul>
                <div class="actions">
                    <button class="btn btn-default btn-prev"><span class="glyphicon glyphicon-arrow-left"></span>Prev
                    </button>
                    <button class="btn btn-default btn-next" data-last="Complete">Next<span
                            class="glyphicon glyphicon-arrow-right"></span></button>
                </div>
                <div class="step-content">
                    <div class="step-pane active sample-pane alert" data-step="1">
                        <h4>Setup Campaign</h4>

                        <p>Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth
                            tatsoi
                            tomatillo melon azuki bean garlic. Beetroot water spinach okra water chestnut ricebean pea
                            catsear
                            courgette.</p>
                    </div>
                    <div class="step-pane sample-pane bg-info alert" data-step="2">
                        <h4>Choose Recipients</h4>

                        <p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram
                            celery
                            bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish
                            carrot
                            squash brussels sprout chard. </p>
                    </div>
                    <div class="step-pane sample-pane bg-danger alert" data-step="3">
                        <h4>Design Template</h4>

                        <p>Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery. Bunya
                            nuts
                            black-eyed pea prairie turnip leek lentil turnip greens parsnip. Sea lettuce lettuce water
                            chestnut
                            eggplant winter purslane fennel azuki bean earthnut pea sierra leone bologi leek soko
                            chicory
                            celtuce parsley jÃ­cama salsify. </p>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <br>
    <input class="btn btn-default" id="btnWizardPrev" value="Back" type="button">
    <input class="btn btn-primary" id="btnWizardNext" value="Next" type="button">

<?php $this->load->view('commons/footer'); ?>