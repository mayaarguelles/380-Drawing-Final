<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>𝖄 𝖔 𝖚 &nbsp; 𝖆 𝖗 𝖊 &nbsp; 𝖆 𝖑 𝖔 𝖓 𝖊</title>
        <link href="css/index.css" type="text/css" rel="stylesheet">
        <?php
        $myfile = fopen("submit/messages.txt", "r") or die("Unable to open file!");
        $count = 0;
        $maxMessages = 100000;
        $t=time();
        ?>
    </head>
    <body>
        <header class="toolbar">
            <ul>
                <li><img src="img/apple.png"></li>
                <li><u>F</u>ile</li>
                <li><u>E</u>dit</li>
                <li><u>V</u>iew</li>
            </ul>
            <ul>
                <li>1:06 AM</li>
                <li><img src="img/apps.png"></li>
            </ul>
        </header>
        
        <section class="desktop">
            <a class="item" id="drive-icon">
                <img src="img/drive.png">
                <h6>Drive</h6>
            </a>
            <a href="" class="item">
                <img src="img/trash.png">
                <h6>Trash</h6>
            </a>
            <a class="item" id="folder-icon">
                <img src="img/folder.png">
                <h6>Open Me</h6>
            </a>
            <a href="" class="item" id="music-icon">
                <img src="img/music.png">
                <h6>Music</h6>
            </a>
            <a class="item" id="chat-icon">
                <img src="img/chat.png">
                <h6>Messenger</h6>
            </a>
        </section>
        
        <img src="img/alone.gif" id="alone">
        
        
        <div class="window chatinterface" id="chat">
            <div class="titleBar" id="chatbar">
                <img src="img/window-L.png">
                <spacer></spacer>
                <div class="title">
                    <h3>Messenger</h3>
                </div>
                <spacer></spacer>
                <img src="img/window-R.png">
            </div>
            <div class="content chat">
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
        
        <div class="window friends" id="friends">
            <div class="titleBar" id="friendsbar">
                <img src="img/window-L.png">
                <spacer></spacer>
                <div class="title">
                    <h3>Friends</h3>
                </div>
                <spacer></spacer>
                <img src="img/window-R.png">
            </div>
            <div class="content friends">
                <h6>0/0 online</h6>
                <div class="friendslist">
                    You have no friends.
                </div>
            </div>
        </div>
        
        <div class="window folder" id="folder">
            <div class="titleBar" id="folderbar">
                <img src="img/window-L.png">
                <spacer></spacer>
                <div class="title">
                    <h3>Open Me</h3>
                </div>
                <spacer></spacer>
                <img src="img/window-R.png">
            </div>
            <div class="details">
                <h6>3 items</h6>
                <h6>26.2 MB on disk</h6>
                <h6>224.6 MB available</h6>
            </div>
            <div class="content default folder">
                <a href="drawing-one/" class="item">
                    <img src="img/solipsism.png">
                    <h6>solipsism.exe</h6>
                </a>
                <a href="drawing-three/" class="item">
                    <img src="img/spotless.png">
                    <h6>spotlessmind.exe</h6>
                </a>
                <a href="drawing-two" class="item">
                    <img src="img/pockets.png">
                    <h6>inurpocket.exe</h6>
                </a>
            </div>
        </div>
        
        <div class="window terminal" id="terminal">
            <div class="titleBar" id="terminalbar">
                <img src="img/window-L.png">
                <spacer></spacer>
                <div class="title">
                    <h3>Drive</h3>
                </div>
                <spacer></spacer>
                <img src="img/window-R.png">
            </div>
            <div class="content terminal">
                <h6>Looks like there's</h6>
                <h6>nothing here.</h6>
            </div>
        </div>
        
        <div class="window player" id="music">
            <div class="titleBar" id="musicbar">
                <img src="img/window-L.png">
                <spacer></spacer>
                <div class="title">
                    <h3>Music</h3>
                </div>
                <spacer></spacer>
                <img src="img/window-R.png">
            </div>
            <div class="content player">
                <audio id="bg" autoplay loop>
                    <source src="audio/bg.mp3" type="audio/mpeg">
                    Your browser does not support embebdded audio.
                </audio>
                <audio id="startup" autoplay>
                    <source src="audio/startup.mp3" type="audio/mpeg">
                    Your browser does not support embebdded audio.
                </audio>
                <div class="timer">
                    <h6>0:00</h6>
                    <div class="progress">
                        <div class="progress-interior">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                    <h6>6:12</h6>
                </div>
                <div class="controls">
                    <img src="img/cd.gif">
                    <h6>
                        <em>Now playing:</em> In the Air<br>
                        <img src="img/play.png" id="play"><img src="img/pause.png" id="pause">
                    </h6>
                    <img src="img/volume.png">
                </div>
            </div>
            
            <div class="pause off"></div>
            <div class="stop off"></div>
            <div class="play"></div>
        </div>
        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/index.js"></script>
        
        <?php 
        fclose($myfile);
        ?>
    </body>
</html>