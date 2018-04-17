<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
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
        </div>
        <div class="gui98-window chatinterface">
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
        
        <div class="gui98-window folder">
            <div class="titleBar">
                <div class="title">
                    <img src="img/chat_icon.png" alt="window icon">
                    <h3>Folder</h3>
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
                                New window
                            </li>
                            <li>
                                New folder
                            </li>
                            <li>
                                Open
                            </li>
                            <li>
                                Print
                            </li>
                            <li>
                                Close
                            </li>
                            <hr>
                            <li>
                                Move to trash
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>E</span>dit
                        <ul>
                            <li>
                                Undo
                            </li>
                            <li>
                                Redo
                            </li>
                            <hr>
                            <li>
                                Cut
                            </li>
                            <li>
                                Copy
                            </li>
                            <li>
                                Paste
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
            <div class="content default folder">
                <a href="drawing-one/" class="item">
                    <img src="img/accents/drawing1-preview.png">
                    <h6>drawing-1.html</h6>
                </a>
                <a href="" class="item">
                    <img src="img/accents/candlerose.gif">
                    <h6>file.jpeg</h6>
                </a>
                <a href="" class="item">
                    <img src="img/accents/candlerose.gif">
                    <h6>file.jpeg</h6>
                </a>
                <a href="" class="item">
                    <img src="img/accents/candlerose.gif">
                    <h6>file.jpeg</h6>
                </a>
                <a href="" class="item">
                    <img src="img/accents/candlerose.gif">
                    <h6>file.jpeg</h6>
                </a>
                <a href="" class="item">
                    <img src="img/accents/candlerose.gif">
                    <h6>file.jpeg</h6>
                </a>
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