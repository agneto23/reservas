<?php

	include 'usuario/cabecera.php'
	
?>


<div class="main">
<section id="content">
		<article class="col1">
			<div class="pad_1">
				<h2>Your Flight Planner</h2>
				<form id="form_1" action="" method="post">
					<div class="wrapper pad_bot1">
						<div class="radio marg_right1">
							<input type="radio" name="name1">Round Trip<br>
							<input type="radio" name="name1">One Way
						</div>
						<div class="radio">
							<input type="radio" name="name1">Empty-Leg<br>
							<input type="radio" name="name1">Multi-Leg
						</div>
					</div>
					<div class="wrapper">
						Leaving From:
						<div class="bg"><input type="text" class="input input1"  onblur="if(this.value=='') this.value='Enter City or Airport Code'" onFocus="if(this.value =='Enter City or Airport Code' ) this.value=''"></div>
					</div>
					<div class="wrapper">
						Going To:
						<div class="bg"><input type="text" class="input input1" value="Enter City or Airport Code" onblur="if(this.value=='') this.value='Enter City or Airport Code'" onFocus="if(this.value =='Enter City or Airport Code' ) this.value=''"></div>
					</div>
					<div class="wrapper">
						Departure Date and Time:
						<div class="wrapper">
							<div class="bg left"><input type="text" class="input input2" value="mm/dd/yyyy " onblur="if(this.value=='') this.value='mm/dd/yyyy '" onFocus="if(this.value =='mm/dd/yyyy ' ) this.value=''"></div>
							<div class="bg right"><input type="text" class="input input2" value="12:00am" onblur="if(this.value=='') this.value='12:00am'" onFocus="if(this.value =='12:00am' ) this.value=''"></div>
						</div>
					</div>
					<div class="wrapper">
						Return Date and Time:
						<div class="wrapper">
							<div class="bg left"><input type="text" class="input input2" value="mm/dd/yyyy " onblur="if(this.value=='') this.value='mm/dd/yyyy '" onFocus="if(this.value =='mm/dd/yyyy ' ) this.value=''"></div>
							<div class="bg right"><input type="text" class="input input2" value="12:00am" onblur="if(this.value=='') this.value='12:00am'" onFocus="if(this.value =='12:00am' ) this.value=''"></div>
						</div>
					</div>
					<div class="wrapper">
						<p>Passenger(s):</p>
						<div class="bg left"><input type="text" class="input input2" value="# passengers" onblur="if(this.value=='') this.value='# passengers'" onFocus="if(this.value =='# passengers' ) this.value=''"></div>
						<a href="#" class="button2" onClick="document.getElementById('form_1').submit()">go!</a>
					</div>
				</form>
				<h2>Recent News</h2>
				<p class="under"><a href="#" class="link1">Nemo enim ipsam voluptatem quia</a><br>November 5, 2010</p>
				<p class="under"><a href="#" class="link1">Voluptas aspernatur autoditaut fjugit</a><br>November 1, 2010</p>
				<p><a href="#" class="link1">Sed quia consequuntur magni</a><br>October 23, 2010</p>
			</div>
		</article>
		<article class="col2 pad_left1">
			<h2>Welcome to our Website!</h2>
			<p class="color1">Air Lines is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. </p>
			<div class="marker">
				<div class="wrapper">
					<p class="pad_bot2"><strong>Aircraft</strong></p>
					<p class="pad_bot2">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione.</p>
				</div>
			</div>
			<div class="wrapper pad_bot2"><a href="#" class="button1">Read More</a></div>
			<div class="marker">
				<div class="wrapper">
					<p class="pad_bot2"><strong>Charters</strong></p>
					<p class="pad_bot2">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
				</div>
			</div>
			<div class="wrapper pad_bot2">
				<a href="#" class="button1">Reservation</a>
				<a href="#" class="button2">Fleet</a>
			</div>
			<div class="wrapper">
				<article class="cols">
					<h2>Our Clients</h2>
					<p><strong>Avero eoset</strong> accusamus et iusto odio dig- nissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
					<p>Atque corrupti quos dolores et quas moles- tias excepturi sint <a href="#">occaecati cupiditate</a> non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
				</article>
				<div class="box1">
					<div class="pad_1">
						<div class="wrapper">
							<p class="pad_bot2">Lorem ipsum dolor sit amet, consectetur adip- isicing elit, sed do eius- mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
							<p><span class="right">Mr. Thomas Lloyd</span>&nbsp;<br></p>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>
 </div>

<?php


	
?>

<?php include 'usuario/piepagina.php' ?>