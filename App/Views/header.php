<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.facebook.com/profile.php?id=100052037622049" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.instagram.com/__leejiann______/" class="topbar-social-item fa fa-instagram"></a>
				</div>

				<span class="topbar-child1" >
                    FREE SHIP ĐƠN HÀNG TỪ 500.000Đ
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						meo.lonton11@gmail.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="/" class="logo">
					<img src="/template/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="/" title="Trang chủ">TRANG CHỦ</a>

							<li>
								<a href="/gioi-thieu" title="Giới thiệu">GIỚI THIỆU</a>
							</li>
								<?php

									$menuPublic = \App\Helpers\Helper::menuAll();
									echo \App\Helpers\Helper::menuPublic($menuPublic);

								?>
							
							<li class="sale-noti">
								<a href="/bai-viet" title="News">NEWS</a>
							</li>

							<li>
								<a href="/gio-hang" title="Giỏ hàng">GIỎ HÀNG</a>
							</li>

							<li>
								<a href="/lien-he" title="Liên Hệ">LIÊN HỆ</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<span class="linedivide1"></span>
					<div class="header-wrapicon2">
						<?php include 'carts/cartSideBar.php'; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.facebook.com/profile.php?id=100052037622049" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.instagram.com/__leejiann______/" class="topbar-social-item fa fa-instagram"></a>
				</div>

				<span class="topbar-child1" >
                    FREE SHIP ĐƠN HÀNG TỪ 500.000Đ
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						meo.lonton11@gmail.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="/" class="logo">
					<img src="/template/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="/" title="Trang chủ">TRANG CHỦ</a>

							<li>
								<a href="/gioi-thieu" title="Giới thiệu">GIỚI THIỆU</a>
							</li>
								<?php

									$menuPublic = \App\Helpers\Helper::menuAll();
									echo \App\Helpers\Helper::menuPublic($menuPublic);

								?>
							
							<li class="sale-noti">
								<a href="/bai-viet" title="News">NEWS</a>
							</li>

							<li>
								<a href="/gio-hang" title="Giỏ hàng">GIỎ HÀNG</a>
							</li>

							<li>
								<a href="/lien-he" title="Liên Hệ">LIÊN HỆ</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<span class="linedivide1"></span>
					<div class="header-wrapicon2">
						<?php include 'carts/cartSideBar.php'; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="/" title="Trang chủ">TRANG CHỦ</a>

					<li>
						<a href="/gioi-thieu" title="Giới thiệu">GIỚI THIỆU</a>
					</li>
						<?php

							$menuPublic = \App\Helpers\Helper::menuAll();
							echo \App\Helpers\Helper::menuPublic($menuPublic);

						?>
					
					<li class="sale-noti">
						<a href="/bai-viet" title="News">NEWS</a>
					</li>

					<li>
						<a href="/gio-hang" title="Giỏ hàng">GIỎ HÀNG</a>
					</li>

					<li>
						<a href="/lien-he" title="Liên Hệ">LIÊN HỆ</a>
					</li>
				</ul>
			</nav>
		</div>
</header>