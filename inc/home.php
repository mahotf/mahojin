		<?php
		$bdd = bdd_connect();
		$food_search = $bdd->query("SELECT * FROM captions WHERE category = 'FoodTF' AND private = 0 ORDER BY RAND() LIMIT 1");
		if (isset($food_search))
			$food_result = $food_search->fetch_assoc();
		$asfr_search = $bdd->query("SELECT * FROM captions WHERE category = 'ASFR' AND private = 0 ORDER BY RAND() LIMIT 1");
		if (isset($asfr_search))
			$asfr_result = $asfr_search->fetch_assoc();
		$onaho_search = $bdd->query("SELECT * FROM captions WHERE category = 'OnahoTF' AND private = 0 ORDER BY RAND() LIMIT 1");
		if (isset($onaho_search))
			$onaho_result = $onaho_search->fetch_assoc();
		?>
				<div class="container-cap100-form-btn">
					<div class="wrap-cap100-form-btn">
						<div class="cap100-form-bgbtn"></div>
						<a href="?create" style="width: 600px" class="cap100-form-btn">
							Submit my cap !
						</a>
					</div>
				</div>
				<?php if (isset($food_search) OR isset($asfr_search) OR isset($onaho_search)){ ?>
				<table>
					<?php if (isset($asfr_result)) { ?>
					<td>
						<div class="container-cap100-form-btn">
							<div class="wrap-cap100-form-btn">
								<div class="cap100-form-bgbtn"></div>
								<a href="?read=<?php echo $asfr_result['id'];?>" style="width: 200px" class="cap100-form-btn">
									Random ASFR
								</a>
							</div>
						</div>
					</td>
				<?php }
				if (isset($onaho_result)){ ?>
					<td>
						<div class="container-cap100-form-btn">
							<div class="wrap-cap100-form-btn">
								<div class="cap100-form-bgbtn"></div>
								<a href="?read=<?php echo $onaho_result['id'];?>" style="width: 200px" class="cap100-form-btn">
									Random OnahoTF
								</a>
							</div>
						</div>
					</td>
				<?php }
				if (isset($food_result)){ ?>
					<td>
						<div class="container-cap100-form-btn">
							<div class="wrap-cap100-form-btn">
								<div class="cap100-form-bgbtn"></div>
								<a href="?read=<?php echo $food_result['id'];?>" style="width: 200px" class="cap100-form-btn">
									Random FoodTF
								</a>
							</div>
						</div>
					</td>
					<?php }} ?>
				</table>