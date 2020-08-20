<?php
$output = $title = $options = $el_class = '';
extract( shortcode_atts( array(
	'title' => __( 'Categories', 'masterstudy' ),
	'options' => '',
	'el_class' => ''
), $atts ) );
$options = explode( ",", $options );
if ( in_array( "dropdown", $options ) ) {
	$atts['dropdown'] = true;
}
if ( in_array( "count", $options ) ) {
	$atts['count'] = true;
}
if ( in_array( "hierarchical", $options ) ) {
	$atts['hierarchical'] = true;
}

$el_class = $this->getExtraClass( $el_class );

$output = '<div class="vc_wp_categories wpb_content_element' . $el_class . '">';
$type = 'WP_Widget_Categories';
$args = array(
	'before_title'  => '<div class="widget_title"><h5>',
	'after_title'   => '</h5></div>'
);

ob_start();
the_widget( $type, $atts, $args );
$output .= ob_get_clean();

$output .= '</div>' . $this->endBlockComment( 'vc_wp_categories' ) . "\n";

echo stm_echo_safe_output($output);