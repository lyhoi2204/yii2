<?php
use yii\helpers\Url;

?>

<nav id="mainnav-container">
				<div id="mainnav">

					<!--Shortcut buttons-->
					<!--================================-->
					<div id="mainnav-shortcut">
						<ul class="list-unstyled">
							<li class="col-xs-4" data-content="Additional Sidebar">
								<a id="demo-toggle-aside" class="shortcut-grid" href="#">
									<i class="fa fa-magic"></i>
								</a>
							</li>
							<li class="col-xs-4" data-content="Notification">
								<a id="demo-alert" class="shortcut-grid" href="#">
									<i class="fa fa-bullhorn"></i>
								</a>
							</li>
							<li class="col-xs-4" data-content="Page Alerts">
								<a id="demo-page-alert" class="shortcut-grid" href="#">
									<i class="fa fa-bell"></i>
								</a>
							</li>
						</ul>
					</div>
					<!--================================-->
					<!--End shortcut buttons-->


					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">
								<ul id="mainnav-menu" class="list-group">
						
									<!--Category name-->
									<li class="list-header">Modules</li>
						
									<!--Menu list item-->
									
						
									<!--Menu list item-->
									<li>
										<a href="<?= Url::to(['news/index']) ?>">
											<i class="fa fa-edit"></i>
											<span class="menu-title">News</span>
											<i class="arrow"></i>
										</a>						
										<!--Submenu-->
									</li>


									<li>
										<a href="<?= Url::to(['type/index']) ?>">
											<i class="fa fa-edit"></i>
											<span class="menu-title">Type</span>
											<i class="arrow"></i>
										</a>						
										<!--Submenu-->
									</li>
									<li>
										<a href="<?= Url::to(['categories/index']) ?>">
											<i class="fa fa-edit"></i>
											<span class="menu-title">Categories</span>
											<i class="arrow"></i>
										</a>						
										<!--Submenu-->
									</li>
									<li>
										<a href="<?= Url::to(['info/index']) ?>">
											<i class="fa fa-edit"></i>
											<span class="menu-title">Info</span>
											<i class="arrow"></i>
										</a>						
										<!--Submenu-->
									</li>


						
									<!--Menu list item-->
									
						
									<!--Menu list item-->
								
						
									<li class="list-divider"></li>
						
									<!--Category name-->
									<li class="list-header">Extra</li>
						
									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-edit"></i>
											<span class="menu-title">INFO</span>
											<i class="arrow"></i>
										</a>						
										<!--Submenu-->
										<ul class="collapse">
											<li><a href="<?= Url::to(['info/index']) ?>">Index</a></li>
											<li><a href="<?= Url::to(['info/index']) ?>">Tạo Mới</a></li>
										</ul>
									</li>
						
									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-envelope"></i>
											<span class="menu-title">Email</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										<ul class="collapse">
											<li><a href="mailbox.html">Inbox</a></li>
											<li><a href="mailbox-message.html">View Message</a></li>
											<li><a href="mailbox-compose.html">Compose Message</a></li>
											
										</ul>
									</li>
						
									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-file"></i>
											<span class="menu-title">Pages</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										<ul class="collapse">
											<li><a href="pages-blank.html">Blank Page</a></li>
											<li><a href="pages-profile.html">Profile</a></li>
											<li><a href="pages-search-results.html">Search Results</a></li>
											<li><a href="pages-timeline.html">Timeline<span class="label label-info pull-right">New</span></a></li>
											<li><a href="pages-faq.html">FAQ</a></li>
											<li class="list-divider"></li>
											<li><a href="pages-404.html">404 Error</a></li>
											<li><a href="pages-500.html">500 Error</a></li>
											<li class="list-divider"></li>
											<li><a href="pages-login.html">Login</a></li>
											<li><a href="pages-register.html">Register</a></li>
											<li><a href="pages-password-reminder.html">Password Reminder</a></li>
											<li><a href="pages-lock-screen.html">Lock Screen</a></li>
											
										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-plus-square"></i>
											<span class="menu-title">Menu Level</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="#">Second Level Item</a></li>
											<li><a href="#">Second Level Item</a></li>
											<li><a href="#">Second Level Item</a></li>
											<li class="list-divider"></li>
											<li>
												<a href="#">Third Level<i class="arrow"></i></a>

												<!--Submenu-->
												<ul class="collapse">
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
												</ul>
											</li>
											<li>
												<a href="#">Third Level<i class="arrow"></i></a>

												<!--Submenu-->
												<ul class="collapse">
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li class="list-divider"></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
												</ul>
											</li>
										</ul>
									</li>

								</ul>


								<!--Widget-->
								<!--================================-->
								<div class="mainnav-widget">

									<!-- Show the button on collapsed navigation -->
									<div class="show-small">
										<a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
											<i class="fa fa-desktop"></i>
										</a>
									</div>

									<!-- Hide the content on collapsed navigation -->
									<div id="demo-wg-server" class="hide-small mainnav-widget-content">
										<ul class="list-group">
											<li class="list-header pad-no pad-ver">Server Status</li>
											<li class="mar-btm">
												<span class="label label-primary pull-right">15%</span>
												<p>CPU Usage</p>
												<div class="progress progress-sm">
													<div class="progress-bar progress-bar-primary" style="width: 15%;">
														<span class="sr-only">15%</span>
													</div>
												</div>
											</li>
											<li class="mar-btm">
												<span class="label label-purple pull-right">75%</span>
												<p>Bandwidth</p>
												<div class="progress progress-sm">
													<div class="progress-bar progress-bar-purple" style="width: 75%;">
														<span class="sr-only">75%</span>
													</div>
												</div>
											</li>
											<li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
										</ul>
									</div>
								</div>
								<!--================================-->
								<!--End widget-->

							</div>
						</div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>