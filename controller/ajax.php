<?php

if( $_SESSION['user'] != null ) {

  if (isset($_GET['page']) ){

    include 'modele/app/' . $_GET['page'];

  }

}else
    print " Vous n'êtes plus en ligne. ";