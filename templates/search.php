<!-- Year Search -->
<?php
$return_string .= '<form role="search" method="get" id="sby-searchform" action="'.$page_url.'">';
$return_string .= '<select name="y" id="year" class="postform" style="width:100px;">';
$return_string .= '<option val="0"> — </option>';

global $post;
$query = 'numberposts=-1&category=' . $cat . '&orderby=date&order=DESC';
$myposts =  get_posts($query);

foreach($myposts as $post) {
	$year = get_the_time('Y');
	$groups[] = $year;
}
$groups = array_values( array_unique( $groups ) );

$current_year = "";
if(isset($_GET['y']) && $_GET['y'] != "") $current_year = $_GET['y'];

foreach ( $groups as $group ) {
	$selected = "";
	if($current_year == $group) $selected = "selected";
	$return_string .= '<option value='.$group.' '.$selected.'>'.$group.'</option>';
}

$return_string .= '</select> &nbsp;';
$return_string .= '<input id="searchsubmit" value="Search" type="submit">';
$return_string .= '</form>';
?>
