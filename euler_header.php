<!DOCTYPE html> 
<html> 
    <head>
        <?php
            echo("<title>$title</title>");

            function microtime_float()
            {
                list($usec, $sec) = explode(" ", microtime());
                return ((float)$usec + (float)$sec);
            }

            $time_start = microtime_float();
        ?>
    </head>
    <body>
        <?php
             echo $title;
             echo "<br />";
        ?>
