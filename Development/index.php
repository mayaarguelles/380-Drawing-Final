<!DOCTYPE html>
<html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet">
        <?php
        $myfile = fopen("submit/messages.txt", "r") or die("Unable to open file!");
        $count = 0;
        $maxMessages = 100000;
        $t=time();
        ?>
    </head>
    <body>
        <div class="accents">
            <img src="img/accents/1.gif">
            <img src="img/accents/1.gif">
            <img src="img/accents/1.gif">
            <img src="img/accents/12%20copy.gif">
            <img src="img/accents/12-2.gif">
            <img src="img/accents/12.gif">
            <img src="img/accents/18.gif">
            <img src="img/accents/2.gif">
            <img src="img/accents/28.gif">
            <img src="img/accents/3d_underconstruction01_darkbg.gif">
            <img src="img/accents/6.gif">
            <img src="img/accents/72.gif">
            <img src="img/accents/8.gif">
            <img src="img/accents/8d577004-e68e-41d0-ba57-c58397137c81.gif">
            <img src="img/accents/angel_0008.gif">
            <img src="img/accents/angelstaranimmirror.gif">
            <img src="img/accents/anivalangel.gif">
            <img src="img/accents/antimoron.gif">
            <img src="img/accents/candlerose.gif">
            <img src="img/accents/construction-1.gif">
            <img src="img/accents/construction-3.gif">
            <img src="img/accents/construction.gif">
            <img src="img/accents/dovec.gif">
            <img src="img/accents/ICON-CONSTRUCTION.gif">
            <img src="img/accents/Images_3d_email.gif">
            <img src="img/accents/kanim.gif">
            <img src="img/accents/nbirdr.gif">
            <img src="img/accents/new3d.gif">
            <img src="img/accents/sp.gif">
            <img src="img/accents/under_construction.gif">
            <img src="img/accents/Under_Construction_neon_sign_prv.gif">
        </div>
        <div class="gui98-window">
            <div class="titleBar">
                <div class="title">
                    <img src="img/chat_icon.png" alt="window icon">
                    <h3>Chat</h3>
                </div>
                <div class="buttons">
                    <button class="min">Minimize</button>
                    <button class="max">Maximize</button>
                    <button class="close">Close</button>
                </div>
            </div>
            <div class="toolBar">
                <ul>
                    <li>
                        <span>F</span>ile
                        <ul>
                            <li>
                                Save
                            </li>
                            <li>
                                Save as...
                            </li>
                            <li>
                                Close
                            </li>
                            <hr>
                            <li>
                                Print
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>E</span>dit
                        <ul>
                            <li>
                                Save
                            </li>
                            <li>
                                Save as...
                            </li>
                            <li>
                                Close
                            </li>
                            <hr>
                            <li>
                                Print
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>V</span>iew
                        <ul>
                            <li>
                                Save
                            </li>
                            <li>
                                Save as...
                            </li>
                            <li>
                                Close
                            </li>
                            <hr>
                            <li>
                                Print
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>G</span>o
                    </li>
                    <li>
                        F<span>a</span>vorites
                    </li>
                    <li>
                        <span>H</span>elp
                    </li>
                </ul>
            </div>
            <div class="content chat">
                <div class="tabs">
                    <div class="tab">
                        <h4>Chat</h4>
                    </div>
                    <div class="spacer">
                    </div>
                </div>
                <div class="interface">
                    <div class="chatroom">
                        <div class="room">
                            <ul id="themessages">
                                <li class="message" id="msgTarget">
                                    <ol>
                                        <li class="date">
                                            <?php echo date("m/d/Y",$t); ?>
                                        </li>
                                        <li class="time">
                                            <?php echo date("g:i A", $t); ?>
                                        </li>
                                        <li class="name you">
                                            you:
                                        </li>
                                        <li class="msgBody">
                                            
                                        </li>
                                    </ol>
                                </li>
                                <?php 
                                while (($line = fgets($myfile)) && $count < $maxMessages) {
                                    $fields = explode('**NEXT**', $line);
                                    $count++;
                                    ?>
                                <li class="message">
                                    <ol>
                                        <li class="date">
                                        <?php echo $fields[0]; ?>
                                        </li>
                                        <li class="time">
                                            <?php echo $fields[1]; ?>
                                        </li>
                                        <li class="name">
                                            <?php echo $fields[2]; ?>:
                                        </li>
                                        <li class="msgBody">
                                            <?php echo $fields[3]; ?>
                                        </li>
                                    </ol>
                                </li>
                                <?php } ?>
                                <li>You have entered room 1124.</li>
                            </ul>

                        </div>
                        <div class="people">
                            <h6>You are alone.</h6>
                            <ul>
                                <li>You</li>
                            </ul>
                        </div>
                    </div>
                    <form method="post" action="submit/index.php" id="messageForm">
                        <fieldset>
                            <input type="text" placeholder="name" name="name" id="name">
                            <textarea type="text" placeholder="message" name="msg" id="msg"></textarea>
                        </fieldset>
                        
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="player">
            <audio id="flowersmp3" autoplay="autoplay">
                <source src="mp3/Flowers.mp3" type="audio/mpeg">
                Your browser does not support embebdded audio.
            </audio>
            <div class="pause off"></div>
            <div class="stop off"></div>
            <div class="play"></div>
        </div>
        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/index.js"></script>
        <script src="js/functions.js"></script>
        
        <?php 
        fclose($myfile);
        ?>
    </body>
</html>