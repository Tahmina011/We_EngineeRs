
<html>
<head>
    <title>Digital Clock using JavaScript</title>
    <link href="http://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet" type="text/css"/>

    <style>
        .tabBlock
        {
            background-color:#57574f;
            border:solid 0px #FFA54F;
            border-radius:2px; -moz-border-radius:2px; -webkit-border-radius:2px;
            max-width:140px;
            width:100%;
            overflow:hidden;
            display:block;
        }
        .clock
        {
            vertical-align:middle;
            font-family:Orbitron;
            font-size:20px;
            font-weight:normal;
            color:#FFF;
            padding:0 20px;
        }
        .clocklg 
        {
            vertical-align:middle; 
            font-family:Orbitron;
            font-size:10px;
            font-weight:normal;
            color:#FFF;
        }
    </style>
</head>

<!-- ON LOAD OF THE PAGE, THE CLOCK WILL START TICKING. -->
<body onload="digitized();">
    <div style="background-color:#F3F3F3;
        max-width:150px;width:100%;margin:0 auto;padding:10px;float: left">

        <table class="tabBlock" align="center" cellspacing="0" cellpadding="0" border="0">
            <tr><td class="clock" id="dc"></td>  <!-- THE DIGITAL CLOCK. -->
                <td>
                    <table cellpadding="0" cellspacing="0" border="0">
                    
                        <!-- HOUR IN 'AM' AND 'PM'. -->
                        <tr><td class="clocklg" id="dc_hour"></td></tr>

                        <!-- SHOWING SECONDS. -->
                        <tr><td class="clocklg" id="dc_second"></td></tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
<script>
    // OUR FUNCTION WHICH IS EXECUTED ON LOAD OF THE PAGE.
    function digitized() {
        var dt = new Date();    // DATE() CONSTRUCTOR FOR CURRENT SYSTEM DATE AND TIME.
        var hrs = dt.getHours();
        var min = dt.getMinutes();
        var sec = dt.getSeconds();

        min = Ticking(min);
        sec = Ticking(sec);

        document.getElementById('dc').innerHTML = hrs + ":" + min;
        document.getElementById('dc_second').innerHTML = sec;

        if (hrs > 12) { 
            document.getElementById('dc_hour').innerHTML = 'PM'; 
        }
        else { 
            document.getElementById('dc_hour').innerHTML = 'AM'; 
        }

        // CALL THE FUNCTION EVERY 1 SECOND (RECURSION).
        var time
        time = setInterval('digitized()', 1000);
    }

    function Ticking(ticVal) {
        if (ticVal < 10) {
            ticVal = "0" + ticVal;
        }
        return ticVal;
    }
</script>
</html>