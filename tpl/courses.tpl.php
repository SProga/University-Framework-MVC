<main>
		<h1><?php echo $title ?></h1>
		<ul class="course-list">

			<?php if($userdata['role']=='admin'): ?>
				<a href="#" id="addCourse">Add Course</a>
				<br>
			<?php endif; ?>


			<?php foreach($courses as $key): ?>
			<li><div>
				<a href="#"><img src="<?php echo "../../images/".$key['course_image']?>" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department"><?php echo $key['faculty_dept_name'] ?></span>
					<span class="course-title"><?php echo $key['course_name'] ?></span>
					<span class="instructor"><?php echo $key['instructor_name'] ?></span></a>
				</div>
				<div>
					<?php if($userdata['role']=='admin'): ?>
						<a href="/courses/delete/<?php echo $key['course_id']?>" class="deletebtn">Delete Course</a>
					<?php endif; ?>
				<?php if($userdata['role']!='admin'): ?>
					<p>Get Curious.</p>
				<?php endif; ?>
						<?php if($userdata['role']!='admin'): ?>
					<a href="/profile/start/<?php echo $key['course_id']?>" class="startnow-button startnow-btn">Start Now!</a>
								<?php endif; ?>
				<?php if($userdata['role']=='admin'): ?>
					<a href="#" class="startnow-button startnow-btn">Edit Course</a>
				<?php endif; ?>

				</div>
				</li>
			<?php endforeach; ?>




		</ul>
