<?php
/*
Plugin Name: Title Sub
Author: Tam Nguyen
Description: Create sub title page,post.
Author URI: https://flex.com.vn
*/

// add sub-title page,post
function create_title_sub(){
	add_meta_box('title-sub','Tạo tiêu đề phụ','title_sub', array ( 'post', 'page'));
}

add_action('add_meta_boxes','create_title_sub');

function title_sub( $post )
{
 $title_sub = get_post_meta( $post->ID, 'title_sub', true );
 
 echo ('<input type="text" id="title_sub" name="title_sub" value="'.esc_attr( $title_sub ).'" />');
}


function title_sub_save( $post_id )
{
 $title_sub = sanitize_text_field( $_POST['title_sub'] );
 update_post_meta( $post_id, 'title_sub', $title_sub );
}
add_action( 'save_post', 'title_sub_save' );


