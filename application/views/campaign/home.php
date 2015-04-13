<?php
/**
 * Created by PhpStorm.
 * User: kbsoft
 * Date: 1/14/15
 * Time: 7:21 AM
 */ ?>

<?php $this->load->view('commons/header'); ?>

    <div class="row" style="width: 75%;margin-left: auto;margin-right: auto">
        <div class="row row-centered" style="padding-top: 20px">
            <div class="col-md-3 col-centered" style="text-align: center">
                <a href="/campaigns/lists" type="button" class="btn btn-default btn-lg">
                    <i class="fa fa-list-ul fa-3x" style="color: mediumvioletred;"></i>
                   <span style="vertical-align: middle;display: block;" class="text-center text-muted">Lists</span>
                </a>
            </div>
            <div class="col-md-3 col-centered" style="text-align: center">
                <a type="button" class="btn btn-default btn-lg">
                    <i class="fa fa fa-rocket fa-3x" style="color: yellowgreen;" ></i>
                    <span style="vertical-align: middle;display: block;" class="text-center text-muted">Templates</span>
                </a>
            </div>
            <div class="col-md-3" style="text-align: center">
                <a type="button" class="btn btn-default btn-lg">
                    <i class="fa fa-area-chart fa-3x" style="color: tomato;"></i>
                    <span style="vertical-align: middle;display: block;" class="text-center text-muted">Reports</span>
                </a>
            </div>
            <div class="col-md-3" style="text-align: center">
                <a href="/campaigns/wizard" type="button" class="btn btn-default btn-lg">
                    <i class="fa fa-plus-square-o fa-3x" style="color: steelblue;"></i>
                    <span style="vertical-align: middle;display: block;" class="text-center text-muted">Create</span>
                </a>
            </div>
        </div>


        <hr class="shadow-line">
        <h2 class="header">Campaigns</h2>

        <div class="bs-example" data-example-id="striped-table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $this->load->view('commons/footer'); ?>