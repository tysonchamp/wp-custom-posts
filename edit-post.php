<?php
/*
*editing custom post
*/

// Add Posts Php Functions Here
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
global $wpdb;

$msg = '';

// fetche data using ID
$id = $_GET['pageid'];

if ($_GET['pageid'])
{
	$fetched_data = $wpdb->get_row("SELECT * FROM custom_post WHERE custom_post_id = $id");
}

// update database
if (isset($_POST['submit']))
{
	$title = $_POST['title'];
	$body = $_POST['content'];
	
	$wpdb->query("UPDATE custom_post SET custom_title='$title', custom_body='$body' WHERE custom_post_id='$id'");
	
	$fetched_data = $wpdb->get_row("SELECT * FROM custom_post WHERE custom_post_id = $id");
	
	$msg = '<h3>Post Updated!!</h3>';
}

?>

<?php echo $msg; ?>

<form action="" method="post">
<input type="text" name="title" placeholder="Title" value="<?php echo $fetched_data->custom_title; ?>"><br>

<?php the_editor(''.$fetched_data->custom_body,'content'); ?>
<input type="submit" name="submit">
</form>
