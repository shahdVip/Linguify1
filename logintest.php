<?php

if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin']) ){

  $email=$_POST['emailLogin'];
  $password=$_POST['passwordLogin'];

  try{

    $db = new mysqli('localhost', 'root','','Linguify');
    $querystr="select * from users ";
    $res=$db->query($querystr);
    for($i=0; $i<$res->num_rows;$i++){

      $row=$res->fetch_assoc();
      echo$row['email'].'       '.$row['password'];


    }
    $db->close();


  }catch(Exception $e){}

}
