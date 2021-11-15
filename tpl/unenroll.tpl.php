<main>

<h1>Are You Sure You Want to Unenroll from this Course?</h1>
		<ul class="course-list">
			<li><div>
				<a href="#"><img src="<?php echo "../../images/".$course[0]['course_image']?>" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department"><?php echo $course[0]['faculty_dept_name'] ?></span>
					<span class="course-title"><?php echo $course[0]['course_name'] ?></span>
					<span class="instructor"><?php echo $course[0]['instructor_name']?></span></a>
				</div>
				<div>
					<a href="/courses" class="startnow-btn startnow-button">Cancel</a>
					<a href="/confirm/confirm/<?php echo $course[0]['course_id']?>" class="startnow-btn unenroll-button">Okay</a>
				</div>
			</li>
		</ul>
