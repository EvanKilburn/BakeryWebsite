<?php include_once "[server-link]/inc/functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<?php print_head('Pizza dough recipe', Array("[server-link]/js/jquery-3.5.1.min.js","[server-link]/js/change-quantities.js","[server-link]/js/hide-directions.js", "[server-link]/js/comment-form-validation.js")); ?>	

<body class="column-container">

<?php include_once "[server-link]/inc/header.php"; ?>

<div class="column">
	<main>
		<?php
		$commentText = form_data_submitted(USER_COMMENT_FORM_TEXT, INPUT_POST, FILTER_SANITIZE_STRING);
		if ($commentText){
			?><p class="comment-brown thanks-pad">Thank you for your comment</p> <?php
		}
		?>
		<h1>Pizza Dough</h1>
		
		<p>This is a slightly modified version of King Arthur Flour's <a href="https://www.kingarthurbaking.com/recipes/sourdough-pizza-crust-recipe">Sourdough Pizza Crust</a> that substitutes spelt for wheat.</p>
	
		<section>		
			<h2>Ingredients</h2>
			
			<div class="quantity-button-group">
				<button class="quantity-button" value="1">Single Batch</button>
				<button class="quantity-button" value="2">Double Batch</button>
				<button class="quantity-button" value="3">Triple Batch</button>				
			</div>
			
			<ul>
				<li><span class="quantity" value="1">1</span> cup (give or take) of unfed/discard sourdough starter</li> 
				<li><span class="quantity" value="0.75">&frac34;</span> cup lukewarm water</li>
				<li grocery="Instant or active dry yeast">rounded <span class="quantity" value="0.5">&half;</span> tsp. instant or active dry yeast</li>
				<li><span class="quantity" value="2.5">2&half;</span> cups light spelt flour</li>
				<li><span class="quantity" value="1">1</span> tsp. salt</li>
				<li>A little olive oil</li>
			</ul>	
		</section>
			
		<section>				
			<h2>Directions</h2>
			
			<p>Once a step is complete, click its button to hide it.</p>  
			
			<ol class="directions">
				<li>Turn your oven light on to create a warm place for the pizza dough to rise.</li>
				<li>Separate your starter into two parts: one to feed and one for the pizza dough. You'll need approximately one cup of starter for this recipe; put it in your largest mixing bowl.
					<img src="[server-link]/img/separated_starter.jpeg" alt="Sourdough starter divided into a glass container and a bowl"/>
				</li>
				<li>Pour the warm water over the starter and then sprinkle the yeast over it. (This will give the yeast a bit of a head start.)
					<img src="[server-link]/img/water_and_yeast_added.jpeg" alt="Sourdough starter, water and yeast in a bowl "/>
				</li>
				<li>Add the flour and the salt to the bowl.
					<img src="[server-link]/img/flour_and_salt_added.jpeg" alt="Sourdough starter, water, yeast, flour and salt layered in a bowl"/>
				</li>
				<li>Mix everything together with your hands. It will initially look messy before forming into a good dough.
					<img src="[server-link]/img/mixing_by_hand.jpeg" alt="Partly mixed pizza dough in a bowl"/>
				</li>
				<li>The dough should feel slightly sticky but not really stick to your hands or the counter. Don't be afraid to add a little more flour or water to get the right consistency.
					<img src="[server-link]/img/slightly_sticky_dough.jpeg" alt="Unkneaded dough ball sticking slightly to the counter"/>
				</li>
				<li>Knead the dough for 7 minutes. This is an excellent opportunity to work out any frustration you've been feeling lately. The dough will become smooth and elastic.
					<img src="[server-link]/img/kneaded_dough.jpeg" alt="Smooth dough ball after kneading"/>
				</li>
				<li>Grease your second-largest mixing bowl with olive oil using your hands. Lightly coat the dough in oil as well, put in the bowl and loosely cover it.
					<img src="[server-link]/img/oiled_dough.jpeg" alt="Oiled dough ball in a greased bowl"/>
				</li>
				<li>Loosely cover the bowl, put it in the oven and leave it there for 3-4 hours.
					<img src="[server-link]/img/rising_in_the_oven.jpeg" alt="Bowl loosely topped with a plate in the oven with the light on"/>
				</li>
				<li>The dough will increase in size and become softer. It's now ready to use.
					<img src="[server-link]/img/risen_dough.jpeg" alt="Risen pizza dough in a greased bowl"/>
				</li>
			</ol>
		</section>	
		<?php 
		$commentName = form_data_submitted(USER_COMMENT_FORM_NAME, INPUT_POST, FILTER_SANITIZE_STRING);
		$commentText = form_data_submitted(USER_COMMENT_FORM_TEXT, INPUT_POST, FILTER_SANITIZE_STRING);
		$arrayOfComments = get_user_comments_from_db();
		if ($commentText){
			if (!$commentName){
			 	$commentName = USER_COMMENT_DB_NAME_ANONYMOUS;
			}
			append_user_comment_from_db($arrayOfComments, $commentName, $commentText);

		}
		display_comments($arrayOfComments); 
		if (!$commentText){
		?>
		<section>
			<h2 class="pad-down-16">Post a Comment</h2>
			<form id="db-comment-form" method="Post" action="">
				<div class="row joined pad-down-16">
					<label for="<?= USER_COMMENT_FORM_NAME ?>">Name:</label>
					<input type="text" name="<?= USER_COMMENT_FORM_NAME ?>" id="<?= USER_COMMENT_FORM_NAME ?>" maxlength="100"/> 
				</div>
				<div class="row joined pad-down-16">
					<label for="<?= USER_COMMENT_FORM_TEXT ?>">Comment (Required):</label>
					<textarea type="text" rows="5" name="<?= USER_COMMENT_FORM_TEXT ?>" id="<?= USER_COMMENT_FORM_TEXT ?>"/></textarea> 
				</div>
				<div class="row pad-down-16 hide-button" id="buttpm-div">
					<input id="db-button" type="submit" value="Post" class="submit-button hide-button" disabled="true"/>
				</div>
			</form>
		</section>
	<?php } ?>
	</main>
	
	<?php include_once "[server-link]/inc/footer.php"; ?>
</div> <!-- .column -->

</body>
</html>