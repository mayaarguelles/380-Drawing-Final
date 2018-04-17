<!DOCTYPE html>
<html>
    <head>
        <?php 
            $msg = $_POST['msg'];
            $name = $_POST['name'];
            if (empty($name)) {
                $nums = rand(0,9999);
                $nums_string = str_pad($nums, 6, '0', STR_PAD_LEFT);
                $name = "guest_" . $nums_string;
            }
            $msg = $msg . PHP_EOL;
            $t=time();
        
            $file = "messages.txt";
            $oldContents = file_get_contents($file);
            $fr = fopen($file, "w+") or die("Unable to open file!");
            fwrite($fr, date("m/d/Y",$t));
            fwrite($fr, "**NEXT**");
            fwrite($fr, date("g:i A", $t));
            fwrite($fr, "**NEXT**");
            fwrite($fr, $name);
            fwrite($fr, "**NEXT**");
            fwrite($fr, $msg);
            fwrite($fr, $oldContents);
            fclose();

        ?>
    </head>
    <body>
        <?php echo date("d/m/Y",$t) ?>
        <?php echo $msg ?>
    </body>
</html>