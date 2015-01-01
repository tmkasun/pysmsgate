<html>
<head>

</head>
<body>

<!-- markup for setup dashboard wizard content -->
<!-- TODO: use modular component loading via JQuery, same code has been used in map.jag as well -->

<div class="wizard" id="setup_dashboard" data-title="Setup Geo-Dashboard">

    <h1><i class="fa fa-cogs"></i> Setup Geo-Dashboard</h1>

    <div class="wizard-card" data-cardname="about">
        <h3>About</h3>

        <div style="word-wrap: break-word">
            <p class="text-info">
                This wizard will guide you to configure and setup Wso2 complex event processor and database systems
                to work with geo-dashboard.
            </p>
        </div>
    </div>

    <div class="wizard-card" data-cardname="CEP info">
        <h3><sup style="color: red;">*</sup>CEP info</h3>

        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label for="cep-ip" class="col-sm-2 control-label">IP address:</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cep-ip" id="cep-ip" placeholder="localhost">
                </div>
            </div>
            <div class="form-group">
                <label for="cep-port" class="col-sm-2 control-label">port:</label>

                <div class="col-sm-10">
                    <input type="number" class="form-control" name="cep-port" id="cep-port" placeholder="9443">
                </div>
            </div>
            <hr/>
            <p class="text-muted" style="font-size: small;">
                <sup style="color: red;">*</sup> Require > CEP 4.0 or CEP with websocket output adapter component.
            </p>
        </form>

    </div>

    <div class="wizard-card" data-cardname="Mysql conf">
        <h3>Mysql conf</h3>

        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label for="mysql-ip" class="col-sm-2 control-label">Server:</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mysql-ip" id="mysql-ip" placeholder="localhost">
                </div>
            </div>
            <div class="form-group">
                <label for="mysql-user" class="col-sm-2 control-label">Username:</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mysql-user" id="mysql-user" placeholder="root">
                </div>
            </div>
            <div class="form-group">
                <label for="mysql-pass" class="col-sm-2 control-label">Password:</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" name="mysql-pass" id="mysql-pass"
                           placeholder="root">
                </div>
            </div>
            <div class="form-group">
                <label for="mysql-db" class="col-sm-2 control-label">DB Name:</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mysql-db" id="mysql-db" placeholder="wso2_geo">
                </div>
            </div>
            <hr/>
            <p class="text-muted"><a href="conf/setup_dashboard/mysql-config/mysql-config.zip">Download</a> MySql
                Configuration and run <b>geo_db_setup.sh</b> with <i>sudo</i> privilages.(Get <a target="_blank"
                                                                                                 href="http://dev.mysql.com/downloads/connector/j/">JDBC
                    Driver</a> if required.)</p>
        </form>

    </div>

    <div class="wizard-card" data-cardname="CEP queries">
        <h3>CEP queries</h3>

        <div style="word-wrap: break-word">
            <p>
                <a href="conf/setup_dashboard/cep-config/config-xmls.zip">Download</a> CEP configuration files
                (<span
                    class="text-muted">eventbuilders,eventformatters,executionplans,inputeventadaptors,outputeventadaptors</span>)
                and
                copy into <br/><b><i>{path_to_cep}/repository/deployment/server/</i></b> directory.
            </p>
        </div>
        <hr/>
        <div style="word-wrap: break-word">
            <p>
                <a href="conf/setup_dashboard/cep-config/streamdefinitions.zip">Download</a> CEP stream definitions
                and
                append to <br/><b><i>{path_to_cep}/repository/conf/data-bridge/stream-definitions.xml</i></b> file.
            </p>
        </div>
    </div>


    <div class="wizard-card" data-cardname="CEP Ext's">
        <h3>CEP Extensions</h3>

        <div style="word-wrap: break-word">
            <p>
                <a href="https://github.com/wso2-gpl/siddhi/tree/master/siddhi-extensions/geo">Get (Clone)</a> a
                copy of siddhi geo extensions from github and build the necessary extensions and put <i>.jar(s)</i>>
                into
                <br/><b><i>{path_to_cep}/repository/components/lib/</i></b> directory.
            </p>
        </div>
        <hr/>

        <div style="word-wrap: break-word">
            <p>
                Add the following fully-qualified class name(s) to
                <br/><b><i>{path_to_cep}/repository/conf/siddhi/siddhi.extension</i></b> file.<br/>
                <code>
                    org.wso2.cep.geo.notify.NotifyAlert <br/>
                    org.wso2.cep.geo.functions.EventIdGenerator <br/>
                    org.wso2.cep.geo.libs.FuseEvents <br/>
                    org.wso2.cep.geo.libs.executionPlanSubscriber <br/>
                    org.wso2.cep.geo.proximity.GeoProximity <br/>
                    org.wso2.cep.geo.GeoIsWithin
                </code>
            </p>
        </div>

    </div>

    <div class="wizard-card" data-cardname="Update jaggery">
        <h3>Update jaggery</h3>
        If you get the following error when trying to login, Most probably it is cause by using outdated jaggery
        server.
        <div class="alert alert-danger" role="alert">
            HTTP Status 500 - org.mozzila,javascript.EcmaError: TypeErrorL Cannot find tenantUser in object [object
            Object].(/geo_dashboard/controllers/authentication.jag#13)
        </div>
        Copy <a href="https://github.com/wso2/jaggery-extensions/tree/master/carbon/module/scripts/server">this </a>directory
        to your local<br/><b><i>{path_to_jaggery_server}/modules/carbon/scripts/server/</i></b> directory in Jaggery
        server.
    </div>

    <!-- begin special status cards below: -->

    <div class="wizard-success">
        <div class="alert alert-success" role="alert">submission succeeded!</div>
        <button onClick="location.reload(true)" type="button" class="btn btn-info"><i class="fa fa-refresh"></i>
            Refresh
        </button>
    </div>

    <div class="wizard-error">
        <div class="alert alert-warning" role="alert">submission had an error</div>
    </div>

    <div class="wizard-failure">
        <div class="alert alert-danger" role="alert">submission failed</div>
    </div>

</div>
</body>
</html>
