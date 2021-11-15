
<div id="streams-lead-in">
		<h1>Take specialized courses<br>
				Earn Streams Certifications</h1>
		</div>
		<header id="streams-header"></header>
		<main class="streams">
			<div class="centered">

				<?php foreach($streams as $stream): ?>
				<section class="streams">
				<a href="#"><img src="../images/<?php echo $stream['stream_image']?>" alt="Data Science Stream" title="Data Scientist">
				<span class="course-title padded"><?php echo $stream['stream_name']?></span>
				<span class="padded"><?php echo $stream['instructor_name']?></span></a>
        <br>

				<article class="editstream">
				<?php if($userdata['role']=='admin'): ?>
					<a href="#" style="color:white;">Edit Stream</a>
				<?php endif; ?>
		  	</article>

				<article class="deletestream">
				<?php if($userdata['role']=='admin'): ?>
					<a href="#" style="color:white;">Delete Stream</a>
				<?php endif; ?>
				</article>

				</section>
   			<?php endforeach; ?>

				</div>
