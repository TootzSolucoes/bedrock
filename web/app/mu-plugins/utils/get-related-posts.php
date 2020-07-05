<?php
function codeless_get_related_posts( $post_id, $related_count, $args = array() ) {
  $terms = get_the_terms( $post_id, 'category' );

  if ( empty( $terms ) ) $terms = array();

  $term_list = wp_list_pluck( $terms, 'slug' );

  $related_args = array(
    'post_type' => 'post',
    'posts_per_page' => $related_count,
    'post_status' => 'publish',
    'post__not_in' => array( $post_id ),
    'orderby' => 'rand',
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $term_list
      )
    )
  );
  return new WP_Query( $related_args );
}