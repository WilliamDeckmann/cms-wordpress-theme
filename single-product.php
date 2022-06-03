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
            <article class="article" >
              <div class="product-container">
                <section>
                <?php

                  // Content
                  $price = get_post_meta( get_the_ID(), 'price', true);
                  echo "<h2>" . get_the_title() . "</h2>";
                  echo '<p class="price">Price: ' . $price . '$</p>';
                  ?>
                </section>
                <?php

                  // Content
                  //echo get_the_post_thumbnail(null, "medium");
                  echo "<div class='entry'>";
                    the_content();
                  echo "</div>";
                ?>
                <button>
                  Purchase
                </button>
              </div>
            </article>
            <?php
          }
        } else {

          // 404 (sit not found!)
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