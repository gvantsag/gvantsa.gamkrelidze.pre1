<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file</title>
</head>
<body>
    
     
<?php

function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';
     }


// scandir()
// opendir() and readir()



// scandir()


$local_dir = 'C:\Users\557-198850\Desktop\presentation';
// scandir (string $directory) : array
// returns an array of files and directories from the directory.
$files = scandir($local_dir);
//pre_r($files);

// array_diff (array $array1 , array $array2) : array
// compares array1 against one or more other arrays and returns
// the values in array1 that are not present in any of the other arrays
$files = array_diff($files,array('.','..'));
//pre_r($files);

//returns all the values from the array and indexes the array numberically.
$files = array_values($files);
//pre_r($files);


$files = array();

//alternative one liner:
$files = array_values(array_diff(scandir($local_dir), array('.','..')));
//pre_r($files);


$files = array();

$files = clean_scandir($local_dir);
pre_r($files);

function clean_scandir($dir){
     return array_values(array_diff(scandir($dir), array('.','..')));

}


// opendir() and readir()
$files = array();
//opendir (string $path) : resource
//readdir([resource $dir_handle]) ; string
 if ($handle = opendir($local_dir)); {
     while ( false !== ($file = readdir($handle))) {
         if ($file !== '.' && $file != '..') {
             $files[] = $file;
        }
         //echo $file. '<br />';
  
     }

     //closedir ([resource $dir_handle]) : void
     //close directory stream
     closedir($handle);
   

 }
 //pre_r($files);

 function clean_readdir($dir) {
    $files = array();
    //opendir (string $path) : resource
    //readdir([resource $dir_handle]) ; string
     if ($handle = opendir($dir)); {
         while ( false !== ($file = readdir($handle))) {
             if ($file !== '.' && $file != '..') {
                 $files[] = $file;
            }
             
      
         }
    
         //closedir ([resource $dir_handle]) : void
         //close directory stream
         closedir($handle);

    }
    return $files;

 }
 pre_r(clean_readdir($local_dir));

 


























?>


</body>
</html>