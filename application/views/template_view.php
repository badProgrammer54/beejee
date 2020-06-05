<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script type="text/javascript"></script>
	</head>
	<body>
		<header class="header">
			<div class="container">
				<div class="header_wrap">
					<h1><a class="header_h1" href="/main/">BeeJee</a></h1>
					<?php if(isset($_COOKIE['user'])): ?>
						<a class="auth_link" href="/auth/exit">Выйти</a>
					<?php else: ?>
						<a class="auth_link" href="/auth/">Войти</a>
					<?php endif; ?>
				</div>
			</div>
		</header>
		<section class="section ">
			<div class="container">
				<?php include 'application/views/'.$content_view; ?>
			</div>
		</section>
		
	</body>
</html>