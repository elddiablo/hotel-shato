<!DOCTYPE html>
<html>
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117096983-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117096983-1');
</script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Отель "Шато" - Лучшие номера | Дешево</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <!-- <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> -->
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 
  
  <!-- Global site tag (gtag.js) - Google AdWords: 809184602 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-809184602"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-809184602');
</script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fbf2e2;">
    <div class="container">
  <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo site_url();?>assets/images/shato-logo.svg"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item text-center">
           <a class="nav-link" href="<?php echo base_url(); ?>">Главная <span class="sr-only">(current)</span></a>
        <div class="li-shell">
        </div>
      </li>
      <li class="nav-item text-center">
          <a class="nav-link" href="<?php echo base_url(); ?>about">О нас</a>
        <div class="li-shell">
        </div>
      </li>
      <li class="nav-item text-center">
          <a class="nav-link" href="<?php echo base_url(); ?>contacts">Контакты</a>
        <div class="li-shell">
        </div>
      </li>
      
    </ul>
    <ul class="navbar-nav">

      
      <?php if (!$this->session->userdata('logged_in')): ?>
        
      <?php endif ?>
     <?php if ($this->session->userdata('logged_in')): ?>
        
     <?php endif ?>
      
    </ul>
  </div>
</div>
</nav>

<div class="container mt-2">
	
