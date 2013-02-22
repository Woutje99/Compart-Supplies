<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width">
	<base href="<?php echo URL::base(); ?>">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <?php echo Asset::styles(); ?>
<head>
<body>
	<?php echo $content; ?>
    <script src="js/vendor/jquery-1.8.0.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <?php echo Asset::scripts(); ?>    
</body>	
</html>