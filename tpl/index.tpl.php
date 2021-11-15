<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1>Most Popular</h1>

<div class="centered">
	<?php foreach($courses as $data): ?>
  	<?php if (((int)$data['course_access_count']) > 300): ?>

				<section>
				<a href="#"><img src="/images/<?php echo $data['course_image'] ?>" alt="First Course" title="<?php echo $data['course_name']?>">
				<span class="course-title"><?php echo $data['course_name']?></span>
				<span><?php echo $data['instructor_name']?></span></a>
				</section>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>

			<h1>Learner Recommended</h1>
			<div class="centered">
				<?php foreach($courses as $data): ?>
			  	<?php if (((int)$data['course_recommendation_count']) > 300): ?>

							<section>
							<a href="#"><img src="/images/<?php echo $data['course_image'] ?>" alt="First Course" title="<?php echo $data['course_name']?>">
							<span class="course-title"><?php echo $data['course_name']?></span>
							<span><?php echo $data['instructor_name']?></span></a>
							</section>
						<?php endif; ?>
					<?php endforeach; ?>
