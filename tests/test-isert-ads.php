<?php
/**
 * Class InsertAdsTest
 *
 * @package Vk_All_In_One_Expansion_Unit
 */
/*
cd $(wp plugin path --dir vk-all-in-one-expansion-unit)
bash bin/install-wp-tests.sh wordpress_test root 'WordPress' localhost latest
 */
/**
 * WidgetPage test case.
 */
class InsertAdsTest extends WP_UnitTestCase {

	function test_vExUnit_Ads_get_option() {
		print PHP_EOL;
		print '------------------------------------' . PHP_EOL;
		print 'test_vExUnit_Ads_get_option' . PHP_EOL;
		print '------------------------------------' . PHP_EOL;
		foreach ( $tests as $key => $test_value ) {
			update_option( 'vkExUnit_Ads', $test_value['option'] );

			$return = vExUnit_Ads::get_option();

			// PHPunit
			$this->assertEquals( $test_value['correct'], $return['post_types'] );
			print PHP_EOL;
			print 'return    :' . $return['post_types'] . PHP_EOL;
			print 'correct   :' . $test_value['correct'] . PHP_EOL;

			// // .php test
			// print '<pre style="text-align:left">';
			// print_r( $return['post_types'] ) . PHP_EOL;
			// print_r( $test_value['correct'] );
			// print '</pre>';

			delete_option( 'vkExUnit_Ads' );
		}
		update_option( 'vkExUnit_Ads', $before_option );
	}
}
