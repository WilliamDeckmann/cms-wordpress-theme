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
      <ul class="post-cards-list">
        <?php

          // Main loop
          if(have_posts()) {
            while(have_posts()) {
              the_post();
              ?>
              <a class="post-card" href="<?php echo get_permalink();?>">
                <?php

                  // Content
                  echo "<h2>" . get_the_title() . "</h2>";
                  echo get_the_post_thumbnail(null, "thumbnail");
                  echo "<p>";
                  echo get_the_excerpt();
                  echo "</p>";
                  //echo "<div class='entry'>" . get_the_content() . "</div>";
                ?>
              </a>
              <?php
            }
          } else {

            // 404 (site not found!)
            echo generate_dog_gif();
          }
        ?>
      </ul>
    </main>
    <?php

      // Footer
      get_template_part("parts/footer");
    ?>
  </div>
</body>
</html>