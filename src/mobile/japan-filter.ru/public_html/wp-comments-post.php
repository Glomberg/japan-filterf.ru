<?php
/**
 * Handles Comment Post to WordPress and prevents duplicate comment posting.
 *
 * @package WordPress
 */

if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
	header('Allow: POST');
	header('HTTP/1.1 405 Method Not Allowed');
	header('Content-Type: text/plain');
	exit;
}

/** Sets up the WordPress Environment. */
require( dirname(__FILE__) . '/wp-load.php' );

require_once $_SERVER['DOCUMENT_ROOT'].'/roistatSend.php';
$title="";
if($_POST['comment_post_ID'] == '51') {
    $title = 'Форма "Оставить отзыв"';
} else if($_POST['comment_post_ID'] == '48'){
    $title = 'Форма "Задать вопрос"';
}
$product[] = array(
    'uuid'     =>'df842c40-532f-11e6-7a69-93a70008f26a',
    'count'    => '1',
    'discount' => '0',
    'vat'      => '0',
    'sum'      => '0',
);
$comment = 'Комментарий: '.$_POST['comment']."\r\n";
$rs = new roistatSend($title, $comment, $_POST['author'], $_POST['email'], '', '');
$rs->send($product);

nocache_headers();

$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
if ( is_wp_error( $comment ) ) {
	$data = $comment->get_error_data();
	if ( ! empty( $data ) ) {
		wp_die( $comment->get_error_message(), $data );
	} else {
		exit;
	}
}

$user = wp_get_current_user();

/**
 * Perform other actions when comment cookies are set.
 *
 * @since 3.4.0
 *
 * @param WP_Comment $comment Comment object.
 * @param WP_User    $user    User object. The user may not exist.
 */
do_action( 'set_comment_cookies', $comment, $user );

$location = empty( $_POST['redirect_to'] ) ? get_comment_link( $comment ) : $_POST['redirect_to'] . '#comment-' . $comment->comment_ID;

/**
 * Filter the location URI to send the commenter after posting.
 *
 * @since 2.0.5
 *
 * @param string     $location The 'redirect_to' URI sent via $_POST.
 * @param WP_Comment $comment  Comment object.
 */
$location = apply_filters( 'comment_post_redirect', $location, $comment );

wp_safe_redirect( $location );
exit;
