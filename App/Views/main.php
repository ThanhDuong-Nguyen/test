<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ;?>
</head>
<body >
	
	<!-- Header -->
    <?php include 'header.php' ; ?>
	<?php include _VIEW_ . '/alert.php' ?>
	
	<!-- Content -->
	<?php include _VIEW_ . '/' . $template . '.php' ; ?>

	<!-- Footer -->
    <?php include 'footer.php' ; ?>

    	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});

	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.ordernow').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Đã được thêm vào giỏ hàng !", "success");
			});
		});
	</script>

	<script type="text/javascript" src="/template/vendor/noui/nouislider.min.js"></script>
<!--===============================================================================================-->

	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});

	</script>

	<script src="/template/js/main.js"></script>
	
</body>
</html>
