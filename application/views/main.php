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
<tr>
<th>Behörighetskod</th>
<th>ID-lista</th>
<th>Dalby&nbsp;1</th>
<th>Dalby&nbsp;2</th>
<th>Dalby&nbsp;3</th>
<th>CRF</th>
<th>IVP</th>
<th>6WT</th>
</tr>
<?php foreach ($pats as $pat) { ?>
<tr>
	<td><tt><b><?=$pat['token']?></b></tt></td>				<!-- Behörighetskod -->
	<td class="right"><?=$pat['list']?> (<?=$pat['vcs']?>)</td>		<!-- ID-lista -->
	<td class="left">							<!-- Dalby 1 -->
<?php
		if ($pat['vcs'] == 'Dalby') {
			echo "\t\t<a href='/pdf.pdf'>" . date('Y-m-d', strtotime($pat['datum'])) . "</a>";
		} else {
			echo "\t\t" . date('Y-m-d', strtotime($pat['datum']));
		}
?></td>
	<td><tt>YYYY-mm-dd</tt></td>						<!-- Dalby 2 -->
	<td class="right"><tt>YYYY-mm-dd</tt></td>				<!-- Dalby 3 -->
	<td class="left"><tt>YYYY-mm-dd</tt></td>				<!-- CRF -->
	<td><tt>YYYY-mm-dd</tt><br /><tt>YYYY-mm-dd</tt></td>			<!-- IVP -->
	<td><tt>YYYY-mm-dd</tt></td>						<!-- 6WT -->
</tr>
<?php } ?>
</table>

<div class='pagination'>
<?php echo $CI->pagination->create_links(); ?>
</div>

<?php $this->load->view('footer'); ?>

