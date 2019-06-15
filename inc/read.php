		<?php
		$rdm_search = $bdd->query("SELECT * FROM captions WHERE category = '".$content_caption['category']."' AND private = 0 AND id != '".$content_caption['id']."' ORDER BY RAND() LIMIT 1");
		if (isset($rdm_search))
			$rdm_result = $rdm_search->fetch_assoc();
		?>
		<table style="border-collapse: separate;border-spacing: 10px">
			<td><img src="uploads/<?php echo $content_caption['image'];?>" style="width: 50em;margin-left: -60px;"></td>
			<td>
		<div class="wrap-cap100">
				<span class="cap100-form-title">
					<?php echo $content_caption['title'];?>
				</span>
				<p style="margin-top: -27px"><?php echo $content_caption['date']." - ".$content_caption['category'];?></p>
					<?php echo $content_caption['caption'];?>
				<em><p style="text-align: right;font-weight: bold;"><?php echo $content_caption['author'];?></p></em>
				<table align="center" style="border-collapse: separate;border-spacing: 60px 20px">
					<?php if (isset($rdm_result)){ 
					?>
					<td><a href="?read=<?php echo $rdm_result['id'];?>">Read another <?php echo $content_caption['category'];?> related story</a></td>
					<?php } ?>
					<td><a href="/">Homepage</a></td>
					<td><a href="http://twitter.com/share?text=<?php echo $content_caption['title']." written by ".$content_caption['author']?>&url=http://mahojin.me?read=<?php echo $content_caption['id'];?>&key=<?php echo $content_caption['salt'];?>&hashtags=mahojin
">Share on Twitter</td>
				</table>
				</div>
			</td>
		</table>