<?php

// xls functions

function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}

function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}

function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}

//defining file headers

header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=list.xls");
header("Content-Transfer-Encoding: binary");

//output

xlsBOF(); // начинаем файл

xlsWriteLabel(1,0,"EMail");
xlsWriteLabel(1,1,"First Name"); // имя и фамилия на русском? 
xlsWriteLabel(1,2,"Last Name");	 // ???
//  connect to database
    $dbc = mysqli_connect('localhost', 'root', '', 'test2')
    or die('Error connecting to MySQL server.');

  $query = "SELECT * FROM email_list";
  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');
    $i = 2;
  while ($row = mysqli_fetch_array($result)){
    $to = $row['email'];
    $first_name = $row['first_name'];
    $last_name =  $row['last_name'];
  
    xlsWriteLabel($i,0,$to);
    xlsWriteLabel($i,1,$first_name = iconv("UTF-8" , "Windows-1251" , $first_name));
    xlsWriteLabel($i,2,$last_name  = iconv("UTF-8" , "Windows-1251" , $last_name));
    $i++;

  } 

  mysqli_close($dbc);

xlsEOF(); // end of file
?>
