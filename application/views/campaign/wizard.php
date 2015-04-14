<?php
/**
 * Created by PhpStorm.
 * User: kbsoft
 * Date: 1/14/15
 * Time: 7:21 AM
 */ ?>
    <style>

        /*=============================================
    [ Page Setup ]
    ==============================================*/
        /*body{background:#34495e}*/
        #pageWrap {
            width: 100%;
            overflow: hidden;
        }

        #rocket {
            display: block;
            /*margin: 0 auto;*/
            /*margin-top: 150px;*/
        }

        /*=============================================
        [ Inactive State Styles ]
        ==============================================*/

        .rocket_inner {
            transform: translateY(15px) translateX(-3px);
            -webkit-transition: .3s;
            -moz-transition: .3s;
            transition: .3s;
        }

        .icon_circle {
            transition: .2s;
            fill: #22303e;
        }

        .large_window_path {
            transition: .2s;
            fill: #22303e;
        }

        .small_window_path {
            fill: #22303e;
        }

        .wing_shadow {
            fill: #34495e;
        }

        .rocket_bottom {
            fill: #34495e
        }

        .rocket_base {
            fill: #34495e
        }

        .rocket_shadow {
            fill: #34495e
        }

        .window_grandient {
            stop-color: #2DCB73
        }

        .window_grandient1 {
            stop-color: #2AC16D
        }

        .window_grandient2 {
            stop-color: #29B968
        }

        .window_grandient3 {
            stop-color: #28B767
        }

        .wing_base {
            fill: #34495e
        }

        .fire_path {
            fill: #FC0
        }

        /*=============================================
        [ Hover Styles ]
        ==============================================*/
        .rocket_wrap:hover .rocket_base {
            fill: #FFFFFF !important;
            stroke-width: 0px !important;
        }

        .rocket_wrap:hover .rocket_shadow {
            fill: #EDEDED !important;
            stroke-width: 0px !important;
        }

        .rocket_wrap:hover .icon_circle {
            fill: #282e3a !important;
            stroke: #fff !important;
            stroke-width: 7px !important;
        }

        .rocket_wrap:hover .small_window_path {
            fill: #28B767 !important;
            stroke-width: 0px !important;
        }

        .rocket_wrap:hover .wing_shadow {
            display: block !important;
            fill: #FC9252 !important;
        }

        .rocket_wrap:hover .wing_base {
            fill: #E16E36 !important;
            stroke-width: 0px !important;
        }

        .rocket_wrap:hover .rocket_bottom {
            fill: #2DCB73 !important;
            stroke-width: 0px !important;
        }

        .rocket_wrap:hover .large_window_path {
            fill: url(#SVGID_2_) !important;
            stroke-width: 0px !important;
        }

        .rocket_wrap:hover .rocket_inner {
            transform: translateY(0px) translateX(-3px) !important;
        }

        /*=============================================
        [ Animation Classes ]
        ==============================================*/
        .fire {
            display: none;
            animation-delay: 0s;
            fill-opacity: 1;
            animation-timing-function: ease-in;
            stroke-width: 0px;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            transform-origin: 50% 50%;
            animation-direction: normal;
        }

        .rocket_wrap:hover #fireLeft {
            display: block;
            animation-delay: 0s;
            animation-name: fireLeft, fillOpacity1;
            animation-duration: 1.2s;
        }

        .rocket_wrap:hover #fireMiddle {
            display: block;
            animation-delay: 0s;
            animation-name: fireMiddle, fillOpacity1;
            animation-duration: 1s;
        }

        .rocket_wrap:hover #fireRight {
            display: block;
            animation-delay: 0s;
            animation-name: fireRight, fillOpacity1;
            animation-duration: 1.3s;
        }

        .rocket_wrap:hover #fireSmallLeft {
            display: block;
            animation-delay: 0s;
            animation-name: fireSmall, fillOpacity2;
            animation-duration: 1.3s;
            transform-origin: bottom;
        }

        .rocket_wrap:hover #fireSmallRight {
            display: block;
            animation-delay: 0.3s;
            animation-name: fireSmall, fillOpacity3;
            animation-duration: 1.6s;
            transform-origin: bottom;
        }

        /*=============================================
        [ KeyFrame Animations ]
        ==============================================*/
        @keyframes fireSmall {
            10% {
                transform: rotate(17deg) translateY(1px)
            }
            20% {
                transform: rotate(-13deg) translateY(2px)
            }
            30% {
                transform: rotate(21deg) translateY(3px)
            }
            40% {
                transform: rotate(-34deg) translateY(4px)
            }
            50% {
                transform: rotate(24deg) translateY(5px)
            }
            60% {
                transform: rotate(-17deg) translateY(6px)
            }
            70% {
                transform: rotate(31deg) translateY(7px)
            }
            80% {
                transform: rotate(-28deg) translateY(8px)
            }
            90% {
                transform: rotate(14deg) translateY(9px)
            }
            99% {
                transform: rotate(0deg) translateY(10px)
            }
        }

        @keyframes fireLeft {
            6% {
                transform: rotate(25deg)
            }
            15% {
                transform: rotate(-19deg)
            }
            25% {
                transform: rotate(25deg)
            }
            32% {
                transform: rotate(-30deg)
            }
            46% {
                transform: rotate(22deg)
            }
            54% {
                transform: rotate(-29deg)
            }
            61% {
                transform: rotate(32deg)
            }
            74% {
                transform: rotate(-9deg)
            }
            83% {
                transform: rotate(16deg)
            }
            99% {
                transform: rotate(0deg)
            }
        }

        @keyframes fireMiddle {
            10% {
                transform: rotate(25deg)
            }
            20% {
                transform: rotate(-25deg)
            }
            30% {
                transform: rotate(30deg)
            }
            40% {
                transform: rotate(-22deg)
            }
            50% {
                transform: rotate(29deg)
            }
            60% {
                transform: rotate(-45deg)
            }
            70% {
                transform: rotate(37deg)
            }
            80% {
                transform: rotate(-15deg)
            }
            90% {
                transform: rotate(16deg)
            }
            99% {
                transform: rotate(0deg)
            }
        }

        @keyframes fireRight {
            15% {
                transform: rotate(17deg)
            }
            23% {
                transform: rotate(-13deg)
            }
            37% {
                transform: rotate(21deg)
            }
            45% {
                transform: rotate(-34deg)
            }
            54% {
                transform: rotate(24deg)
            }
            67% {
                transform: rotate(-17deg)
            }
            72% {
                transform: rotate(31deg)
            }
            84% {
                transform: rotate(-28deg)
            }
            96% {
                transform: rotate(14deg)
            }
            99% {
                transform: rotate(0deg)
            }
        }

        @keyframes fillOpacity1 {
            0% {
                fill-opacity: 1;
                stroke-opacity: 1;
            }
            50% {
                fill-opacity: 1;
                stroke-opacity: 1;
            }
            100% {
                fill-opacity: 0;
                stroke-opacity: 0;
            }
        }

        @keyframes fillOpacity2 {
            0% {
                fill-opacity: 1;
                stroke-opacity: 1;
            }
            25% {
                fill-opacity: 1;
                stroke-opacity: 1;
            }
            100% {
                fill-opacity: 0;
                stroke-opacity: 0;
            }
        }

        @keyframes fillOpacity3 {
            0% {
                fill-opacity: 1;
                stroke-opacity: 1;
            }
            67% {
                fill-opacity: 1;
                stroke-opacity: 1;
            }
            100% {
                fill-opacity: 0;
                stroke-opacity: 0;
            }
        }

        @keyframes rocektMove {
            0% {
                transform: translateY(0px)
            }
            100% {
                transform: translateY(20px)
            }
        }


    </style>

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
                    <li data-step="3"><span class="badge">3</span>Message<span class="chevron"></span></li>
                    <li data-step="4"><span class="badge">4</span>Launch<span class="chevron"></span></li>
                </ul>
                <div class="actions">
                    <button class="btn btn-default btn-prev"><span class="glyphicon glyphicon-arrow-left"></span>Prev
                    </button>
                    <button class="btn btn-default btn-next" data-last="Complete">Next<span
                            class="glyphicon glyphicon-arrow-right"></span></button>
                </div>
                <div class="step-content">
                    <div class="step-pane active sample-pane alert" data-step="1">
                        <h4>Setup SMS Campaign </h4>

                        <p class="text-justify" style="text-shadow: 0em 0.1em 0.03em #C6ECED;">Welcome to SMS campaign
                            wizard.In this wizard, you will guide through creating and launching a SMS wizard to a
                            selected list of people.
                            In the next step,you can select the list of people where you would like to launch a
                            campaign, After that you will get a text area to write the campaign message which you want
                            to send out,
                            and finally you can send a test message to your own number and , after confirming the
                            campaign details, It is a click away from launching your SMS campaign to your desired list.

                        </p>
                        <br/>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="campaign_name" class="col-sm-4 control-label">Name your campaign</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="campaign_name"
                                           placeholder="New Year Wish">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="step-pane sample-pane" data-step="2">
                        <h4>Select a List</h4>

                        <p>Select a list , which you want to launch SMS campaign.</p>

                        <div class="panel panel-default">

                            <!-- Table -->
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>People count</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class='clickable-row' data-href="/campaigns/get_list/<?= '1' ?>">
                                    <th scope="row">1</th>
                                    <td>All Customers</td>
                                    <td><?= $customers_count ?></td>
                                    <td>
                                        <input type="radio" name="year" value="1"/>
                                    </td>
                                    <?= "hello world"; ?>
                                </tr>
                                <tr class='clickable-row' data-href="/campaigns/get_list/<?= '2' ?>">
                                    <th scope="row">2</th>
                                    <td>Internal Users</td>
                                    <td><?= $users_count ?></td>
                                    <td>
                                        <input type="radio" name="year" value="2"/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="step-pane sample-pane" data-step="3">
                        <h4>Write campaign message</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <p>Create the message which you want to send.You can use the available tags to replace
                                    the values with individual person attributes.</p>

                                <h5 class="text-muted">Example</h5>

                                <div class="well well-sm"><br/>
                                    Hello <code>Mr. Ruwanka</code> <br/>
                                    Thank you for using our SMS service gateway with <code>ABC Organization</code> CRM
                                    system,<br/>
                                    Have a nice day.<br/>
                                    Thank you.
                                </div>

                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item"><code>%NAME%</code> <span class="text-info"
                                                                                          style="float: right"> Replace with the person's name with title </span>
                                    </li>
                                    <li class="list-group-item"><code>%ORG%</code> <span class="text-info"
                                                                                         style="float: right"> Replace with the person's Organization(If any) </span>
                                    </li>
                                    <li class="list-group-item"><code>%POSITION%</code> <span class="text-info"
                                                                                              style="float: right"> Replace with the person's position </span>
                                    </li>
                                    <li class="list-group-item"><code>%TOT_JOB%</code> <span class="text-info"
                                                                                             style="float: right"> Replace with the person's total jobs count </span>
                                    </li>
                                    <li class="list-group-item"><code>%CURRENT_DATE%</code> <span class="text-info"
                                                                                                  style="float: right"> Replace with the current date and time in DD-MM-YYY : HH:MM format</span>
                                    </li>
                                </ul>

                            </div>

                        </div>

                        <textarea class="form-control" rows="10" placeholder="Enter text here.."></textarea>


                    </div>


                    <div class="step-pane sample-pane" data-step="4">

                        <div class="row">
                            <div class="col-md-4">
                                <div id="pageWrap">
                                    <svg style="cursor: pointer;" version="1.1" x="0px" y="0px" width="307px"
                                         height="283px" id="rocket">

                                        <g class="rocket_wrap">

                                            <circle cx="147.5" cy="138.6" r="105.5" class="icon_circle"/>

                                            <g class="rocket_inner">

                                                <path class="fire fire_path" id="fireMiddle"
                                                      d="M148.891,179.906c3.928,0,7.111,3.176,7.111,7.094 c0,7.78-7.111,16-7.111,16s-7.111-8.349-7.111-16C141.78,183.082,144.963,179.906,148.891,179.906z"/>


                                                <path class="fire_path fire" id="fireRight"
                                                      d="M154.063,181.092c3.577-1.624,7.788-0.048,9.408,3.52 c3.216,7.084,0.139,17.508,0.139,17.508s-9.927-4.662-13.09-11.63C148.9,186.923,150.487,182.715,154.063,181.092z"/>


                                                <path class="fire_path fire" id="fireLeft"
                                                      d="M143.392,182.519c3.25,2.207,4.098,6.623,1.896,9.864 c-4.372,6.436-14.873,9.238-14.873,9.238s-1.191-10.902,3.108-17.23C135.725,181.149,140.143,180.312,143.392,182.519z"/>


                                                <path class="fire_path fire" id="fireSmallLeft"
                                                      d="M143.193 187.531c2.226 0.4 3.7 2.6 3.2 4.8 c-0.875 4.407-5.829 8.264-5.829 8.264s-3.09-5.53-2.229-9.865C138.807 188.5 141 187.1 143.2 187.531z"/>


                                                <path class="fire_path fire" id="fireSmallRight"
                                                      d="M152.089 188.599c2.043-0.985 4.496-0.132 5.5 1.9 c1.952 4 0.3 10.1 0.3 10.107s-5.795-2.56-7.713-6.541C149.186 192 150 189.6 152.1 188.599z"/>


                                                <path class="rocket_bottom"
                                                      d="M157.069 171.31h-3.292c-1.562-0.048-3.178-0.076-4.846-0.076 s-3.284 0.028-4.846 0.076h-3.292c-7.277-7.938-12.371-26.182-12.371-47.434c0-28.54 9.182-51.676 20.508-51.676 c11.327 0 20.5 23.1 20.5 51.676C169.44 145.1 164.3 163.4 157.1 171.31z"/>

                                                <g id="right_wing_wrap">
                                                    <path class="wing_base"
                                                          d="M166.678 127.161c0 0 17.7 3.3 12.9 48.099l-18.06-14.05 L166.678 127.161z"/>
                                                    <path class="wing_shadow"
                                                          d="M158.225 140.336c10.481-5.584 22.7 22.2 21.4 34.9 l-18.06-14.05C161.542 161.2 156.1 144.3 158.2 140.336z"/>
                                                </g>

                                                <g id="left_wing_wrap">
                                                    <path class="wing_base"
                                                          d="M135.131 161.21l-18.06 14.1 c-4.805-44.793 12.924-48.099 12.924-48.099L135.131 161.21z"/>
                                                    <path class="wing_shadow"
                                                          d="M135.131 161.21l-18.06 14.1 c-1.367-12.746 10.896-40.509 21.377-34.924C140.614 144.3 135.1 161.2 135.1 161.21z"/>
                                                </g>

                                                <g id="rocket_body_wrap">
                                                    <path class="rocket_base"
                                                          d="M162.728 167.358c-3.778-0.623-8.573-0.996-13.796-0.996 s-10.018 0.373-13.795 0.996c-5.033-10.186-8.257-25.808-8.257-43.338c0-30.688 9.873-55.566 22.052-55.566 s22.053 24.9 22.1 55.566C170.984 141.6 167.8 157.2 162.7 167.358z"/>
                                                    <path class="rocket_shadow"
                                                          d="M145.464 166.417c19.578-40.575 7.26-85.229 4.112-98.067 c11.88 0.9 21.4 25.4 21.4 55.525c0 17.529-3.225 33.152-8.257 43.337c0 0-3.786-0.472-8.069-0.697 S145.464 166.4 145.5 166.417z"/>
                                                </g>

                                                <g id="large_window_wrap">
                                                    <radialgradient id="SVGID_2_" cx="148.9" cy="112.5" r="15.2"
                                                                    fx="139.4853" fy="112.5239"
                                                                    gradientunits="userSpaceOnUse">
                                                        <stop offset="0" class="window_grandient"/>
                                                        <stop offset="0.5868" class="window_grandient"/>
                                                        <stop offset="0.6834" class="window_grandient"/>
                                                        <stop offset="0.6845" class="window_grandient1"/>
                                                        <stop offset="0.6861" class="window_grandient2"/>
                                                        <stop offset="0.6897" class="window_grandient3"/>
                                                    </radialgradient>
                                                    <circle class="large_window_path" cx="148.9" cy="111.3" r="10.5"/>
                                                </g>

                                                <circle class="small_window_path" cx="148.9" cy="132.4" r="5.2"/>

                                            </g>

                                        </g>
                                    </svg>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4 style="text-shadow: 0em 0.1em 0.03em rgba(101, 103, 103, 0.19);">
                                    Confirm your selections before launching the campaign.
                                </h4>

                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Send sample SMS
                                </button>
                                <div class="collapse" id="collapseExample">
                                    <div class="well">
                                        <input type="text" placeholder="Enter a mobile number." />
                                        <button type="button" class="btn btn-warning btn-xs">Send</button>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <!-- Put in a modal -->
                                You're about to send a campaign to:
                                {List name}
                                {Users count} subscribers

                                This is your moment of glory.
                            </div>

                        </div>


                    </div>

                </div>


            </div>
        </div>

    </div>
    <br>
    <input class="btn btn-default" id="btnWizardPrev" value="Back" type="button">
    <input class="btn btn-primary" id="btnWizardNext" value="Next" type="button">

<?php $this->load->view('commons/footer'); ?>