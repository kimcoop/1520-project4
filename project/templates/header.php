<?php require_once( 'functions.php' ); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hangman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans|Source+Sans+Pro:300,900|Rock+Salt' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
  </head>
  <body>
  

  <header class="row-fluid">
    <div class="span12">
      <h1 class="text-center title">Ultimate Hangman</h1>
    </div>
  </header>

  <div class="container">
    <div id="main">
      <?php include('templates/alert.php') ?>