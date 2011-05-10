<?php
$CI = &get_instance();
$CI->load->library('pagination');
$config['base_url'] = site_url('main/view');
$config['total_rows'] = $total;
$config['per_page'] = $per_page;
$CI->pagination->initialize($config);
?>

<?php $this->load->view('header', array('title' => 'Dalico :: Main')); ?>

<div class='pagination'>
<?php echo $CI->pagination->create_links(); ?>
</div>

<table>
<tr><th>token</th><th>lista</th><th>ort</th></tr>
<?php foreach ($pats as $pat) { ?>
<tr>
	<td><tt><b><?=$pat['token'];?></b></tt></td>
	<td><?=$pat['list']?></td>
	<td><?=$pat['vcs']?></td>
</tr>
<?php } ?>
</table>

<div class='pagination'>
<?php echo $CI->pagination->create_links(); ?>
</div>

<?php $this->load->view('footer'); ?>

