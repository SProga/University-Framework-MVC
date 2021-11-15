<main>
		<h1>Profile Page</h1>
		<h2>Enrolled Courses</h2>

 <?php if(!empty($userdata['email']) && (!empty($profiledata))): ?>
		<ul class="course-list">
				<?php foreach($profiledata as $data): ?>
					<li><div>
						<a href="#"><img src="../images/<?php echo $data['course_image']?>" alt="course image"></a>
						</div>
						<div>
				<a href="#"><span class="faculty-department"><?php echo $data['faculty_dept_name']?></span>
					<span class="course-title"><?php echo $data['course_name']?></span>
					<span class="instructor"><?php echo $data['instructor_name']?></span></a>
				</div>
				<div>
					<a href="#" class="startnow-btn startnow-button">Go to Class!</a>
					<a href="/unenroll/unenroll/<?php echo $data['course_id']?>" class="startnow-btn unenroll-button">Unenroll</a>
				</div>
			</li>
  <?php endforeach; ?>
<?php else : ?>

	<?php foreach($errors as $error): ?>
	 <div>
   <p id="profileError"><?php echo $error ?> </p>
    <div>
<?php endforeach; ?>
<?php endif; ?>


		</ul>
