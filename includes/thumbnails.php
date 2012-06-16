<?php

/**
 *	Shows thumbnails in the posts or pages admin panel
 */
if ( !function_exists('nakeme_add_thumbnail') && function_exists('add_theme_support') ) :
	// for post and page
	add_theme_support('post-thumbnails', array( 'post', 'page' ) );
	function nakeme_add_thumbnail_column($cols) {
	    $cols['thumbnail'] = __('Thumbnail', 'nakeme');
	    return $cols;
	}
	function nakeme_add_thumbnail($column_name, $post_id) {
	        $width = (int) 90; // You can change the thumbnails width and height
	        $height = (int) 90;
	        if ( 'thumbnail' == $column_name ) {
	            // thumbnail of WP 2.9
	            $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
	            // image from gallery
	            $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
	            if ($thumbnail_id)
	                $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
	            elseif ($attachments) {
	                foreach ( $attachments as $attachment_id => $attachment ) {
	                    $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
	                }
	            }
	                if ( isset($thumb) && $thumb ) {
	                    echo $thumb;
	                } else {
	                    echo __('None');
	                }
	        }
	}
endif;
add_filter( 'manage_posts_columns', 'nakeme_add_thumbnail_column' );
add_action( 'manage_posts_custom_column', 'nakeme_add_thumbnail', 10, 2 );
