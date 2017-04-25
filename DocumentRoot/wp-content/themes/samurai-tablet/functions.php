<?php
// styleを読み込み
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles()
{
    wp_enqueue_style( 'parent-style', get_parent_theme_file_uri() . '/style.css' );
}

// アイキャッチ画像を有効
add_theme_support('post-thumbnails');   // カスタム投稿タイプで thumbnail を使うので追記

// カスタム投稿タイプ作成
function create_post_type() {
	//
  $postSupports = [
    'title',
    'editor',
    'thumbnail'
  ];

  //はじめに
  register_post_type( 'about',
    array(
      'label' => 'はじめに',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
      'supports' => $postSupports
    )
  );
  register_taxonomy(
    'about_taxonomy',
    'about',
    array(
      'label' => 'タクソノミー',
      'labels' => array(
        'all_items' => 'タクソノミー一覧',
        'add_new_item' => '新規タクソノミーを追加'
      ),
      'hierarchical' => true
    )
  );

	//館内案内
  register_post_type( 'hall',
    array(
      'label' => '館内案内',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
      'supports' => $postSupports
    )
  );
  register_taxonomy(
    'hall_taxonomy',
    'hall',
    array(
      'label' => '館内案内タクソノミー',
      'labels' => array(
        'all_items' => '館内案内タクソノミー一覧',
        'add_new_item' => '新規館内案内タクソノミーを追加'
      ),
      'hierarchical' => true
    )
  );

	//温泉案内
	register_post_type( 'onsen',
    array(
      'label' => '温泉案内',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 6,
      'supports' => $postSupports
    )
  );
	register_taxonomy(
    'onsen_taxonomy',
    'onsen',
    array(
      'label' => '温泉案内タクソノミー',
      'labels' => array(
        'all_items' => '温泉案内タクソノミー一覧',
        'add_new_item' => '新規温泉案内タクソノミーを追加'
      ),
      'hierarchical' => true
    )
  );

	//周辺案内
	register_post_type( 'surround',
    array(
      'label' => '周辺案内',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 7,
      'supports' => $postSupports
    )
  );
	register_taxonomy(
    'surround_taxonomy',
    'surround',
    array(
      'label' => '周辺案内タクソノミー',
      'labels' => array(
        'all_items' => '周辺案内タクソノミー一覧',
        'add_new_item' => '新規周辺案内タクソノミーを追加'
      ),
      'hierarchical' => true
    )
  );

}

add_action( 'init', 'create_post_type' );

?>
