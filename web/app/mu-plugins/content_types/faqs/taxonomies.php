<?php

add_action('init', 'register_taxonomy_segmentation_category');
function register_taxonomy_segmentation_category() {
  register_taxonomy(
    'segmentation_category',
    array('faq'),
    array(
      'public'            => true,
      'show_ui'           => true,
      'show_in_nav_menus' => true,
      'show_tagcloud'     => true,
      'show_admin_column' => true,
      'hierarchical'      => true,
      'query_var'         => true,
      'meta_box_cb'       => false,

      /* The rewrite handles the URL structure. */
      'rewrite' => array(
        'slug'         => 'segmentacoes',
        'with_front'   => false,
        'hierarchical' => true,
        'ep_mask'      => EP_PERMALINK
       ),

      /* Labels used when displaying taxonomy and terms. */
      'labels' => array(
        'name'                       => pll__('Segmentações'),
        'singular_name'              => pll__('Segmentação'),
        'menu_name'                  => pll__('Segmentações'),
        'name_admin_bar'             => pll__('Segmentações'),
        'search_items'               => pll__('Buscar Segmentações'),
        'popular_items'              => pll__('Segmentações Populares'),
        'all_items'                  => pll__('Todas os Segmentações'),
        'edit_item'                  => pll__('Editar Categoria'),
        'view_item'                  => pll__('Visualizar Categoria'),
        'update_item'                => pll__('Atualizar Categoria'),
        'add_new_item'               => pll__('Adicionar Nova Categoria'),
        'new_item_name'              => pll__('Novo Nome de Categoria'),
        'parent_item'                => pll__('Categoria Pai'),
        'parent_item_colon'          => pll__('Categoria Pai:'),
        'separate_items_with_commas' => null,
        'add_or_remove_items'        => null,
        'choose_from_most_used'      => null,
        'not_found'                  => null,
      ),

      /* Capabilities. */
      // 'capabilities' => array(
      //     'manage_terms' => 'manage_example',
      //     'edit_terms'   => 'manage_example',
      //     'delete_terms' => 'manage_example',
      //     'assign_terms' => 'edit_examples',
      //),
     )
   );
}
