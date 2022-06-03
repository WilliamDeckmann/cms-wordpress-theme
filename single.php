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
            <article class="article">
              <div class="post-container">
                <?php

                  // Content
                  echo "<h2>" . get_the_title() . "</h2>";
                  //echo get_the_post_thumbnail(null, "medium");
                  echo "<div class='entry'>";
                    the_content();
                  echo "</div>";
                ?>
              </div>
            </article>
            <?php
          }
        } else {

          // 404 (sit not found!)
          echo generate_dog_gif();
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