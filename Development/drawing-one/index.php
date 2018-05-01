<!DOCTYPE html>
<html>
    <head>
        <title>Drawing One - Draft</title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <?php
        $myfile = fopen("../submit/messages.txt", "r") or die("Unable to open file!");
        $count = 0;
        $maxMessages = 100000;
        ?>
    </head>
    <body>
        <img src="img/test.jpeg">
        <video autoplay></video>
        <canvas depth="2.5" style="background: #0e4632; background-image: url('../img/bg.gif')"></canvas>
        <canvas depth="1.5"></canvas>
        <canvas depth="1"></canvas>
        <canvas depth="0.5"></canvas>
        <a href="../">back</a>
        <div class="messages" style="display: none;">
            <?php 
            while (($line = fgets($myfile)) && $count < $maxMessages) {
                $fields = explode('**NEXT**', $line);
                $count++;
                ?>
                    <?php echo (str_replace(PHP_EOL, '', $fields[2])); ?>
                    <?php echo str_replace(PHP_EOL, '', $fields[3]); ?>
            <?php } ?>
        </div>
        <script src="js/webcam.js"></script>
        <script src="js/canvas.js"></script>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <!--<script src="js/depth.js"></script>-->
    </body>
</html>