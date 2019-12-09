<header>
			<div class="container">
				<div class="row">
					<div class="span12">
						<div class="header_inner clearfix">
							<div class="top1"><a href="home_index.php" class="logo">C&emsp;Y&emsp;<span>T&emsp;V</span></a>
							</div>
							
							<div class="top2">
								<div class="menu_top">
									<ul id="menu_top" class="clearfix">
									<li><h5>Welcome，&emsp;{{$memberName}}</h5></li>
									{{if isset($memberLevel)}}
									<li><span>&emsp;</span><h5>餘額:{{$memberWallet}}</h5></h5>
										{{if $memberLevel === 1}}
										<li><a href="../backend/backend.php">後台</a></li>
										{{/if}}
									<li><a href="../backend/member_center.php">會員中心</a></li>
									<li><a href="../backend/buy_index.php">儲值</a></li>
									<li><a  class="logout">Log out</a></li>
									{{else}}
									<li><a href="../templates/signUp.html">Sign Up</a></li>
										<li><a href="../templates/login.html">Log In</a></li>
									{{/if}}

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>