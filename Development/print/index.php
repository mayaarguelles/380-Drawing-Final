<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        $myfile = fopen("../submit/messages.txt", "r") or die("Unable to open file!");
        $count = 0;
        $maxMessages = 100000;
        ?>
        <h1>Messages</h1>
        <ul>
            <?php 
            while (($line = fgets($myfile)) && $count < $maxMessages) {
                $fields = explode('**NEXT**', $line);
                $count++;
                ?>
            <li>MESSAGE <?php echo $count ?>
                <ol>
                    <li>
                    <?php echo $fields[0]; ?>
                    </li>
                    <li>
                        <?php echo $fields[1]; ?>
                    </li>
                    <li>
                        <?php echo $fields[2]; ?>
                    </li>
                    <li>
                        <?php echo $fields[3]; ?>
                    </li>
                </ol>
            </li>
            <?php } ?>
        </ul>
        
        <?php 
        fclose($myfile);
        ?>
    </body>
</html>