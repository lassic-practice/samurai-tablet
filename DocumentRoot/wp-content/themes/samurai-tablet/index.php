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
						<h3 class="contentHeadline lang-thai" data-lang="ti">ข้อควรทราบ เพื่อให้ท่านสามารถใช้บริการของทางเราได้อย่างสบายใจ</h3>
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
									<div class="guideSentence" data-lang="ja"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ja", true ) ); ?></div>
									<div class="guideSentence" data-lang="en"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_en", true ) ); ?></div>
									<div class="guideSentence" data-lang="cn1"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn1", true ) ); ?></div>
									<div class="guideSentence" data-lang="cn2"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_cn2", true ) ); ?></div>
									<div class="guideSentence" data-lang="ti"><?php global $post; echo nl2br(get_post_meta( $post->ID, "contents_ti", true ) ); ?></div>
								</div>
							</li>
							<?php wp_reset_postdata(); endforeach; endif;?>
						</ul>
					</div>
					<div data-tab="2" class="contentWrapper">
						<h3 class="contentHeadline" data-lang="ja">館内を楽しく快適にご利用いただくために</h3>
						<h3 class="contentHeadline" data-lang="en">How to use the facilities comfortably...</h3>
						<h3 class="contentHeadline" data-lang="cn1">为了您可以愉快舒适的居住本旅馆</h3>
						<h3 class="contentHeadline" data-lang="cn2">為了您可以愉快舒適的居住本旅館</h3>
						<h3 class="contentHeadline lang-thai" data-lang="ti">ข้อควรทราบ เพื่อให้ท่านสามารถใช้บริการของทางเราได้อย่างสบายใจ</h3>
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
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/food_1.png" width="270">
							<div class="pl-300">
								<h4 class="unitHeadline">時間を演出する会席料理晩餐は美の３拍子</h4>
								<p class="unitSentence">美の回廊個室料亭匠庵（しょうあん）。美味・会席料理『森の晩餐』。<br>
									そして美酒。この調和こそ湯主一條に多くのお客様がお越しになる理由。<br>
									そして、泊まってよかったと評価していただける大きなポイントの一つです。<br>
									食していただければお分かりいただけますが、この空間でのお食事は、<br>
									まさに非日常。日常の喧騒を忘れさせ、大切な方との豊かな時間を<br>
									お過ごしいただける特別なものなのです。</p>
							</div>
						</div>
						<div class="contentUnit rightImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/food_2.png" width="270">
							<div class="pr-300">
								<h4 class="unitHeadline">『美しくなければ料理じゃない!』</h4>
								<p class="unitSentence">
									料理長　佐藤秀夫　54歳。<br>
									彼の調理人として過ごした時間に妥協という言葉はありません。<br>
									会席料理『森の晩餐』は、まさに料理長　佐藤秀夫の料理への想いを<br>
									表現した作品といえよう。<br>
									『美しくなければ料理じゃない！』首尾一貫した彼のこのポリシーのもと<br>
									年々リピーターを増やし続けるこの料理。見た目の美しさにとどまらず、<br>
									口の中でも芳醇なハーモニーを奏でる数々のコースは湯主一條のお客様<br>
									への想いも伝えてくれる。<br>
									メインの焼き物および鍋物は肉か魚を選ぶことができます。<br>
									料理がスタートしてからオーダーを受け付けますので、<br>
									その時の気分でお選び下さい。
								</p>
							</div>
						</div>
					</div>
					<div data-tab="2" class="contentWrapper">
						<h3 class="contentHeadline">飲み物</h3>
						<div class="contentUnit leftImage">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/food_3.png" width="270">
							<div class="pl-300">
								<h4 class="unitHeadline">時間を演出する会席料理晩餐は美の３拍子</h4>
								<p class="unitSentence">
									湯主一條の考える晩餐とは時間。時間を演出するのが私たち旅館の<br>
									使命であり、湯主一條のもっとも大切にしている事です。<br>
									そして特別な空間で晩餐を演出するのはワイン。<br>
									大切な記念日、特別な休日、友人との語らい、ワインはそういったシーンを<br>
									うまく演出してくれる。クリスマスにシャンパンが抜群に合うのは、<br>
									グラスに注がれたきめ細かな泡が立ち上り芳醇な香りに包み込まれることで、<br>
									華やかな気分になり素敵な時間を演出してくれる。<br>
									ワインを通じて、湯主一條での豊かな滞在時間“時”をお楽しみ下さい。
								</p>
							</div>
						</div>
						<div class="lunchList clearfix">
							<ul>
								<li>
									<h4 class="unitHeadline">ランチメニュー（11:00〜12:30）</h4>
									<p class="unitSentence">
										クロワッサン　サラダ　コーヒー　1,080円<br>
										おくずかけ温麺　1,080円<br>
										冷やし温麺（夏季限定）　1,080円<br>
										おにぎり（鮭・梅・昆布）　１ケ　200円
									</p>
								</li>
								<li>
									<h4 class="unitHeadline">お夜食（22:30迄）</h4>
									<p class="unitSentence">
										お茶漬け　540円<br>
										ご当地限定カップ麺　仙台屋台醤油ラーメン　540円
									</p>
								</li>
								<li>
									<h4 class="unitHeadline">その他（22:30迄）</h4>
									<p class="unitSentence">
										アイスクリーム　540円<br>
										氷（飲食用） 540円<br>
										乾き物　2,700円<br>
										お新香盛り合わせ　2,700円
									</p>
								</li>
							</ul>
						</div>
					</div>
					<div data-tab="3" class="contentWrapper">
						<h3 class="contentHeadline">宮城の地酒</h3>
						<ul class="drinkList">
							<li>
								<h4 class="unitHeadline">勝山<br>
									純米大吟醸　暁［勝山酒造］720ml　¥14,040<br>
									アルコール度数 16%　精米歩合 35%　日本酒度 ±0</h4>
								<p class="unitSentence">
									伊達家御用蔵<br>
									日本最高の純度を誇る「遠心しぼり」により酒と酒粕を分離し、空気に触れず低音で高純度のエッセンスを抽出する手法で譲した、<br>
									今までのあらゆる日本酒の概念を超える次世代のお酒です。高純度の甘味と旨味、綺麗な発酵による酸味と吟醸の香織、<br>
									全てが高次元で一体化したまとまりをお楽しみいただけます。</p>
							</li>
							<li>
								<h4 class="unitHeadline">勝山<br>
									純米吟醸　サファイアラベル［勝山酒造］720ml　¥6,480<br>
									アルコール度数 12%　精米歩合 55%　日本酒度 -4.2</h4>
								<p class="unitSentence">
									アルコール度数　12%　精米歩合　55%　日本酒度　-4.2<br>
									マスクメロンの様な上品な香りと甘くふくよかな米の旨味うぃ表現した低アルコール酒。<br>
									透明感あふれる大人の甘さを感じられる味わい。</p>
							</li>
							<li>
								<h4 class="unitHeadline">綿屋<br>
									純米大吟醸　暁［金の井酒造］720ml　¥6,480　 グラス ¥1,080<br>
									アルコール度数 16.5%　精米歩合 45%　日本酒度 +4</h4>
								<p class="unitSentence">
									美しい酒室ながらも米の旨味をしっかちと感じさせてくれる純米大吟醸です。<br>
									味吟醸と香吟醸の中間にあたりに位置する絶妙のバランスをもった食中向けの大吟醸として最高峰の逸品です。</p>
							</li>
							<li>
								<h4 class="unitHeadline">綿屋<br>
									純米大吟醸　昇り龍［蔵王酒造］ 720ml　¥6,480　グラス ¥1,080<br>
									アルコール度数 16.5%　精米歩合 50%　日本酒度 +3</h4>
								<p class="unitSentence">
									香りは控えめながら、キレのある飲みごたえがあり、満足感を味わえるお酒です。これは絶対「冷や」で！<br>
									ラベルの「昇り龍」は江戸時代後期の画家で、仙台藩伊達家の御用絵師を勤めた菊田伊洲のもの。</p>
							</li>
							<li>
								<h4 class="unitHeadline">阿部勘<br>
									純米吟醸　亀の尾［阿部勘酒造店］720ml　¥5,400　グラス ¥810<br>
									アルコール度数 15%　精米歩合 55%　日本酒度 +4</h4>
								<p class="unitSentence">
									幻の酒米「亀の尾」は偶発的な異変でできたお米で、結実不良の稲の中で倒れずに結実の良い３本の稲穂から栽培されました。<br>
									コクがあり、味わい深い落ち着きを見せるお酒です。<br>
									さまざまな料理に良くあいますのでぜひ食中酒としてお楽しみください。</p>
							</li>
						</ul>
					</div>
					<ul class="contentMenu clearfix">
						<li><a data-tab="1" href="javascript:void(0)">料理1</a></li>
						<li><a data-tab="2" href="javascript:void(0)">料理2</a></li>
						<li><a data-tab="3" href="javascript:void(0)">飲み物</a></li>
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
