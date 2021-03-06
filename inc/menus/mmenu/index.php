<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />

		<title>mmenu light demo</title>

		<link type="text/css" rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="page">
			<div class="header">
				<a href="#menu"><span></span></a>
				Demo
				<nav id="menu">
					<ul>
						<li class="Selected"><a href="#">Home</a></li>
						<li><span>About us</span>
							<ul>
								<li><a href="#about/history">History</a></li>
								<li><span>The team</span>
									<ul>
										<li><a href="#about/team/management">Management</a></li>
										<li><a href="#about/team/sales">Sales</a></li>
										<li><a href="#about/team/development">Development</a></li>
									</ul>
								</li>
								<li><a href="#about/address">Our address</a></li>
							</ul>
						</li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</nav>
			</div>

			<div class="content">
				<p><strong>This is a demo.</strong><br />
					Click the hamburger icon to open the menu.</p>
			</div>
		</div>

		<script src="mm_script.js"></script>
		<script>
			var menu = new MmenuLight(
				document.querySelector( '#menu' ),
				'all'
			);

			var navigator = menu.navigation({
				 selectedClass: 'Selected',
				 slidingSubmenus: true,
				theme: 'dark',
				 title: 'Menu'
			});

			var drawer = menu.offcanvas({
				 position: 'left'
			});

			//	Open the menu.
			document.querySelector( 'a[href="#menu"]' )
				.addEventListener( 'click', evnt => {
					evnt.preventDefault();
					drawer.open();
				});

		</script>
	</body>
</html>
