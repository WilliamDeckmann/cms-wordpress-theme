<!DOCTYPE html>
<html lang="<?php echo get_locale() ?>">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/styling/headerStyle.css">
  <?php wp_head(); ?> <!-- Adds admin control-bar to the top of the page -->
  <title><?php echo get_bloginfo() ?></title>
</head>