<?php

  // Head (document-start)
  get_template_part("parts/head");
?>
<body>
  <div class="wrapper">
    <?php

      // Header
      get_template_part("parts/header");
    ?>
    <main class="main">
      <?php

        // Main loop
        if(have_posts()) {
          while(have_posts()) {
            the_post();
            ?>
            <a href="<?php echo get_permalink();?>">
              <?php

                // Content
                echo "<h2>" . get_the_title() . "</h2>";
                echo get_the_post_thumbnail(null, "thumbnail");
                echo "<div>";
                echo get_the_excerpt();
                echo "</div>";
                //echo "<div class='entry'>" . get_the_content() . "</div>";
              ?>
            </a>
            <?php
          }
        } else {

          // 404 (site not found!)
          echo "<p>The site you are looking for, doesn't exist!</p>";
        }
      ?>
    </main>
    <?php

      // Footer
      get_template_part("parts/footer");
    ?>
  </div>
</body>
</html>