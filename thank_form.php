<!DOCTYPE html>
<html>
<head>
    <title>Judge Carolyn Ellsworth - District Court Dept. 5</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/foundation.css">
</head>
<body>
<div class="main">
<!-- Nav Bar -->
    <div class="row">
        <div class="large-12 columns">
            <img src="img/carolyn_header.jpg" align="center" name="top" /><br/><br/>
        </div>
    </div>
<!-- End Nav -->
 
<!-- Main Page Content and Sidebar -->
    <div class="row">
      
    <!-- Sidebar -->
        <aside class="large-3 columns">
            <ul class="side-nav">
                <li><a href="index.html">Welcome</a></li>
                <li><a href="experience.html">Experience</a></li>
                <li><a href="bio.html">Bio</a></li>
                <li><a href="endorsements.html">Endorsements</a></li>
                <li><a href="volunteer.html">Volunteer</a></li>
                <li><a href="contributions.html">Contributions</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
 
            <div class="panel">
                <a href="https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=QIWtRpce9TM2w-uiwiSf2Cb8IvTJb6kr3R03bwOTgE0Z_unCkJUE8s5ZwiK&dispatch=5885d80a13c0db1f8e263663d3faee8d6cdb53fcfca2b5941339e576d7e42259">
                    <img src="img/paypal.png" />
                </a>
            </div>
        </aside>
    <!-- End Sidebar -->
      
    <!-- Main Content -->
        <div class="large-9 columns" role="content">
            <div class="row">
                <div class="large-12 columns">
                	<?php
                    $qsMsg = $_GET["msg"];
                    if($qsMsg=="success"){
                    	echo "<p>Thank you for your time, we will contact you as soon as possible.</p>";
                    }else{
                    	echo "<p>There was a problem sending you message. Please try again at a later time.</p>";
                    }
                    if(strtolower($_GET["debug"]) == "t"){
                    	echo $qsMsg;
                    }
                    ?>
                </div>
            </div>
        </div>
    <!-- End Main Content -->
    </div>
<!-- End Main Content and Sidebar -->

<!-- Footer -->
    <footer class="row">
        <div class="large-12 columns">
        <hr /><br />
            <div class="row">
                <div class="large-12 columns" align="center">
                    <strong>Paid for by the Committee to Re-elect Judge Carolyn Ellsworth</strong><br /><br />
                    <p>P.O. Drawer 2070,<br />
                    Las Vegas, NV 89125-2070</p>
                </div>
            </div>
            <div class="row">
                <div class="large-6 columns">
                </div>
                <div class="large-6 columns">
                    <ul class="inline-list right">
                        <li><a href="#top">Back to Top</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
