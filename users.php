<div id="header">
<?php 
    // integer starts at 0 before counting
    $i = 0; 
    $dir = 'myToken/';
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $i++;
        }
    }
    // prints out how many were in the directory
    echo "Robot Users : $i ";
?>
</div>