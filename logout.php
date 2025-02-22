<?php
  include("./php/connection.php");
  session_start();

  if(session_unset()==true){
    header('location:index.php');
  }
  else{
    
  }
?>