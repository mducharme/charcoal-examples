<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

$all = glob('examples/*.php');

?>
<!doctype html>
<html>
<head>
	<title>Charcoal Examples</title>
	<style type="text/css">
	.source {
		background-color:#eee;
		color:#666;
		overflow:auto;
		height:460px;
	}

	.output {

	}
	</style>
</head>

<body>

<?php
foreach($all as $f) {
?>

	<section>

	<h2>Running "<?php echo $f; ?>"...</h2>

	<pre class="source">
	<code>
	
<?php echo htmlentities(file_get_contents($f))."\n"; ?>
	
	</code>
	</pre>
	

	
	<div class="output">
	<?php
	$start_time = microtime(true);
	echo system('php '.$f);
	$end_time = microtime(true);
	?>
	</div>

	<small>Example ran in <?php echo (($end_time - $start_time)*1000); ?>	 milliseconds</small>
	
	</section>
<?php
}
?>

</body>
</html>