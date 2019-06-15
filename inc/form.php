		<div class="wrap-cap100">
			<form class="cap100-form validate-form" method="post" action="" enctype="multipart/form-data">
				<?php
				if (isset($error)){ ?>
					<strong><span style="color:red"><?php echo $error;?></span><?php } ?></strong>
				<span class="cap100-form-title">
					Create your Mahocap !
				</span>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Your username is your signature">
					<span class="label-input100">Username *</span>
					<input class="input100" type="text" name="username" placeholder="Enter your username">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" style=" margin-top: 20px">
					<span class="label-input100">Category *</span>
					<select class="input100" name="category" required>
					    <option value="">--Please choose a category--</option>
					    <option value="FoodTF">FoodTF</option>
					    <option value="ASFR">ASFR</option>
					    <option value="OnahoTF">OnahoTF</option>
					</select>
				</div>


				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="A title is required">
					<span class="label-input100">Title *</span>
					<input class="input100" type="text" name="title" placeholder="Your title">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input"  style="margin-top: 40px" data-validate = "You have to upload a picture for your caption">
					<input type="file" name="myFile" id="file-1" class="inputfile inputfile-1" required/>
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="5" height="5" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Victim(s)</span></label>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "You have to write a text for your caption">
					<span class="label-input100">Cap</span>
					<textarea class="input100" name="caption" placeholder="Your cap here... (250 characters min)"></textarea>
				</div>

				<div>
				  	<input type="checkbox" id="scales" name="private" value="1">
				  	<label for="scales">Make your cap private</label>
				</div>

				<div class="container-cap100-form-btn">
					<div class="wrap-cap100-form-btn">
						<div class="cap100-form-bgbtn"></div>
						<button class="cap100-form-btn" name="submit" type="submit">
							Submit my cap !
						</button>
					</div>
				</div>
			</form>
		</div>