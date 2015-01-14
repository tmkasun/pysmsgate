<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fuel UX Basic Template (Globals)</title>
    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//www.fuelcdn.com/fuelux/3.4.0/js/fuelux.min.js"></script>
    <!-- CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//www.fuelcdn.com/fuelux/3.4.0/css/fuelux.min.css" rel="stylesheet">
    <script>
        $(function () {
            $("#MyWizard").wizard();
        });

    </script>
</head>
<body class="fuelux">
<!-- Checkbox example -->
<div class="checkbox">
    <label class="checkbox-custom" data-initialize="checkbox">
        <input class="sr-only" data-toggle="#hereKittyKitty" type="checkbox" value="option1">
        <span class="checkbox-label">I love kittens!</span>
    </label>
</div>
<div id="hereKittyKitty" class="alert bg-info">Great. Meow, too!</div>

<div class="well wizard-example">
    <div class="wizard" id="MyWizard">
        <ul class="steps">
            <li data-step="1" class="active"><span class="badge">1</span>Campaign<span class="chevron"></span></li>
            <li data-step="2"><span class="badge">2</span>Recipients<span class="chevron"></span></li>
            <li data-step="3"><span class="badge">3</span>Template<span class="chevron"></span></li>
        </ul>
        <div class="actions">
            <button class="btn btn-default btn-prev"><span class="glyphicon glyphicon-arrow-left"></span>Prev</button>
            <button class="btn btn-default btn-next" data-last="Complete">Next<span
                    class="glyphicon glyphicon-arrow-right"></span></button>
        </div>
        <div class="step-content">
            <div class="step-pane active sample-pane alert" data-step="1">
                <h4>Setup Campaign</h4>

                <p>Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi
                    tomatillo melon azuki bean garlic. Beetroot water spinach okra water chestnut ricebean pea catsear
                    courgette.</p>
            </div>
            <div class="step-pane sample-pane bg-info alert" data-step="2">
                <h4>Choose Recipients</h4>

                <p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery
                    bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot
                    squash brussels sprout chard. </p>
            </div>
            <div class="step-pane sample-pane bg-danger alert" data-step="3">
                <h4>Design Template</h4>

                <p>Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery. Bunya nuts
                    black-eyed pea prairie turnip leek lentil turnip greens parsnip. Sea lettuce lettuce water chestnut
                    eggplant winter purslane fennel azuki bean earthnut pea sierra leone bologi leek soko chicory
                    celtuce parsley jÃ­cama salsify. </p>
            </div>
        </div>


    </div>
</div>

</body>
</html>