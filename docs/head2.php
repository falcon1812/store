<!DOCTYPE html>
<html lang="es">
<head>
<title>Cocoa</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/cocoa.ico" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/slicebox.css" />
	<link rel="stylesheet" type="text/css" href="css/custom.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.slicebox.js"></script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53ed47db4b0b9d99" async></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var Page = (function() {
				var $navArrows = $( '#nav-arrows' ).hide(),
					$shadow = $( '#shadow' ).hide(),
					slicebox = $( '#sb-slider' ).slicebox( {
						onReady : function() {
							$navArrows.show();
							$shadow.show();
						},
						orientation : 'r',
						cuboidsRandom : true
					} ),
					init = function() {
						initEvents();
					},
					initEvents = function() {
						$navArrows.children( ':first' ).on( 'click', function() {
							slicebox.next();
							return false;
						} );
						$navArrows.children( ':last' ).on( 'click', function() {
							slicebox.previous();
							return false;
						} );
					};
					return { init : init };
			})();
			Page.init();
		});
	</script>
</head>
