<?php

// Register Custom Post Type
function faq_post_type() {

	$labels = array(
		'name'                  => pll__( 'FAQs' ),
		'singular_name'         => pll__( 'FAQ' ),
		'menu_name'             => pll__( 'FAQs' ),
		'name_admin_bar'        => pll__( 'FAQ' ),
		'archives'              => pll__( 'Listagem de FAQs' ),
		'attributes'            => pll__( 'Atributos do FAQ' ),
		'parent_item_colon'     => pll__( 'Item Pai:' ),
		'all_items'             => pll__( 'Todos os FAQs' ),
		'add_new_item'          => pll__( 'Adicionar novo FAQ' ),
		'add_new'               => pll__( 'Adicionar novo' ),
		'new_item'              => pll__( 'Novo FAQ' ),
		'edit_item'             => pll__( 'Editar FAQ' ),
		'update_item'           => pll__( 'Atualizar FAQ' ),
		'view_item'             => pll__( 'Ver FAQ' ),
		'view_items'            => pll__( 'Ver FAQs' ),
		'search_items'          => pll__( 'Procurar FAQs' ),
		'not_found'             => pll__( 'Não encontrado' ),
		'not_found_in_trash'    => pll__( 'Não encontrado no lixo' ),
		'featured_image'        => pll__( 'Imagem Destacada' ),
		'set_featured_image'    => pll__( 'Definir imagem destacada' ),
		'remove_featured_image' => pll__( 'Remover imagem destacada' ),
		'use_featured_image'    => pll__( 'Usar como imagem destacada' ),
		'insert_into_item'      => pll__( 'Inserir em FAQ' ),
		'uploaded_to_this_item' => pll__( 'Carregado para este FAQ' ),
		'items_list'            => pll__( 'Lista de FAQs' ),
		'items_list_navigation' => pll__( 'Navegação da Lista de FAQs' ),
		'filter_items_list'      => pll__( 'Filtrar lita de FAQs' ),
	);
	// Only for example
	$capabilities = array(
		'edit_post'             => 'edit_faq',
		'read_post'             => 'read_faqs',
		'delete_post'           => 'delete_faq',
		'edit_posts'            => 'edit_faqs',
		'edit_others_posts'     => 'edit_others_faqs',
		'publish_posts'         => 'publish_faqs',
		'read_private_posts'    => 'read_private_faqs',
	);
	$args = array(
		'label'                 => pll__( 'FAQ' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-format-chat',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => array(
			'with_front' => false,
		),
		'show_in_rest'          => false,
	);
	register_post_type( 'faq', $args );

}
add_action( 'init', 'faq_post_type', 0 );
