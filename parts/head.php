<!DOCTYPE html>
<html lang="<?php echo get_locale() ?>">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100;200&family=Montserrat:wght@600&family=Roboto:wght@300&family=Zen+Kaku+Gothic+Antique:wght@500&display=swap" rel="stylesheet">

  <?php wp_head(); ?> <!-- Adds admin control-bar to the top of the page -->
  <title><?php echo get_bloginfo() ?></title>
</head>