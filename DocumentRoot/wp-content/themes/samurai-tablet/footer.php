<?php
/**
 * The template for displaying the footer
 */

?>
	</div><?php /*wrapper*/ ?>

	<footer class="footer clearfix">
		<ul class="languageUnit clearfix">
			<li class="is-active"><a class="ja" href="javascript:void(0)">日本</a></li>
			<li><a class="en" href="javascript:void(0)">English</a></li>
			<li><a class="cn1" href="javascript:void(0)">簡体</a></li>
			<li><a class="cn2" href="javascript:void(0)">繁体</a></li>
			<li><a class="ti" href="javascript:void(0)"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/thai.png" width="110"></a></li>
		</ul>
		<ul class="btnUnit clearfix">
			<li class="js-returnTop is-active">
				<a href="javascript:void(0)" data-lang="ja">表紙</a>
				<a class="horizontal" href="javascript:void(0)" data-lang="en">Top</a>
				<a class="horizontal" href="javascript:void(0)" data-lang="cn1">首頁</a>
				<a class="horizontal" href="javascript:void(0)" data-lang="cn2">首页</a>
				<a class="horizontal" href="javascript:void(0)" data-lang="ti">ด้านบน</a>
			</li>
			<li>
				<a href="" data-lang="ja">ご予約</a>
				<a class="horizontal" href="" data-lang="en">Reservation</a>
				<a class="horizontal" href="" data-lang="cn1">預約</a>
				<a class="horizontal" href="" data-lang="cn2">预约</a>
				<a class="horizontal" href="" data-lang="ti">การสำรองห้องพัก</a>
			</li>
			<li>
				<a href="">SNS</a>
			</li>
		</ul>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
