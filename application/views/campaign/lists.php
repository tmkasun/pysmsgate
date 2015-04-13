<?php $this->load->view('commons/header'); ?>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>
<style>
    .clickable-row{
        cursor: pointer;
    }
</style>
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>People count</th>
                </tr>
                </thead>
                <tbody>
                <tr class='clickable-row' data-href="/campaigns/get_list/<?= '1' ?>" >
                    <th scope="row">1</th>
                    <td>All Customers</td>
                    <td><?= $customers_count ?></td>
                </tr>
                <tr class='clickable-row' data-href="/campaigns/get_list/<?= '2' ?>" >
                    <th scope="row">2</th>
                    <td>Internal Users</td>
                    <td><?= $users_count ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create</a>
    </div>
<?php $this->load->view('commons/footer'); ?>