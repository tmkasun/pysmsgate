<?php $this->load->view('commons/header'); ?>



    <style>

        ul.affix {
            position: fixed;
            top: 91px;
            left: 110px;
            width: 360px;
        }

        ul.affix-top {
            position: static;
        }

        ul.affix-bottom {
            position: absolute;
        }

        /* First level of nav */
        .sidenav {
            margin-top: 30px;
            margin-bottom: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            background-color: #f7f5fa;
            border-radius: 5px;
        }

        /* All levels of nav */
        .sidebar .nav > li > a {
            display: block;
            color: #716b7a;
            padding: 5px 20px;
        }

        .sidebar .nav > li > a:hover,
        .sidebar .nav > li > a:focus {
            text-decoration: none;
            background-color: #e5e3e9;
        }

        .sidebar .nav > .active > a,
        .sidebar .nav > .active:hover > a,
        .sidebar .nav > .active:focus > a {
            font-weight: bold;
            color: #563d7c;
            background-color: transparent;
        }

        /* Nav: second level */
        .sidebar .nav .nav {
            margin-bottom: 8px;
        }

        .sidebar .nav .nav > li > a {
            padding-top: 3px;
            padding-bottom: 3px;
            padding-left: 30px;
            font-size: 90%;
        }

        #content {
            margin-top: 30px;
        }

        #cupcake {
            /*background-image: url(cupcake%20bkgd.png);*/
            overflow: hidden;
            padding: 10px;
        }

        #veggie {
            /*background-image: url(veggie%20bkgd.png);*/
            overflow: hidden;
            padding: 10px;
        }

        #bacon {
            /*background-image: url(bacon%20bkgd.png);*/
            overflow: hidden;
            padding: 10px;
            margin-bottom: 30px;
        }

        footer {
            /*background-image: url(Lebowski%20Ipsum.jpg);*/
            height: 420px;
        }
    </style>
    <div class="container">
        <div class="row">
            <nav id="affix-nav" class="sidebar col-md-4">
                <ul class="nav sidenav" data-spy="affix" data-offset-top="10">
                    <li class="active"><a href="#documentation">Documentation</a>
                        <ul class="nav">
                            <li><a href="#wat-PySMSD">What is PySMSD</a></li>
                            <li><a href="#usage">Usage</a></li>
                            <li><a href="#source">Source</a></li>
                        </ul>
                    </li>
                    <li><a href="#sms-service">SMS Service</a>
                        <ul class="nav">
                            <li><a href="#quick-sms">Quick SMS</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <section id="content" class="col-md-8">
                <article id="documentation">
                    <h2><a href="#documentation" target="_self">Documentation</a></h2>

                    <p>PySMSD is a sms service gateway server for running a SMS gateway on your local server using USB
                        GSM modems,
                        This service allows to send bulk sms,scheduled SMS triggering and bulk customized(personalized)
                        sms.Core of the service gateway is build using of Twisted
                        which is an event-driven network programming framework written in Python and licensed under the
                        MIT License.Web interface is build using Codeigniter, which is an open source rapid development
                        web application framework, for use in building dynamic web sites with PHP.</p>
                    <section id="wat-PySMSD">
                        <h3>What is PySMSD</h3>

                        <p>
                            The project SMS service gateway server was started for proved simple in-house SMS gateway
                            solution for home or SME users ,
                            where they can keep continues communication with their users through SMS media.Like e-mail ,
                            where it is still an essential service to an organization to run their businesses that SMS
                            is an essential service to some organizations which their bussiness processes are highly
                            depend on SMS.
                            Even tho SMS are somewhat old technology , similar to e-mail , there is no 100% replacement
                            for that.
                        </p>
                    </section>
                    <section id="usage"><h3>Usage</h3>

                        <p>
                            PySMSD is simple to use, just call the required API call,PySMSD API is a RESTFul API.
                        </p>
                        <h4>Example</h4>

                        <code>
                            GET /service/ping/:api_key
                        </code>
                        <p>
                            <br/>
                            <span class="text-muted">Currently do not support secured connections over HTTPS </span>
                        </p>

                    </section>
                    <section id="source"><h3>Source</h3>

                        <p >
                            PySMSD is an opensource project and distribute under GPL2 license.
                            <br/>Sourcecode can be found on <a href="https://github.com/tmkasun/pysmsgate" target="_blank">github</a>

                        </p>
                    </section>
                </article>
                <br/>
                <article id="sms-service">
                    <h2><a href="#sms-service" target="_self">SMS Service</a></h2>

                    <p>Veggies sunt bona vobis, proinde vos postulo esse magis chard celery avocado garlic salad
                        tomatillo sweet pepper squash sierra leone bologi wakame azuki bean brussels sprout cucumber pea
                        cress swiss chard.</p>
                    <section id="quick-sms"><H3>Quick SMS</H3>

                        <p>
                            Under construction.
                        </p>
                    </section>

                </article>
                <br/>
                <article id="bacon">
                    <h2><a href="http://baconipsum.com/" target="_blank">Bacon Lorem Ipsum</a></h2>
                    Bacon ipsum dolor sit amet turkey filet mignon meatloaf short ribs pork loin short loin. Turducken
                    ribeye tail, beef ribs prosciutto sausage shankle swine beef frankfurter meatball. Shankle kielbasa
                    drumstick spare ribs swine pork chicken meatloaf doner turkey kevin pancetta tail. Corned beef pork
                    belly beef ribs venison doner.

                    Tri-tip meatball ham tongue sausage bresaola capicola t-bone andouille. Swine tri-tip boudin, beef
                    sirloin turducken prosciutto jowl fatback pancetta tail. Prosciutto andouille ball tip short loin
                    ham tenderloin venison meatloaf beef ribs meatball spare ribs tri-tip. T-bone shankle shank boudin
                    filet mignon tenderloin, beef sausage. T-bone tail pork loin, shank swine pastrami cow chicken
                    pancetta shoulder sirloin capicola ham hock. Tenderloin rump pork chop pork.

                    Prosciutto turkey andouille ball tip. Doner salami pancetta shank frankfurter t-bone pastrami
                    biltong. Turducken rump tenderloin pancetta, tri-tip strip steak frankfurter jerky. Pork loin
                    capicola rump turkey cow brisket short loin drumstick. Prosciutto meatloaf frankfurter hamburger
                    rump jowl swine salami.

                    Chuck tail brisket, shankle swine leberkas ground round tenderloin flank. Sausage pancetta drumstick
                    rump pastrami, jowl venison leberkas meatball fatback bacon filet mignon brisket ham. Meatball strip
                    steak fatback pork chop short loin beef turkey tenderloin prosciutto capicola pastrami beef ribs
                    pig. Biltong corned beef turkey salami fatback, flank frankfurter ball tip tenderloin. Tail
                    drumstick chuck boudin short loin shank fatback beef tongue shoulder prosciutto jowl. Pig ham
                    bresaola pork, leberkas meatloaf chicken fatback drumstick filet mignon jowl. Pig tail jowl cow
                    spare ribs meatball jerky, drumstick short ribs sausage ground round chicken chuck kevin.

                    Chuck strip steak corned beef, andouille bresaola pork chop kielbasa sausage turkey tongue t-bone
                    meatball. Cow pork loin sirloin kielbasa strip steak pancetta. Kielbasa capicola ribeye tenderloin
                    pork venison salami bresaola flank pork loin tri-tip rump beef. Ball tip tail venison ground round.
                    Corned beef biltong pig pork loin andouille doner leberkas drumstick pork tongue tenderloin.

                    Bacon ipsum dolor sit amet turkey filet mignon meatloaf short ribs pork loin short loin. Turducken
                    ribeye tail, beef ribs prosciutto sausage shankle swine beef frankfurter meatball. Shankle kielbasa
                    drumstick spare ribs swine pork chicken meatloaf doner turkey kevin pancetta tail. Corned beef pork
                    belly beef ribs venison doner.

                    Tri-tip meatball ham tongue sausage bresaola capicola t-bone andouille. Swine tri-tip boudin, beef
                    sirloin turducken prosciutto jowl fatback pancetta tail. Prosciutto andouille ball tip short loin
                    ham tenderloin venison meatloaf beef ribs meatball spare ribs tri-tip. T-bone shankle shank boudin
                    filet mignon tenderloin, beef sausage. T-bone tail pork loin, shank swine pastrami cow chicken
                    pancetta shoulder sirloin capicola ham hock. Tenderloin rump pork chop pork.

                    Prosciutto turkey andouille ball tip. Doner salami pancetta shank frankfurter t-bone pastrami
                    biltong. Turducken rump tenderloin pancetta, tri-tip strip steak frankfurter jerky. Pork loin
                    capicola rump turkey cow brisket short loin drumstick. Prosciutto meatloaf frankfurter hamburger
                    rump jowl swine salami.

                    Chuck tail brisket, shankle swine leberkas ground round tenderloin flank. Sausage pancetta drumstick
                    rump pastrami, jowl venison leberkas meatball fatback bacon filet mignon brisket ham. Meatball strip
                    steak fatback pork chop short loin beef turkey tenderloin prosciutto capicola pastrami beef ribs
                    pig. Biltong corned beef turkey salami fatback, flank frankfurter ball tip tenderloin. Tail
                    drumstick chuck boudin short loin shank fatback beef tongue shoulder prosciutto jowl. Pig ham
                    bresaola pork, leberkas meatloaf chicken fatback drumstick filet mignon jowl. Pig tail jowl cow
                    spare ribs meatball jerky, drumstick short ribs sausage ground round chicken chuck kevin.

                    Chuck strip steak corned beef, andouille bresaola pork chop kielbasa sausage turkey tongue t-bone
                    meatball. Cow pork loin sirloin kielbasa strip steak pancetta. Kielbasa capicola ribeye tenderloin
                    pork venison salami bresaola flank pork loin tri-tip rump beef. Ball tip tail venison ground round.
                    Corned beef biltong pig pork loin andouille doner leberkas drumstick pork tongue tenderloin.

                </article>
            </section>
        </div>
        <!-- end of row -->
    </div><!-- end of container -->

<?php $this->load->view('commons/footer'); ?>