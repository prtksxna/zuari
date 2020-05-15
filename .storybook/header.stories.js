export default { title: 'Header' };

export const full = () => `<header role="banner" class="header" style="background-image: url()">
		<div class="header__container">
			<div class="header__branding">
								<h1 class="header__title"><a href="http://localhost:8003/" rel="home">Zuari</a></h1>
			</div>
							<p class="header__description">a stream of life</p>
									<nav role="navigation">
				<div class="menu-header-container"><ul id="primary-menu" class="top-navigation"><li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="https://twitter.com/prtksxna">WordPress</a></li>
<li id="menu-item-1070" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1070"><a href="http://github.com/prtksxna">Github</a></li>
<li id="menu-item-4369" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4369"><a href="http://localhost:8003/?page_id=1054">About</a></li>
</ul></div>			</nav><!-- #site-navigation -->
		</div>
	</header>`;

export const small = () => `<header class="header_type_bar" role="banner">
			<h1 class="header_type_bar__title">
				<a href="http://localhost:8003/" rel="home">Zuari</a>
									<span class="header_type_bar__description">— a stream of life</span>
							</h1>
			<nav role="navigation">
				<div class="menu-header-container"><ul id="primary-menu" class="top-navigation top-navigation_type_bar"><li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="https://twitter.com/prtksxna">WordPress</a></li>
<li id="menu-item-1070" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1070"><a href="http://github.com/prtksxna">Github</a></li>
<li id="menu-item-4369" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4369"><a href="http://localhost:8003/?page_id=1054">About</a></li>
</ul></div>			</nav><!-- #site-navigation -->
		</header>`;
