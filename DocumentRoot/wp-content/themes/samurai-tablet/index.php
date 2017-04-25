<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
$lang = $_COOKIE['language'];
get_header(); ?>

<div data-lang="japanese" class="main clearfix">
			<div class="mainColumn">
				<div class="mainContent topContent js-topPage"><img class="logoImg" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/logo.png"></div>
				<div data-menu="intro" class="mainContent japanese introContent js-introPage">
					<div class="textBox">
						<?php
						$hallPostArg = array(
							'posts_per_page' => 9999,
							'post_type'      => 'about',  // カスタム投稿タイプ名
							'order'           => 'ASC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'about_taxonomy',  // カスタムタクソノミー名
									'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
									'terms'    => 'contents' // タクソノミーに属するターム名
								)
							)
						);
						$hallPosts = get_posts($hallPostArg);
						if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
						<h2 class="introHeadline" data-lang="ja"><?php echo post_custom("title_ja"); ?></h2>
						<h2 class="introHeadline" data-lang="en"><?php echo post_custom("title_en"); ?></h2>
						<h2 class="introHeadline" data-lang="cn1"><?php echo post_custom("title_cn1"); ?></h2>
						<h2 class="introHeadline" data-lang="cn2"><?php echo post_custom("title_cn2"); ?></h2>
						<h2 class="introHeadline" data-lang="ti"><?php echo post_custom("title_ti"); ?>ิ</h2>
						<p class="introSentence" data-lang="ja"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ja", true ) ); ?></p>
						<p class="introSentence" data-lang="en"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_en", true ) ); ?></p>
						<p class="introSentence" data-lang="cn1"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn1", true ) ); ?></p>
						<p class="introSentence" data-lang="cn2"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn2", true ) ); ?></p>
						<p class="introSentence" data-lang="ti"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ti", true ) ); ?></p>
						<?php wp_reset_postdata(); endforeach; endif;?>
					</div>
				</div>
				<div data-menu="hall" class="mainContent hallContent js-onsenPage">
					<div data-tab="1" class="contentWrapper">
						<h3 class="contentHeadline" data-lang="ja">館内を楽しく快適にご利用いただくために</h3>
						<h3 class="contentHeadline" data-lang="en">How to use the facilities comfortably...</h3>
						<h3 class="contentHeadline" data-lang="cn1">为了您可以愉快舒适的居住本旅馆</h3>
						<h3 class="contentHeadline" data-lang="cn2">為了您可以愉快舒適的居住本旅館</h3>
						<h3 class="contentHeadline" data-lang="ti">ข้อควรทราบ เพื่อให้ท่านสามารถใช้บริการของทางเราได้อย่างสบายใจ</h3>
						<ul class="guideList clearfix">
							<?php
							$hallPostArg = array(
								'posts_per_page' => 9999,
								'post_type'      => 'hall',  // カスタム投稿タイプ名
								'order'           => 'ASC',
								'tax_query'      => array(
									array(
										'taxonomy' => 'hall_taxonomy',  // カスタムタクソノミー名
										'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
										'terms'    => '1' // タクソノミーに属するターム名
									)
								)
							);
							$hallPosts = get_posts($hallPostArg);
							if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<li <?php if (!empty(post_custom("li_class_name"))) {
								echo "class=". post_custom("li_class_name");
							} else {} ?>>
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img <?php if (!empty(post_custom("img_class_name"))) {
									echo "class=". post_custom("img_class_name");
								} else {} ?> src="<?php echo $image_url[0]; ?>" <?php if (!empty(post_custom("img_width"))) {
									echo "width=". post_custom("img_width");
								} else {} ?>>
								<?php else : ?>
								<?php endif ; ?>
								<div class="guideText">
									<h4 class="guideHeadline" data-lang="ja"><?php echo post_custom("title_ja"); ?></h4>
									<h4 class="guideHeadline" data-lang="en"><?php echo post_custom("title_en"); ?></h4>
									<h4 class="guideHeadline" data-lang="cn1"><?php echo post_custom("title_cn1"); ?></h4>
									<h4 class="guideHeadline" data-lang="cn2"><?php echo post_custom("title_cn2"); ?></h4>
									<h4 class="guideHeadline" data-lang="ti"><?php echo post_custom("title_ti"); ?></h4>
									<p class="guideSentence" data-lang="ja"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ja", true ) ); ?></p>
									<p class="guideSentence" data-lang="en"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_en", true ) ); ?></p>
									<p class="guideSentence" data-lang="cn1"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn1", true ) ); ?></p>
									<p class="guideSentence" data-lang="cn2"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn2", true ) ); ?></p>
									<p class="guideSentence" data-lang="ti"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ti", true ) ); ?></p>
								</div>
							</li>
							<?php wp_reset_postdata(); endforeach; endif;?>
						</ul>
					</div>
					<div data-tab="2" class="contentWrapper">
						<h3 class="contentHeadline">館内を楽しく快適にご利用いただくために</h3>
						<ul class="guideList clearfix">
							<?php
							$hallPostArg = array(
								'posts_per_page' => 9999,
								'post_type'      => 'hall',  // カスタム投稿タイプ名
								'order'           => 'ASC',
								'tax_query'      => array(
									array(
										'taxonomy' => 'hall_taxonomy',  // カスタムタクソノミー名
										'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
										'terms'    => '2' // タクソノミーに属するターム名
									)
								)
							);
							$hallPosts = get_posts($hallPostArg);
							if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<li <?php if (!empty(post_custom("li_class_name"))) {
								echo "class=". post_custom("li_class_name");
							} else {} ?>>
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img <?php if (!empty(post_custom("img_class_name"))) {
									echo "class=". post_custom("img_class_name");
								} else {} ?> src="<?php echo $image_url[0]; ?>" <?php if (!empty(post_custom("img_width"))) {
									echo "width=". post_custom("img_width");
								} else {} ?>>
								<?php else : ?>
								<?php endif ; ?>
								<div class="guideText">
									<h4 class="guideHeadline" data-lang="ja"><?php echo post_custom("title_ja"); ?></h4>
									<h4 class="guideHeadline" data-lang="en"><?php echo post_custom("title_en"); ?></h4>
									<h4 class="guideHeadline" data-lang="cn1"><?php echo post_custom("title_cn1"); ?></h4>
									<h4 class="guideHeadline" data-lang="cn2"><?php echo post_custom("title_cn2"); ?></h4>
									<h4 class="guideHeadline" data-lang="ti"><?php echo post_custom("title_ti"); ?></h4>
									<p class="guideSentence" data-lang="ja"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ja", true ) ); ?></p>
									<p class="guideSentence" data-lang="en"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_en", true ) ); ?></p>
									<p class="guideSentence" data-lang="cn1"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn1", true ) ); ?></p>
									<p class="guideSentence" data-lang="cn2"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn2", true ) ); ?></p>
									<p class="guideSentence" data-lang="ti"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ti", true ) ); ?></p>
								</div>
							</li>
							<?php wp_reset_postdata(); endforeach; endif;?>
						</ul>
						<div class="mt-50">
							<?php
							$hallPostArg = array(
							  'posts_per_page' => 9999,
							  'post_type'      => 'hall',  // カスタム投稿タイプ名
							  'tax_query'      => array(
							    array(
							      'taxonomy' => 'hall_taxonomy',  // カスタムタクソノミー名
							      'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
							      'terms'    => 'fire-services' // タクソノミーに属するターム名
							    )
							  )
							);
							$hallPosts = get_posts($hallPostArg);
							if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<h4 class="guideHeadline" data-lang="ja"><?php echo post_custom("title_ja"); ?></h4>
							<h4 class="guideHeadline" data-lang="en"><?php echo post_custom("title_en"); ?></h4>
							<h4 class="guideHeadline" data-lang="cn1"><?php echo post_custom("title_cn1"); ?></h4>
							<h4 class="guideHeadline" data-lang="cn2"><?php echo post_custom("title_cn2"); ?></h4>
							<h4 class="guideHeadline" data-lang="ti"><?php echo post_custom("title_ti"); ?></h4>
							<p class="guideSentence" data-lang="ja"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_ja', true ) ); ?></p>
							<p class="guideSentence" data-lang="en"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_en", true ) ); ?></p>
							<p class="guideSentence" data-lang="cn1"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn1", true ) ); ?></p>
							<p class="guideSentence" data-lang="cn2"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn2", true ) ); ?></p>
							<p class="guideSentence" data-lang="ti"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ti", true ) ); ?></p>
							<?php wp_reset_postdata(); endforeach; endif;?>
						</div>
					</div>
					<div data-tab="3" class="contentWrapper">
						<div class="annexWrapper">
							<h3 class="annexHeadline">館内平面図<br>「別館」</h3>
							<img class="annexMap" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/annex.png" alt="">
							<div class="annexGuideLabel">
								<div class="label_wc_1">WC</div>
								<div class="label_wc_2">WC</div>
								<div class="label_wc_3">WC</div>
								<div class="label_wc_4">WC</div>
								<div class="label_mwc_1">男子WC</div>
								<div class="label_fwc_1">女子WC</div>
								<div class="label_fwc_2">女子WC</div>
								<div class="label_floor_1">別館1階</div>
								<div class="label_floor_2">別館2階</div>
								<div class="label_floor_3">別館3階</div>
								<div class="label_wfloor_1">木造別館1階</div>
								<div class="label_wfloor_2">木造別館2階</div>
								<div class="label_wfloor_3">木造別館3階</div>
								<div class="label_emergency_1">非常口</div>
								<div class="label_emergency_2">非常口</div>
								<div class="label_emergency_3">非常口</div>
								<div class="label_emergency_4">非常口</div>
								<div class="label_emergency_5">非常口</div>
								<div class="label_emergencyS_1">非常階段</div>
								<div class="label_emergencyS_2">非常階段</div>
								<div class="label_facility_1">男子露天</div>
								<div class="label_facility_2">男子内湯</div>
								<div class="label_facility_3">女子露天</div>
								<div class="label_facility_4">女子内湯</div>
								<div class="label_facility_5">ロビー</div>
								<div class="label_facility_6">都路里</div>
								<div class="label_facility_7">大広間</div>
								<div class="label_facility_8">時の橋</div>
								<div class="label_facility_9">貸切風呂</div>
								<div class="label_facility_10">売店</div>
								<div class="label_facility_11">男</div>
								<div class="label_room_1">夕月</div>
								<div class="label_room_2">茜</div>
								<div class="label_room_3">有明</div>
								<div class="label_room_4">つつじ</div>
								<div class="label_room_5">あやめ</div>
								<div class="label_room_6">すいせん</div>
								<div class="label_room_7">やまぶき</div>
								<div class="label_room_8">弥生</div>
								<div class="label_room_9">乙女</div>
								<div class="label_room_10">松風</div>
								<div class="label_room_11">やなぎ</div>
								<div class="label_room_12">かえで</div>
								<div class="label_room_13">わらび</div>
								<div class="label_room_14">つくし</div>
								<div class="label_room_15">23号室</div>
								<div class="label_room_16">28号室</div>
								<div class="label_room_17">30号室</div>
								<div class="label_room_18">はと</div>
								<div class="label_room_19">きじ</div>
								<div class="label_room_20">たか</div>
								<div class="label_room_21">つる</div>
								<div class="label_room_22">るり</div>
								<div class="label_room_23">きく</div>
								<div class="label_room_24">ゆり</div>
								<div class="label_room_25">はぎ</div>
								<div class="label_room_26">ふじ</div>
								<div class="label_room_27">きく</div>
								<div class="label_to_1">本館3階へ</div>
								<div class="label_to_2">本館2階へ</div>
							</div>
						</div>
					</div>
					<div data-tab="4" class="contentWrapper">
						<div class="mainBuildingWrapper">
							<h3 class="mainBuildingHeadline">館内平面図<br>「本館」</h3>
							<img class="mainBuildingMap" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/mainBuilding.png" alt="">
							<img class="mainBuildingImg_1" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/mainBuilding_image_1.png" alt="">
							<img class="mainBuildingImg_2" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/mainBuilding_image_2.png" alt="">
							<img class="mainBuildingImg_3" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/mainBuilding_image_3.png" alt="">
							<div class="mainBuildingGuideLabel">
								<div class="label_floor_1">本館1階</div>
								<div class="label_floor_2">本館2階</div>
								<div class="label_floor_3">本館3階</div>
								<div class="label_floor_4">本館3階</div>
								<div class="label_floor_5">本館</div>
								<div class="label_floor_6">別館</div>
								<div class="label_floor_7">木造別館</div>
								<div class="label_facility_1">帳場</div>
								<div class="label_facility_2">時の橋</div>
								<div class="label_facility_3">料亭「匠庵」</div>
								<div class="label_facility_4">料亭「匠庵」</div>
								<div class="label_1f_1">1F</div>
								<div class="label_1f_2">1F</div>
								<div class="label_1f_3">1F</div>
								<div class="label_2f_1">2F</div>
								<div class="label_2f_2">2F</div>
								<div class="label_2f_3">2F</div>
								<div class="label_2f_4">2F</div>
								<div class="label_3f_1">3F</div>
								<div class="label_3f_2">3F</div>
								<div class="label_3f_3">3F</div>
								<div class="label_3f_4">3F 大広間</div>
							</div>
						</div>
					</div>
					<ul class="contentMenu clearfix">
						<?php
							// タクソノミ取得
							$catargs = array(
								'taxonomy'   => 'hall_taxonomy',
								'parent'     => 2,
								'hide_empty' => 0,
								'orderby'    => 'slug'
							);
							$catlists = get_categories( $catargs );
							foreach($catlists as $cat) : // 取得したカテゴリの配列でループを回す
						?>
						<li><a data-tab="<?php echo $cat->slug ?>" href="javascript:void(0)"><?php echo $cat->name ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div data-menu="onsen" class="mainContent onsenContent js-onsenPage">
					<div data-tab="1" class="contentWrapper">
						<?php
						$count = 0;
						$hallPostArg = array(
							'posts_per_page' => 9999,
							'post_type'      => 'onsen',  // カスタム投稿タイプ名
							'order'           => 'ASC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'onsen_taxonomy',  // カスタムタクソノミー名
									'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
									'terms'    => '1' // タクソノミーに属するターム名
								)
							)
						);
						$hallPosts = get_posts($hallPostArg);
						if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<h3 class="contentHeadline <?php echo ($count%2==0)? "" : "mt-80"; ?>" data-lang="ja"><?php echo post_custom('title_ja'); ?></h3>
							<h3 class="contentHeadline <?php echo ($count%2==0)? "" : "mt-80"; ?>" data-lang="en"><?php echo post_custom('title_en'); ?></h3>
							<h3 class="contentHeadline <?php echo ($count%2==0)? "" : "mt-80"; ?>" data-lang="cn1"><?php echo post_custom('title_cn1'); ?></h3>
							<h3 class="contentHeadline <?php echo ($count%2==0)? "" : "mt-80"; ?>" data-lang="cn2"><?php echo post_custom('title_cn2'); ?></h3>
							<h3 class="contentHeadline <?php echo ($count%2==0)? "" : "mt-80"; ?>" data-lang="ti"><?php echo post_custom('title_ti'); ?></h3>
							<div class="contentUnit <?php echo ($count%2==0)? "leftImage" : "rightImage"; ?>">
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img src="<?php echo $image_url[0]; ?>" width=<?php echo ($count%2==0)? "320" : "395"; ?>>
								<?php else : ?>
								<?php endif ; ?>
								<p class="onsenSentence <?php echo ($count%2==0)? "pl-340" : "pr-400"; ?>" data-lang="ja"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_ja', true ) ); ?></p>
								<p class="onsenSentence <?php echo ($count%2==0)? "pl-340" : "pr-400"; ?>" data-lang="en"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_en', true ) ); ?></p>
								<p class="onsenSentence <?php echo ($count%2==0)? "pl-340" : "pr-400"; ?>" data-lang="cn1"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_cn1', true ) ); ?></p>
								<p class="onsenSentence <?php echo ($count%2==0)? "pl-340" : "pr-400"; ?>" data-lang="cn2"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_cn2', true ) ); ?></p>
								<p class="onsenSentence <?php echo ($count%2==0)? "pl-340" : "pr-400"; ?>" data-lang="ti"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_ti', true ) ); ?></p>
							</div>
						<?php $count++; wp_reset_postdata(); endforeach; endif;?>
					</div>
					<div data-tab="2" class="contentWrapper">
						<h3 class="contentHeadline">肌にやさしい一條の源泉</h3>
						<?php
						$count = 0;
						$hallPostArg = array(
							'posts_per_page' => 9999,
							'post_type'      => 'onsen',  // カスタム投稿タイプ名
							'order'           => 'ASC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'onsen_taxonomy',  // カスタムタクソノミー名
									'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
									'terms'    => '2' // タクソノミーに属するターム名
								)
							)
						);
						$hallPosts = get_posts($hallPostArg);
						if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<div class="contentUnit <?php echo ($count%2==0)? "leftImage" : "rightImage"; ?>">
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img src="<?php echo $image_url[0]; ?>" width=<?php echo ($count%2==0)? "345" : "345"; ?>>
								<?php else : ?>
								<?php endif ; ?>
								<div class="<?php echo ($count%2==0)? "pl-370" : "pr-370"; ?>">
									<h4 class="unitHeadline" data-lang="ja"><?php echo post_custom('title_ja'); ?></h4>
									<h4 class="unitHeadline" data-lang="en"><?php echo post_custom('title_en'); ?></h4>
									<h4 class="unitHeadline" data-lang="cn1"><?php echo post_custom('title_cn1'); ?></h4>
									<h4 class="unitHeadline" data-lang="cn2"><?php echo post_custom('title_cn2'); ?></h4>
									<h4 class="unitHeadline" data-lang="ti"><?php echo post_custom('title_ti'); ?></h4>
									<p class="unitSentence" data-lang="ja"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_ja', true ) ); ?></p>
									<p class="unitSentence" data-lang="en"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_en', true ) ); ?></p>
									<p class="unitSentence" data-lang="cn1"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_cn1', true ) ); ?></p>
									<p class="unitSentence" data-lang="cn2"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_cn2', true ) ); ?></p>
									<p class="unitSentence" data-lang="ti"><?php global $post; echo nl2br(get_post_meta( $post->ID, 'contents_ti', true ) ); ?></p>
								</div>
							</div>
						<?php $count++; wp_reset_postdata(); endforeach; endif;?>
					</div>
					<div data-tab="3" class="contentWrapper">
						<?php
						$count = 0;
						$hallPostArg = array(
							'posts_per_page' => 9999,
							'post_type'      => 'onsen',  // カスタム投稿タイプ名
							'order'           => 'ASC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'onsen_taxonomy',  // カスタムタクソノミー名
									'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
									'terms'    => '3' // タクソノミーに属するターム名
								)
							)
						);
						$hallPosts = get_posts($hallPostArg);
						if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
						<?php
						$title_ja = get_post_meta($post->ID, "title_ja", false);
						$title_en = get_post_meta($post->ID, "title_en", false);
						$title_cn1 = get_post_meta($post->ID, "title_cn1", false);
						$title_cn2 = get_post_meta($post->ID, "title_cn2", false);
						$title_ti = get_post_meta($post->ID, "title_ti", false);
						$contents_ja = get_post_meta($post->ID, "contents_ja", false);
						$contents_en = get_post_meta($post->ID, "contents_en", false);
						$contents_cn1 = get_post_meta($post->ID, "contents_cn1", false);
						$contents_cn2 = get_post_meta($post->ID, "contents_cn2", false);
						$contents_ti = get_post_meta($post->ID, "contents_ti", false);
						if ($title_ja[0]) {
							$post_metas = array();
							$length = count($title_ja);
							for ($i = 0; $i < $length; $i++) {
								 $tmp = array(
									 $title_ja[$i],$title_en[$i],$title_cn1[$i],$title_cn2[$i],$title_ti[$i],
									 $contents_ja[$i],$contents_en[$i],$contents_cn1[$i],$contents_cn2[$i],$contents_ti[$i]
								 );
								 array_push($post_metas, $tmp);
							}
						} ?>
							<div class="contentUnit <?php echo ($count%2==0)? "leftImage" : "rightImage"; ?>">
								<?php
								switch($count) {
									case 0: $imageLength = "270"; $contClass = "pl-290"; break;
									case 1: $imageLength = "345"; $contClass = "pr-370"; break;
									case 2: $imageLength = "490"; $contClass = "pl-520"; break;
									default: $imageLength = ""; $contClass = ""; break;
								}
								?>
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img src="<?php echo $image_url[0]; ?>" width=<?php echo $imageLength; ?>>
								<?php else : ?>
								<?php endif ; ?>
								<div class=<?php echo $contClass; ?>><?php foreach ($post_metas as $x) {?>
<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php echo preg_replace("/( |　)/", "", $x[0] ); ?></h4>
<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php echo preg_replace("/( |　)/", "", $x[1] ); ?></h4>
<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php echo preg_replace("/( |　)/", "", $x[2] ); ?></h4>
<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php echo preg_replace("/( |　)/", "", $x[3] ); ?></h4>
<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php echo preg_replace("/( |　)/", "", $x[4] ); ?></h4>
<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php global $post; echo nl2br($x[5]); ?></p>
<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php global $post; echo nl2br($x[6]); ?></p>
<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php global $post; echo nl2br($x[7]); ?></p>
<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php global $post; echo nl2br($x[8]); ?></p>
<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php global $post; echo nl2br($x[9]); ?></p>
									<?php } ?>
								</div>
							</div>
						<?php $count++; wp_reset_postdata(); endforeach; endif;?>
					</div>
					<div data-tab="4" class="contentWrapper">
						<h3 class="contentHeadline">施設</h3>
						<?php
						$count = 0;
						$hallPostArg = array(
							'posts_per_page' => 9999,
							'post_type'      => 'onsen',  // カスタム投稿タイプ名
							'order'           => 'ASC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'onsen_taxonomy',  // カスタムタクソノミー名
									'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
									'terms'    => '4' // タクソノミーに属するターム名
								)
							)
						);
						$hallPosts = get_posts($hallPostArg);
						if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<div class="contentUnit <?php echo ($count%2==0)? "leftImage" : "rightImage"; ?>">
								<?php
								switch($count) {
									case 0: $imageLength = "345"; $contClass = "pl-370"; break;
									case 1: $imageLength = "270"; $contClass = "pr-300"; break;
									case 2: $imageLength = "270"; $contClass = "pl-300"; break;
									default: $imageLength = ""; $contClass = ""; break;
								}
								?>
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img src="<?php echo $image_url[0]; ?>" width=<?php echo $imageLength; ?>>
								<?php else : ?>
								<?php endif ; ?>
								<div class=<?php echo $contClass; ?>>
									<?php
									$title_ja = get_post_meta($post->ID, "title_ja", false);
									$title_en = get_post_meta($post->ID, "title_en", false);
									$title_cn1 = get_post_meta($post->ID, "title_cn1", false);
									$title_cn2 = get_post_meta($post->ID, "title_cn2", false);
									$title_ti = get_post_meta($post->ID, "title_ti", false);
									$contents_ja = get_post_meta($post->ID, "contents_ja", false);
									$contents_en = get_post_meta($post->ID, "contents_en", false);
									$contents_cn1 = get_post_meta($post->ID, "contents_cn1", false);
									$contents_cn2 = get_post_meta($post->ID, "contents_cn2", false);
									$contents_ti = get_post_meta($post->ID, "contents_ti", false);
									if ($title_ja[0]) {
										$post_metas = array();
										$length = count($title_ja);
										for ($i = 0; $i < $length; $i++) {
											 $tmp = array(
												 $title_ja[$i],$title_en[$i],$title_cn1[$i],$title_cn2[$i],$title_ti[$i],
												 $contents_ja[$i],$contents_en[$i],$contents_cn1[$i],$contents_cn2[$i],$contents_ti[$i]
											 );
											 array_push($post_metas, $tmp);
										}
									} ?>
									<?php foreach ($post_metas as $x) { ?>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php echo preg_replace("/( |　)/", "", $x[0] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php echo preg_replace("/( |　)/", "", $x[1] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php echo preg_replace("/( |　)/", "", $x[2] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php echo preg_replace("/( |　)/", "", $x[3] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php echo preg_replace("/( |　)/", "", $x[4] ); ?></h4>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php global $post; echo nl2br($x[5]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php global $post; echo nl2br($x[6]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php global $post; echo nl2br($x[7]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php global $post; echo nl2br($x[8]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php global $post; echo nl2br($x[9]); ?></p>
									<?php } ?>
								</div>
							</div>
						<?php $count++; wp_reset_postdata(); endforeach; endif;?>
					</div>
					<ul class="contentMenu clearfix">
						<?php
							// タクソノミ取得
							$catargs = array(
								'taxonomy'   => 'onsen_taxonomy',
								'parent'     => 8,
								'hide_empty' => 0,
								'orderby'    => 'slug'
							);
							$catlists = get_categories( $catargs );
							foreach($catlists as $cat) : // 取得したカテゴリの配列でループを回す
						?>
						<li><a data-tab="<?php echo $cat->slug ?>" href="javascript:void(0)"><?php echo $cat->name ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div data-menu="surround" class="mainContent surroundContent js-surroundPage">
					<div data-tab="1" class="contentWrapper">
						<h3 class="contentHeadline" data-lang="ja">周辺案内</h3>
						<h3 class="contentHeadline" data-lang="en">Surrounding Area</h3>
						<h3 class="contentHeadline" data-lang="cn1">週邊嚮導</h3>
						<h3 class="contentHeadline" data-lang="cn2">周边向导</h3>
						<h3 class="contentHeadline" data-lang="ti">บริเวณโดยรอบ</h3>
						<?php
						$count = 0;
						$hallPostArg = array(
							'posts_per_page' => 9999,
							'post_type'      => 'surround',  // カスタム投稿タイプ名
							'order'           => 'ASC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'surround_taxonomy',  // カスタムタクソノミー名
									'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
									'terms'    => '1' // タクソノミーに属するターム名
								)
							)
						);
						$hallPosts = get_posts($hallPostArg);
						if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<div class="contentUnit <?php echo ($count%2==0)? "leftImage" : "rightImage"; ?>">
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img src="<?php echo $image_url[0]; ?>" width=<?php echo ($count%2==0)? "270" : "270"; ?>>
								<?php else : ?>
								<?php endif ; ?>
								<div class=<?php echo ($count%2==0)? "pl-300" : "pr-300"; ?>>
									<?php
									$title_ja = get_post_meta($post->ID, "title_ja", false);
									$title_en = get_post_meta($post->ID, "title_en", false);
									$title_cn1 = get_post_meta($post->ID, "title_cn1", false);
									$title_cn2 = get_post_meta($post->ID, "title_cn2", false);
									$title_ti = get_post_meta($post->ID, "title_ti", false);
									$contents_ja = get_post_meta($post->ID, "contents_ja", false);
									$contents_en = get_post_meta($post->ID, "contents_en", false);
									$contents_cn1 = get_post_meta($post->ID, "contents_cn1", false);
									$contents_cn2 = get_post_meta($post->ID, "contents_cn2", false);
									$contents_ti = get_post_meta($post->ID, "contents_ti", false);
									if ($title_ja[0]) {
										$post_metas = array();
										$length = count($title_ja);
										for ($i = 0; $i < $length; $i++) {
											 $tmp = array(
												 $title_ja[$i],$title_en[$i],$title_cn1[$i],$title_cn2[$i],$title_ti[$i],
												 $contents_ja[$i],$contents_en[$i],$contents_cn1[$i],$contents_cn2[$i],$contents_ti[$i]
											 );
											 array_push($post_metas, $tmp);
										}
									} ?>
									<?php foreach ($post_metas as $x) { ?>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php echo preg_replace("/( |　)/", "", $x[0] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php echo preg_replace("/( |　)/", "", $x[1] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php echo preg_replace("/( |　)/", "", $x[2] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php echo preg_replace("/( |　)/", "", $x[3] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php echo preg_replace("/( |　)/", "", $x[4] ); ?></h4>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php global $post; echo nl2br($x[5]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php global $post; echo nl2br($x[6]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php global $post; echo nl2br($x[7]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php global $post; echo nl2br($x[8]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php global $post; echo nl2br($x[9]); ?></p>
									<?php } ?>
								</div>
							</div>
						<?php $count++; wp_reset_postdata(); endforeach; endif;?>
					</div>
					<div data-tab="2" class="contentWrapper">
						<h3 class="contentHeadline" data-lang="ja">周辺案内</h3>
						<h3 class="contentHeadline" data-lang="en">Surrounding Area</h3>
						<h3 class="contentHeadline" data-lang="cn1">週邊嚮導</h3>
						<h3 class="contentHeadline" data-lang="cn2">周边向导</h3>
						<h3 class="contentHeadline" data-lang="ti">บริเวณโดยรอบ</h3>
						<?php
						$count = 0;
						$hallPostArg = array(
							'posts_per_page' => 9999,
							'post_type'      => 'surround',  // カスタム投稿タイプ名
							'order'           => 'ASC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'surround_taxonomy',  // カスタムタクソノミー名
									'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
									'terms'    => '2' // タクソノミーに属するターム名
								)
							)
						);
						$hallPosts = get_posts($hallPostArg);
						if($hallPosts): foreach ($hallPosts as $post): setup_postdata( $post );?>
							<div class="contentUnit <?php echo ($count%2==0)? "leftImage" : "rightImage"; ?>">
								<?php
								if (has_post_thumbnail()) :
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<img src="<?php echo $image_url[0]; ?>" width=<?php echo ($count%2==0)? "270" : "270"; ?>>
								<?php else : ?>
								<?php endif ; ?>
								<div class=<?php echo ($count%2==0)? "pl-300" : "pr-300"; ?>>
								<?php
									$title_ja = get_post_meta($post->ID, "title_ja", false);
									$title_en = get_post_meta($post->ID, "title_en", false);
									$title_cn1 = get_post_meta($post->ID, "title_cn1", false);
									$title_cn2 = get_post_meta($post->ID, "title_cn2", false);
									$title_ti = get_post_meta($post->ID, "title_ti", false);
									$contents_ja = get_post_meta($post->ID, "contents_ja", false);
									$contents_en = get_post_meta($post->ID, "contents_en", false);
									$contents_cn1 = get_post_meta($post->ID, "contents_cn1", false);
									$contents_cn2 = get_post_meta($post->ID, "contents_cn2", false);
									$contents_ti = get_post_meta($post->ID, "contents_ti", false);
									if ($title_ja[0]) {
										$post_metas = array();
										$length = count($title_ja);
										for ($i = 0; $i < $length; $i++) {
											 $tmp = array(
												 $title_ja[$i],$title_en[$i],$title_cn1[$i],$title_cn2[$i],$title_ti[$i],
												 $contents_ja[$i],$contents_en[$i],$contents_cn1[$i],$contents_cn2[$i],$contents_ti[$i]
											 );
											 array_push($post_metas, $tmp);
										}
									} ?>
									<?php foreach ($post_metas as $x) { ?>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php echo preg_replace("/( |　)/", "", $x[0] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php echo preg_replace("/( |　)/", "", $x[1] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php echo preg_replace("/( |　)/", "", $x[2] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php echo preg_replace("/( |　)/", "", $x[3] ); ?></h4>
										<h4 class="unitHeadline <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php echo preg_replace("/( |　)/", "", $x[4] ); ?></h4>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ja"><?php global $post; echo nl2br($x[5]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="en"><?php global $post; echo nl2br($x[6]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn1"><?php global $post; echo nl2br($x[7]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="cn2"><?php global $post; echo nl2br($x[8]); ?></p>
										<p class="unitSentence <?php echo ($count==2)? "small" : "" ; ?>" data-lang="ti"><?php global $post; echo nl2br($x[9]); ?></p>
									<?php } ?>
								</div>
							</div>
						<?php $count++; wp_reset_postdata(); endforeach; endif;?>
					</div>
					<ul class="contentMenu clearfix">
						<?php
							// タクソノミ取得
							$catargs = array(
								'taxonomy'   => 'surround_taxonomy',
								'parent'     => 13,
								'hide_empty' => 0,
								'orderby'    => 'slug'
							);
							$catlists = get_categories( $catargs );
							foreach($catlists as $cat) : // 取得したカテゴリの配列でループを回す
						?>
						<li><a data-tab="<?php echo $cat->slug ?>" href="javascript:void(0)"><?php echo $cat->name ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div data-menu="menu" class="mainContent menuContent js-menuPage">
					<div data-tab="1" class="contentWrapper">
						<h3 class="contentHeadline">料理</h3>
						<div class="contentUnit leftImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/surround_1.png" width="270">
							<div class="pl-300">
								<h4 class="unitHeadline">スギの大木と水神祠</h4>
								<p class="unitSentence">まっすぐと天に伸びる威容は、見るものを圧倒する迫力です。<br>根本より清流が沸き出していることから、大樹左には水神様も<br>祀られております。<br>一條の歴史を物語る年代不明の神域ゾーンです。</p>
							</div>
						</div>
						<div class="contentUnit rightImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/surround_2.png" width="270">
							<div class="pr-300">
								<h4 class="unitHeadline">いわくありの洞窟</h4>
								<p class="unitSentence">およそ80年程前、当館に突然”働かせて欲しい”と訪れた男性が堅い岩盤を手掘りし、たったひとりで数年がかりで掘り上げた高さ2m、全長およそ15mの洞窟です。<br>第2号源泉として現在、館内の家族風呂および露天風呂に引かれております。</p>
							</div>
						</div>
						<div class="contentUnit leftImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/surround_3.png" width="270">
							<div class="pl-300">
								<h4 class="unitHeadline">市重要文化財のトチの大木</h4>
								<p class="unitSentence">市の重要文化財にも指定されているトチの大木。傍らには渓流も流れ、春の新緑、夏の清涼、秋の紅葉、冬の山水画と、四季折々に風情ある景色を届けてくれます。<br>また、渓流はその瀬音から本館の下を通り抜けているようですが、その流れがどこに続いているのか分からない不思議な川です。</p>
							</div>
						</div>
					</div>
					<div data-tab="2" class="contentWrapper">
						<h3 class="contentHeadline">飲み物</h3>
						<div class="contentUnit leftImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/surround_4.png" width="270">
							<div class="pl-300">
								<h4 class="unitHeadline">国の登録有形文化財に指定されている　一條の蔵</h4>
								<p class="unitSentence">当館ゆかりの文化墨客の書や絵画、古文書および代々伝わる所蔵の古書や美術品等を保存。蔵そのものも一條家の宝です。</p>
							</div>
						</div>
						<div class="contentUnit rightImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/surround_5.png" width="270">
							<div class="pr-300">
								<h4 class="unitHeadline">宮大工による建造　湯神神社</h4>
								<p class="unitSentence">別館の裏手にあります湯神神社は、本館同様、宮大工によって建てられた由緒正しいお社です。<br>鎌先の湯が傷の湯ということから、以前はお客様のお礼参りによる松葉杖やギブス等が奉納されておりました。<br>現在は神社の保存のため、奉納をお断りいたしております。<br>5月には神社のお祭りがあります。</p>
							</div>
						</div>
						<div class="contentUnit leftImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/surround_6.png" width="270">
							<div class="pl-300">
								<h4 class="unitHeadline">天狗の小径</h4>
								<p class="unitSentence">裏山へと続く小径「天狗の相撲場」。<br>全長およ300m、ゆったり歩いて所要時間40分程度。<br>孟宗竹の竹やぶでは春先、愛らしいタケノコも顔を出し、お膳にも登場します。夏のカブト虫、秋の紅葉と季節折々の山の恵の他、種類豊富は山野草にも出会えます。</p>
								<p class="unitExplain mt-10">※一部足元が悪くなっておりますのでご注意のうえ、あらかじめ歩きやすいお履物にて<br>お出かけください。</p>
							</div>
						</div>
					</div>
					<ul class="contentMenu clearfix">
						<li><a data-tab="1" href="javascript:void(0)">料理</a></li>
						<li><a data-tab="2" href="javascript:void(0)">飲み物</a></li>
					</ul>
				</div>
			</div>
			<div class="subColumn">
				<ul class="menuList js-menuList">
					<li data-menu="intro" class="introductionGuide">
						<a href="javascript:void(0)" data-lang="ja">はじめに</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="en">About</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn1">介紹</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn2">介绍</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="ti">บทนำ</a>
					</li>
					<li data-menu="hall" class="hallGuide">
						<a href="javascript:void(0)" data-lang="ja">館内案内</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="en">Accommodations</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn1">館內嚮導 </a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn2">馆内向导 </a>
						<a class="horizontal" href="javascript:void(0)" data-lang="ti">ที่พัก</a>
					</li>
					<li data-menu="onsen" class="onsenGuide">
						<a href="javascript:void(0)" data-lang="ja">温泉案内</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="en">Hot springs</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn1">溫泉嚮導</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn2">温泉向导</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="ti">น้ำพุร้อน</a>
					</li>
					<li data-menu="surround" class="surroundGuide">
						<a href="javascript:void(0)" data-lang="ja">周辺案内</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="en">Surrounding Area</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn1">週邊嚮導</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn2">周边向导</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="ti">บริเวณโดยรอบ</a>
					</li>
					<li data-menu="menu" class="menuGuide">
						<a href="javascript:void(0)" data-lang="ja">メニュー</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="en">Meals</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn1">料理</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="cn2">料理</a>
						<a class="horizontal" href="javascript:void(0)" data-lang="ti">มื้ออาหาร</a>
					</li>
				</ul>
			</div>
		</div>

<?php get_footer();
