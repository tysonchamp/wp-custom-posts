<?php
// Edit Posts
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
global $wpdb;
$results = $wpdb->get_results( 'SELECT * FROM custom_post');

// print_r($results);

foreach ($results as $result)
{
	echo 'Title: ';	echo $result->custom_title; 
	?>
    <a href="<?php echo site_url();?>/wp-admin/admin.php?page=edit-post&pageid=<?php echo $result->custom_post_id; ?>">Edit</a>
<?php
	echo '<br>';
}

?>
