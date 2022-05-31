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
  return "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis modi neque voluptas nam totam! Optio praesentium minus delectus sint mollitia maiores dicta. Voluptates sed aliquid eius, doloremque rerum dicta eum.";
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
    <div class="products">
      <?php
        while ($query->have_posts()){
          $query->the_post();
          $price = get_post_meta(get_the_ID(), "price", true);
          $stock = get_post_meta(get_the_ID(), "stock", true);
          //var_dump(get_the_title());
          ?>
            <a class="product" href="<?php echo get_the_permalink() ?>">
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
                Price: <?php echo $price ?>DKK.
              </p>
            </a>
          <?php
        }
      ?>
    </div>
    <?php
  }
  return ob_get_clean();
}
add_shortcode("shop", "print_products");



//scripts and styles

function load_scripts(){
  wp_enqueue_script("main_js", get_template_directory_uri() . "/js/main.js",  NULL, 1.0, true);
  wp_enqueue_style("style", get_stylesheet_uri());
}
add_action("wp_enqueue_scripts", "load_scripts");