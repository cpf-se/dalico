<?php
// Initialize pagination first, then we can just call create_links() later wherever we want the pagination to appear.

$CI = &get_instance();
$CI->load->library('pagination');

$config['base_url'] = site_url('feed/view');
$config['total_rows'] = $total;
$config['per_page'] = $per_page;

$CI->pagination->initialize($config);
?>

<?php $this->load->view('header', array('title' => "Feed View")); ?>

<div class="pagination">
<?php echo $CI->pagination->create_links(); ?>
</div>

<?php foreach ($items as $item) { ?>
<div class="item">
	<h1><a href="<?=$item['link'];?>"><?=$item['title'];?></a></h1>
	<p><?=$item['text'];?></p>
</div>
<?php } ?>

<div class="pagination">
<?php echo $CI->pagination->create_links(); ?>
</div>

<?php $this->load->view('footer'); ?>

