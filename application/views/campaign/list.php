<?php $this->load->view('commons/header'); ?>

    <div class="row" style="width: 75%;margin-left: auto;margin-right: auto">

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-body">
                <p class="text-info">
                    Available list for SMS campaigns.You can create new list using create button below.
                </p>
            </div>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Number</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($people as $person ) { ?>
                <tr>
                    <th scope="row"><?= isset($person['profileType']) ? $person['profileType'] : 'Hao Staff' ?></th>
                    <td><?= $person['name'] ?></td>
                    <td><?= $person['tp'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-plus-sign"
                                                                aria-hidden="true"></span> Create</a>
    </div>
<?php $this->load->view('commons/footer'); ?>