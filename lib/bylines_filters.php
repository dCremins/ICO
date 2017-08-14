<?php
namespace ICO\Bylines;
use Bylines\Objects\Byline;


function get_the_bylines_posts_link() {
  if (class_exists( 'Bylines\Objects\Byline' )) {
  	return bylines_render( get_bylines(), function( $byline ) {
  		$link = is_a( $byline, 'WP_User' ) ? get_author_posts_url( $byline->ID ) : $byline->link;
  		$args = array(
  			'before_html' => '',
  			'href' => $link,
  			'rel' => 'author',
  			// translators: Posts by a given author.
  			'title' => sprintf( __( 'Posts by %1$s', 'bylines' ), apply_filters( 'the_author', $byline->display_name ) ),
  			'class' => 'author url fn',
  			'text' => apply_filters( 'the_author', $byline->display_name ),
  			'after_html' => '',
  		);
  		/**
  		 * Arguments for determining the display of bylines with posts links
  		 *
  		 * @param array  $args   Arguments determining the rendering of the byline.
  		 * @param Byline $byline The byline to be rendered.
  		 */
  		$args = apply_filters( 'bylines_posts_links', $args, $byline );
  		$single_link = sprintf(
  			'<a href="%1$s" title="%2$s" class="%3$s" rel="%4$s">%5$s</a>',
  			esc_url( $args['href'] ),
  			esc_attr( $args['title'] ),
  			esc_attr( $args['class'] ),
  			esc_attr( $args['rel'] ),
  			esc_html( $args['text'] )
  		);
  		return $args['before_html'] . $single_link . $args['after_html'];
  	} );
  }
}
