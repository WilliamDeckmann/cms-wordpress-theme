<?php

// Menu access in control panel

register_nav_menus(
  array(
    "primary_menu" => "Primary Menu",
    "footer_menu" => "Footer Menu"
  )
);



// Theme support

add_theme_support("custom-logo");

add_theme_support("post-thumbnails");



// Custom functions

function admin_link() {
  $admin_link = `<a href="./admin">Edit</a>`;
  if(current_user_can("administrator") ||
  current_user_can("editor")) {
    echo $admin_link;
  };
};



// Shortcodes

function generate_lorem() {
  return "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec justo ac urna ultricies porta. Cras pellentesque mauris ac leo feugiat tempus. Integer egestas sit amet turpis gravida accumsan. Nullam fermentum turpis id turpis lobortis consectetur. Cras ac neque sapien. Etiam est dolor, interdum eget metus nec, faucibus dapibus felis. Sed accumsan ornare massa sed ultrices. Sed vel nulla ac risus lobortis pharetra. Duis quam augue, feugiat in feugiat et, commodo a felis. Mauris quis mattis ante.</p>";
}
add_shortcode("lorem", "generate_lorem");

function generate_employees() {
  $employees = "Frank, James, Bob";
  return "<p>" . $employees . "</p>";
}
add_shortcode("employees", "generate_employees");



// Widgets

function custom_widgets_init() {
  register_sidebar(
    array(
      "name" => "Footer Widget",
      "id" => "footer-widgets",
      "before_widget" => "<div class='widget'>",
      "after_widget" => "</div>"
    )
  );
};
add_action("widgets_init", "custom_widgets_init");



// Excerpt length
function custom_length() {
  return 7;
}
add_filter("excerpt_length", "custom_length", 999);



// Custom posts

function product_posttype() {
  register_post_type(
    "product",
    array(
      "show_in_rest" => true,
      "labels" => array(
        "name" => __("Products"),
        "singular_name" => __("Product")
      ),
      "public" => true,
      "exclude_from-search" => true,
      "rewrite" => false,
      "supports" => array(
        "title",
        "editor",
        "custom-fields",
        "thumbnail"
      )
    )
      );
}
add_action("init", "product_posttype");



// Custom query of products

function print_products() {
  ob_start();
  $args = array(
    "post_type" => "product",
    "post_status" => "publish",
    "order" => "ASC",
    "orderby" => "title",
    "nopaging" => true,
    "posts_per_page" => 100
  );
  $query = new WP_Query($args);
  if($query->have_posts()) {
    ?>
    <section class="products">
      <hr>
      <h2>
        Latest products:
      </h2>
      <ul class="products-container">
        <?php
          while ($query->have_posts()){
            $query->the_post();
            $price = get_post_meta(get_the_ID(), "price", true);
            $stock = get_post_meta(get_the_ID(), "stock", true);
            //var_dump(get_the_title());
            ?>
              <a class="product-card" href="<?php echo get_the_permalink() ?>">
                <h3>
                  <?php
                    echo get_the_title();
                  ?>
                </h3>
                <figure>
                  <?php
                    the_post_thumbnail(null, "thumbnail");
                  ?>
                </figure>
                <p class="price">
                  Price: <?php echo $price ?>$
                </p>
              </a>
            <?php
          }
        ?>
      </ul>
    </section>
    <?php
  }
  return ob_get_clean();
}
add_shortcode("shop", "print_products");



//scripts and styles

function load_scripts(){
  wp_enqueue_script("main_js", get_template_directory_uri() . "/js/main.js",  NULL, 1.0, true);
  wp_enqueue_style("style", get_stylesheet_uri());
  wp_enqueue_style("resets", get_template_directory_uri() . "/styles/resets.css");
  wp_enqueue_style("header_styles", get_template_directory_uri() . "/styles/headerStyle.css");
  wp_enqueue_style("footer_styles", get_template_directory_uri() . "/styles/footerStyle.css");
  wp_enqueue_style("post_card", get_template_directory_uri() . "/styles/postCard.css"); 
  wp_enqueue_style("post_container", get_template_directory_uri() . "/styles/postContainer.css");
  wp_enqueue_style("product_card", get_template_directory_uri() . "/styles/productCard.css");
  wp_enqueue_style("product_container", get_template_directory_uri() . "/styles/productContainer.css"); 
}
add_action("wp_enqueue_scripts", "load_scripts");