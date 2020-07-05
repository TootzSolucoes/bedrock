<?php
  function wpd_faqs_query($query) {
    if ($query->is_post_type_archive('faq') && $query->is_main_query() && !is_admin()) {
			$query->set('posts_per_page', -1);
    }
  }

  add_action('pre_get_posts', 'wpd_faqs_query' );

	function wpb_change_faqs_title_text($title){
		$screen = get_current_screen();
		if  ('faq' == $screen->post_type) {
			$title = 'Digite a pergunta';
		}
		return $title;
	}

	add_filter('enter_title_here', 'wpb_change_faqs_title_text');
