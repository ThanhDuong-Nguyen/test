<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(uploads/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center" style="text-decoration-line:underline !important">
            <?=$title?>
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-7 p-b-10" style="border-right: 2px solid #f3f3f3;">
					<div class="p-r-0-lg">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1256.2976935504623!2d106.68451305322117!3d20.849013648462545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1627285713561!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>

				<div class="col-md-5 p-b-10" style="border: 1px solid #f3f3f3;">
					<form class="leave-comment" action="/admin/contact/add" method="POST">
					<?php include _VIEW_ . '/alert.php'; ?>
						<h4 class="m-text26 p-b-36 p-t-15">
							Liên Hệ Với Chúng Tôi
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Tên Anh/Chị" require>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Số điện thoại" require>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Địa chỉ Email">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Nội dung"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Gửi
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>