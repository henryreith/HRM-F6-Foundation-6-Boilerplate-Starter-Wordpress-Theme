<?php

function hrm_search_form( $form ) {
    $form = '<form class="input-group" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
	<div class=""><input class="input-group-field" type="text" value="' . get_search_query() . '" placeholder="' . esc_attr__('Search', 'hrm') . '..." name="s" id="s" /></div>
	<div class="input-group-button"><button id="searchsubmit" class="button" type="submit" value="'. esc_attr__('Search', 'hrm') .'"><i class="fa fa-search"></i></button></div>
	</form>';
    return $form;
}
add_filter( 'get_search_form', 'hrm_search_form' );