<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
	<div class="flex-w p-b-90">
		<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				LIÊN HỆ
			</h4>

			<div>
				<p class="s-text7 w-size27">
					Nếu có bất kỳ câu hỏi nào ? Hãy liên hệ ngay với chúng tôi tại 03/128 Hàng Kênh - Lê Chân - Hải Phòng hoặc gọi ngay (+84) 835 184 789
				</p>

				<div class="flex-m p-t-30">
					<a href="https://www.facebook.com/L2Hofficial" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
				</div>
			</div>
		</div>

		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Danh mục
			</h4>

			<ul>
				<?php if ($menus->num_rows > 0) {
					while ($rows = $menus->fetch_assoc()) { ?>
					<li class="p-b-9">
						<a href="/danh-muc/<?=$rows['slug']?>" class="s-text7">
							<?=$rows['name']?>
						</a>
					</li>
				<?php } } ?>
			</ul>
		</div>

		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Về chúng tôi
			</h4>

			<ul>
				<li class="p-b-9">
					<a href="/gioi-thieu" class="s-text7">
						Giới thiệu
					</a>
				</li>

				<li class="p-b-9">
					<a href="/lien-he" class="s-text7">
						Liên Hệ
					</a>
				</li>
			</ul>
		</div>

		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Hỗ trợ Khách Hàng
			</h4>

			<ul>
				<li class="p-b-9">
					<a href="/bai-viet/huong-dan-chon-size" class="s-text7">
						Hướng dẫn chọn Size
					</a>
				</li>

				<li class="p-b-9">
					<a href="/bai-viet/huong-dan-dat-hang" class="s-text7">
						Hướng dẫn đặt hàng
					</a>
				</li>

				<li class="p-b-9">
					<a href="/bai-viet/chinh-sach-doi-tra" class="s-text7">
						Chính sách đổi trả
					</a>
				</li>

				<li class="p-b-9">
					<a href="/bai-viet/chinh-sach-khach-hang" class="s-text7">
						Chính sách Khách Hàng
					</a>
				</li>
			</ul>
		</div>

		<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				ĐĂNG KÝ NHẬN THÔNG TIN
			</h4>

			<form>
				<div class="effect1 w-size9">
					<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
					<span class="effect1-line"></span>
				</div>

				<div class="w-size2 p-t-20">
					<!-- Button -->
					<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
						ĐĂNG KÝ 
					</button>
				</div>

			</form>
		</div>
	</div>

	<div class="t-center p-l-15 p-r-15">
		<a href="#">
			<img class="h-size2" src="/template/images/icons/paypal.png" alt="IMG-PAYPAL">
		</a>

		<a href="#">
			<img class="h-size2" src="/template/images/icons/visa.png" alt="IMG-VISA">
		</a>

		<a href="#">
			<img class="h-size2" src="/template/images/icons/mastercard.png" alt="IMG-MASTERCARD">
		</a>

		<a href="#">
			<img class="h-size2" src="/template/images/icons/express.png" alt="IMG-EXPRESS">
		</a>

		<a href="#">
			<img class="h-size2" src="/template/images/icons/discover.png" alt="IMG-DISCOVER">
		</a>

		<div class="t-center s-text8 p-t-20">
				© 2021 L2H STORE 
		</div>
	</div>
</footer>

        	<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>



