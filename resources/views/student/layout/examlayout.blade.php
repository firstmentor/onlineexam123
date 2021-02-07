<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/exam.css" rel="stylesheet">
    @yield('style')
</head>
<body onload="noback();" onpageshow="if (event.persisted) noBack();">
    <nav class="navbar navbar-dark bg-light fixed-top d-flex alert">
        <a class="navbar-brand" href="#">
        <img src="../images/colorlogo.png" >

        </a>
    </nav>
    <?php

 $class = '';

 if(!isset($right_bar))

 	$class = 'no-right-sidebar';

$block_class = '';

if(isset($block_navigation))

	$block_class = 'non-clickable';

 ?>

    <div id="wrapper" class="{{$class}}">
        @yield('content')
    </div>
    <footer class="main-footer text-center">
        <strong>Copyright © 2020 <a href="#"> | PN INFOSYS IT COMPANY IN GWALIOR ! </a>.</strong>
        All rights reserved.

    </footer>
    <script src="../backend/plugins/jquery/jquery.min.js"></script>
    <script src="../backend/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    @yield('question_script');
    <script>
        window.history.forward();
        function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
        $(document).on("keydown", disableF5);


        function noBack() {
            window.history.forward();
        }

        function checkKeyCode(evt) {

            var evt = (evt) ? evt : ((evt) ? evt : null);
            console.log(evt.keyCode);
            var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
            if (
                evt.keyCode == 123 //F12
                ||
                evt.keyCode == 116 ||
                evt.keyCode == 82 || evt.keyCode == 9 || evt.keyCode == 18 || evt.keyCode == 17 ||
                evt.keyCode == 44 //PRNT SCR
            ) {
                evt.keyCode = 0;
                return false
            } else if (evt.keyCode == 8) {
                evt.keyCode = 0;
                return false
            }

        }
        document.onkeydown = checkKeyCode;

    </script>


    <SCRIPT TYPE="text/javascript">
        var message = "Sorry, right-click has been disabled";

        function clickIE() {
            if (document.all) {
                (message);
                return false;
            }
        }

        function clickNS(e) {
            if (document.layers || (document.getElementById && !document.all)) {
                if (e.which == 2 || e.which == 3) {
                    (message);
                    return false;
                }
            }
        }
        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = clickNS;
        } else {
            document.onmouseup = clickNS;
            document.oncontextmenu = clickIE;
        }
        document.oncontextmenu = new Function("return false")

    </SCRIPT>

    <SCRIPT TYPE="text/javascript">
        function disableselect(e) {
            return false
        }

        function reEnable() {
            return true
        }
        //if IE4+
        document.onselectstart = new Function("return false")
        //if NS6
        if (window.sidebar) {
            document.onmousedown = disableselect
            document.onclick = reEnable
        }

    </SCRIPT>
</body>
</html>
