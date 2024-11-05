<header class="header dark-bg">
	<div class="toggle-nav">
		<div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
	</div>

	<!--logo start-->
	<a href="indexadmin.php" class="logo">Quản Lí <span class="lite">Dụng Cụ Làm Bánh</span></a>
	<!--logo end-->

	<div class="nav search-row" id="top_menu">
		<ul class="nav top-menu">
			<li>
				<form class="navbar-form">
					<input class="form-control" placeholder="Search" type="text">
				</form>
			</li>
		</ul>
	</div>

	<div class="top-nav notification-row">
		<ul class="nav pull-right top-menu">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<span class="profile-ava">
						<img alt="" src="img/avatar1_small.jpg">
					</span>
					<?php 
						session_start();
					?>
					<span class="username" style="text-transform: uppercase;"><?php echo $_SESSION['username'] ?></span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu extended logout">
					<div class="log-arrow-up"></div>
					<li class="eborder-top">
						<a href="#"><i class="icon_profile"></i> My Profile</a>
					</li>
					<li>
						<a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
					</li>
					<li>
						<a href="../page/component/logout.php"><i class="icon_key_alt"></i> Log Out</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</header>