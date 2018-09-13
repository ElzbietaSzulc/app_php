<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="pl"> 
</head>
<BODY>
   <center><BR />
   <B> Notebook of visits </B>
   <BR /><BR />
   <?php

   $names = $_POST['names'];
   
   if (isset($_POST['status'])) $groups = $_POST['status'];
   
   if (empty($groups))
   {
      echo 'You did not choose any group<br /><a href="index.html"> Back </a>
   </center>';
      return;
   }

   echo 'Hello: '.$names.' !<br />';
   echo 'Notebook of visits below : <br /><br />';
   echo 'You choosed group : ';
   
   foreach ($groups as $value) 
   {
       echo $value. ", ";
   }
   unset($value);
   
   echo '<table border="1" width="500">';

   $plik = fopen("Zeszyt1.csv","r");
   $row = 1;
   echo "<tr><td>ID</td><td>STATUS</td><td>VISIT_ID</td><td>PHONE_NR</td><td>DATE</td><td>DOCTOR_ID</td></tr>";
   while(($data = fgetcsv($plik, 1000,";")) !== False)
   {
     $data[0] = str_replace("\xef\xbb\xbf", '', $data[0]);
	 
     if (in_array($data[0], $groups))
     {
        echo "<tr><td>$row</td><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td></tr>";
        $row++;
     } 
   }
      
   fclose($plik);

   echo '</center></td></tr></table>';
   ?>
   </table>
   <br />
   <a href="index.html"> Back </a>
   </center>
</BODY>
</html>