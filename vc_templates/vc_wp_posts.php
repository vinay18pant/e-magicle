<?php
$output = $title = $number = $show_date = $el_class = '';
extract( shortcode_atts( array(
	'title' => __( 'Recent Posts', 'masterstudy' ),
	'number' => 5,
	'show_date' => false,
	'el_class' => ''
), $atts ) );
$atts['show_date'] = $show_date;

$el_class = $this->getExtraClass( $el_class );

$output = '<div class="vc_wp_posts wpb_content_element' . $el_class . '">';
$type = 'WP_Widget_Recent_Posts';
$args = array(
	'before_title'  => '<div class="widget_title"><h5>',
	'after_title'   => '</h5></div>'
);

ob_start();
the_widget( $type, $atts, $args );
$output .= ob_get_clean();

$output .= '</div>' . $this->endBlockComment( 'vc_wp_posts' ) . "\n";

echo stm_echo_safe_output($output);