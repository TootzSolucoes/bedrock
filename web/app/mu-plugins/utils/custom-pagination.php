<?php

function archive_navigation() {

	$settings = array(
		'count' => 6,
		'prev_text' => '<i class="far fa-chevron-left"></i>',
		'next_text' => '<i class="far fa-chevron-right"></i>'
	);

	global $wp_query;
	$current = max( 1, get_query_var( 'paged' ) );
	$total = $wp_query->max_num_pages;
	$links = array();

	// Offset for next link
	if( $current < $total )
		$settings['count']--;

	if( $current > 1 ) {
		// Previous
		$settings['count']--;
		$links[] = archive_navigation_link( $current - 1, 'prev', $settings['prev_text'] );

		// Prev Pages
		$it = $current - $settings['count'] < 0 ? 0 : $current - $settings['count'];
		for( $i = $it; $i < $current; $i++ ) {
			$page = $i;
			if( $page <= $total ) {
				$links[] = archive_navigation_link( $page );
			}
		}
	}

	// Current
	$links[] = archive_navigation_link( $current, 'current' );

	// Next Pages
	for( $i = 1; $i < $settings['count']; $i++ ) {
		$page = $current + $i;
		if( $page <= $total ) {
			$links[] = archive_navigation_link( $page );
		}
	}

	// Next
	if( $current < $total ) {
		$links[] = archive_navigation_link( $current + 1, 'next', $settings['next_text'] );
	}


	echo '<nav class="navigation posts-navigation" role="navigation">';
    	echo '<h2 class="screen-reader-text">Posts navigation</h2>';
    	echo '<div class="nav-links">' . join( '', $links ) . '</div>';
	echo '</nav>';
}
add_action( 'tha_content_while_after', 'archive_navigation' );

function archive_navigation_link( $page = false, $class = '', $label = '' ) {

	if( ! $page )
		return;

	$classes = array( 'page-numbers' );
	if( !empty( $class ) )
		$classes[] = $class;
	$classes = array_map( 'sanitize_html_class', $classes );

	$label = $label ? $label : $page;
	$link = esc_url_raw( get_pagenum_link( $page ) );

	return '<a class="' . join ( ' ', $classes ) . '" href="' . $link . '"><span>' . $label . '</span></a>';

}
