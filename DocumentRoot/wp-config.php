<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'samurai');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'wpadmin');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'fv201000');

/** MySQL のホスト名 */
define('DB_HOST', 'my_mysql');//samurai-cluster.cluster-cassnf6xbkag.ap-northeast-1.rds.amazonaws.com

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');


/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'OKL~BR1m:Ojz2om!sSn$i=n*&=x*CU)V@_S>=%}kUc_Ss5PP=>.`,pJTeU.!Ecs8');
define('SECURE_AUTH_KEY',  ',(hHAU~7,GxAZO^Z}B^X$bI:amGIK.Cc87;*7W6>8`IB/tZT/bs$dizdZxB=Il]+');
define('LOGGED_IN_KEY',    '<GsQmC7_%(rj5nz$T}xCc_t13`,9Onj%v2N]#*Nugg/6RJD=ooQMdV +w)>o8zWV');
define('NONCE_KEY',        'M%9!e<&b#4SpW8&r(/^.}{&&)BXHLmEFccu]0|+kJh9np~X{pX=sb:}AUFiNC;F5');
define('AUTH_SALT',        'Yjzf8:{rg6}{,R}k;f5(VW ZAOcL]WbJFuc>}pw0{MiC6^3o8*1a&099a810hX I');
define('SECURE_AUTH_SALT', 'y2uD!W|~FZtP0K!`<.3~HcnHgYuaV/{[|@mCtpR{<DMot!hU$r4z.xDX3}KnuAFm');
define('LOGGED_IN_SALT',   'I#,CX-(ds4J|N}x-CN^#KKD3[5~i(ua.>R%o-LOF-C/`kjnvafo800Q%GUD}v,VR');
define('NONCE_SALT',       'A4_ b]S  =/hEmXcAk[_CBa&{dGXRht{_.N]EzXsUI,@Et}/2/?}UQ+Rk98XL/Xk');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

#define('WP_ALLOW_MULTISITE', true);
#define('FORCE_SSL_ADMIN', true);
#define('WP_CACHE', true);

define('FS_METHOD', 'ftpsockets');
define('FTP_HOST', 'localhost');
define('FTP_USER', 'kusanagi');
#define('FTP_PASS', '*****');

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
