<header class="header">
  <?php
    //admin_link();
  ?>
  <section class="header__left">
    <div class="logo">
      <?php

        // Logo (only apply if src exist)
        if(function_exists(the_custom_logo())) {
          the_custom_logo();
        } else {
          echo "<h2>" . get_bloginfo() . "</h2>";
        }
      ?>
    </div>
  </section>
  <section class="header__mid">
    <div class="search">
      <?php
  
        // Search-bar
        get_search_form();
      ?>
    </div>

  </section>
  <section class="header__right">
    <?php
    // Navigation
    wp_nav_menu(
      array(
        "container" => "nav"
        )
      );
    ?>
  </section>
</header>