/**
 * Display 3 Member
 * @author Rasadin
 * @since 1.0.0
 */
function display_three_members() {
	$the_query = new WP_Query( array(
	  	'post_type' => 'members',
	   	'posts_per_page' => 3,
	));
	  if ( $the_query->have_posts() ) : 
		$return_html = '<div class="row member-list">';
	  	foreach( $the_query->posts as $post ): 
		$return_html .= '
		<div class="col-sm-4">
			<div class="webalive-member-post">
					<div class="webalive-member-picture"> <a href=" '.get_the_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID).'</a></div>
				<div class="webalive-member-detail">
					<h3> <a href=" '.get_the_permalink($post->ID).'">'. get_the_title($post->ID).'</a></h3>
					<h4> <a href=" '.get_the_permalink($post->ID).'">'. get_post_meta($post->ID, 'member_designation_title', true ).'</a></h3>
				</div>
			</div>
 		</div>
		'; 
	endforeach;
	$return_html .= '</div>';
	endif;
	// wp_reset_postdata(); 
	return $return_html;

}
 add_shortcode('display_three_members_shortcode', 'display_three_members');
