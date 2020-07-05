<?php 

function get_page_id_by_path($page_path) {
  $page = get_page_by_path($page_path);

  if ($page) {
    return $page->ID;
  } else {
    return null;
  }
} 

function get_pll_page_by_path($page_path) {
  $page_ID = get_page_id_by_path($page_path);

  if ($page_ID) {
    if (function_exists('pll_get_post')) {
      return get_page(pll_get_post($page_ID));
    } else {
      return get_page($page_ID);
    }
  } else {
    return null;
  }
} 