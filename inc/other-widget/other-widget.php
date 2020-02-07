<?php

function vew_widget_packages() {
	return [
		[
			'id' => 1,
			'priority' => 10,
			'name' => __( 'Recent Posts', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays a list of your most recent posts', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-new-posts.php'
		],
		[
			'id' => 2,
			'priority' => 10,
			'name' => __( 'Profile', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays a your profile', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-profile.php'
		],
		[
			'id' => 3,
			'priority' => 10,
			'name' => __( '3PR area', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays a 3PR area', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-3pr-area.php'
		],
		[
			'id' => 4,
			'priority' => 10,
			'name' => __( 'page content to widget', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays a page contents to widget.', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-page.php'
		],
		[
			'id' => 5,
			'priority' => 10,
			'name' => __( 'Categories/Custom taxonomies list', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays a categories and custom taxonomies list.', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-taxonomies.php'
		],
		[
			'id' => 6,
			'priority' => 10,
			'name' => __( 'archive list', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays a list of archives. You can choose the post type and also to display archives by month or by year.', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-archives.php'
		],
		[
			'id' => 7,
			'priority' => 10,
			'name' => __( 'PR Blocks', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays a circle image or icon font for pr blocks', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-pr-blocks.php'
		],
		[
			'id' => 8,
			'priority' => 10,
			'name' => __( 'child pages list', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'Displays list of child page for the current page.', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-side-child-page-list.php'
		],
		[
			'id' => 9,
			'priority' => 10,
			'name' => __( 'Button', 'vk-all-in-one-expansion-unit' ),
			'description' => __( 'You can set buttons for arbitrary text.', 'vk-all-in-one-expansion-unit' ),
			'include' => 'widget-button.php'
		],
		[
			'id' => 10,
			'priority' => 10,
			'name' => __( 'Banner', 'vk-all-in-one-expansion-unit' ),
			'description' => sprintf( __( 'You can easily set up a banner simply by registering images and link destinations.', 'vk-all-in-one-expansion-unit' ), vkExUnit_get_little_short_name() ),
			'include' => 'widget-banner.php'
		],
	];
}



add_action( 'vew_admin_setting_block', 'veu_widget_admin_enablation_table' );
function veu_widget_admin_enablation_table() {
?>
<h2>Table Enablation</h2>
<table class="wp-list-table widefat plugins" style="width:auto;">
	<thead>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'><label class="screen-reader-text" for="cb-select-all-1"><?php _e( 'Select all', 'vk-all-in-one-expansion-unit' ); ?></label><input id="cb-select-all-1" type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name'><?php _e( 'Function', 'vk-all-in-one-expansion-unit' ); ?></th><th scope='col' id='description' class='manage-column column-description'><?php _e( 'Description', 'vk-all-in-one-expansion-unit' ); ?></th>
		</tr>
	</thead>

	<tbody id="the-list">
		<?php foreach(vew_widget_packages() as $package) : ?>
		<tr>
			<td><input type="checkbox" name="vew_enable_widgets[<?php echo $package['name']; ?>]" id="vew_input_<?php echo $package['name']; ?>" /></td>
			<td><label for="vew_input_<?php echo $package['name']; ?>" ><?php echo $package['name']; ?></label></td>
			<td><?php echo $package['description'] ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>
<br/>
<?php
}


require dirname( __FILE__ ) . '/widget-new-posts.php';
require dirname( __FILE__ ) . '/widget-profile.php';
require dirname( __FILE__ ) . '/widget-3pr-area.php';
require dirname( __FILE__ ) . '/widget-page.php';
require dirname( __FILE__ ) . '/widget-taxonomies.php';
require dirname( __FILE__ ) . '/widget-archives.php';
require dirname( __FILE__ ) . '/widget-pr-blocks.php';
require dirname( __FILE__ ) . '/widget-side-child-page-list.php';
require dirname( __FILE__ ) . '/widget-button.php';
require dirname( __FILE__ ) . '/widget-banner.php';
// require veu_get_directory() . '/inc/other_widget/widget-child-page-list.php';

/*-------------------------------------------*/
/*  color picker
/*-------------------------------------------*/
// color picker js
add_action( 'admin_enqueue_scripts', 'vkExUnit_admin_scripts_color_picker' );
function vkExUnit_admin_scripts_color_picker() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	// カラーピッカー対象class指定 （　外観 > ウィジェット 画面で効かないので一旦コメントアウト ）
	// wp_enqueue_script( 'colorpicker_script', plugins_url( 'js/admin-widget.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
// 外観 > ウィジェット 画面で動作させるために必要
add_action( 'admin_footer-widgets.php', 'print_scripts_pr_color' );
function print_scripts_pr_color() {
	?>
<script type="text/javascript">
(function($){
	function initColorPicker(widget) {
		widget.find( '.color_picker' ).wpColorPicker( {
			change: _.throttle( function() {
				$(this).trigger('change');
			}, 3000 )
		});
	}

	function onFormUpdate(event, widget) {
		initColorPicker(widget);
	}
	$(document).on('widget-added widget-updated', onFormUpdate );
	$(document).ready( function() {
		$('#widgets-right .widget:has(.color_picker)').each( function () {
			initColorPicker( $(this) );
		});
	});
}(jQuery));
</script>
<?php
}

/*-------------------------------------------*/
/*  archives_where
/*-------------------------------------------*/
add_filter( 'getarchives_where', 'vkExUnit_info_getarchives_where', 10, 2 );
function vkExUnit_info_getarchives_where( $where, $r ) {
	global $my_archives_post_type;
	if ( isset( $r['post_type'] ) ) {
		$my_archives_post_type = $r['post_type'];
		$where                 = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
	} else {
		$my_archives_post_type = '';
	}
	return $where;
}

add_filter( 'get_archives_link', 'vkExUnit_rewrite_archives_link' );
function vkExUnit_rewrite_archives_link( $link_html ) {
	global $my_archives_post_type;
	if ( $my_archives_post_type && $my_archives_post_type != 'post' ) {

		$link_url_before = preg_replace( "/^.+<a.+href=\'(.+)\'.+$/is", '$1', $link_html );
		if ( $link_html == $link_url_before ) {
			return $link_html;
		}

		$olink = parse_url( $link_url_before );
		if ( preg_match( '/\/' . $my_archives_post_type . '\/?/', $olink['path'] ) ) {
			return $link_html;
		}

		if ( ! isset( $olink['query'] ) ) {
			$olink['query'] = '';
		}
		parse_str( $olink['query'], $query );
		if ( isset( $query['post_type'] ) && $query['post_type'] ) {
			return $link_html;
		}

		$query['post_type'] = $my_archives_post_type;
		$new_query          = '?' . http_build_query( $query );
		$new_url            = $olink['scheme'] . '://' . $olink['host'] . $olink['path'] . $new_query;

		$link_html = preg_replace( "/href=\'(.+)\'/", "href='" . $new_url . "'", $link_html );
		return $link_html;
	}
	return $link_html;
}
