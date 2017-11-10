<!DOCTYPE html>
<html>
<head>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111111;
}
</style>
</head>
<body>

<ul>
  <li><a href="<?php echo base_url() . 'homeC';  ?>">Home</a></li>
  <li><a href="<?php echo base_url() . 'homeC/about';  ?>">About</a></li>
  <li><a href="<?php echo base_url() . 'homeC/contact';  ?>">Contact</a></li>
  <li style="float:right; "><a href="<?php echo base_url() . 'homeC/order';  ?>">order</a></li>
  <li style="float:right; "><a href="<?php echo base_url() . 'homeC/signin';  ?>">signin</a></li>
  <li style="float:right; "><a href="<?php echo base_url() . 'homeC/signup';  ?>">signup</a></li>
</ul>

<div class="container">
