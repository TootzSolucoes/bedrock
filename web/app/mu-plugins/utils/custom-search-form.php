<?php

add_filter('get_search_form', 'custom_search_form');
function custom_search_form($form) {
    $form = '<form method="get" id="search-form" action="' . home_url('/') . '/" >
        <div class="form-row align-items-center">
            <div class="col-auto flex-grow-1">
                <div class="form-control-skew">
                    <input type="text" class="form-control" placeholder="Digite um termo" name="s" id="s">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" id="search-submit" class="btn btn-primary"><span><i class="fal fa-search"></i></span></button>
            </div>
        </div>
    </form>';
    return $form;
}


if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}


