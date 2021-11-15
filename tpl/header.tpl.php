<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title><?php echo $title ?></title>
		<link rel="stylesheet" href="/css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<?php if(($status == "loggedIn") && ($userdata['role'] == "user")): ?>
			<?php echo "true"; ?>
		<nav>
 <a href="/"><img src="/images/logo.png" alt="Quwius"></a>
		<ul>
			<li><a href="/courses">Courses</a></li>
			<li><a href="/streams">Streams</a></li>
			<li><a href="/aboutUs">About Us</a></li>
			<li><a href="/logout/logout">LogOut</a></li>
			<li><a href="/profile/">Profile</a></li>
			<li><span id="welcome">Welcome, <?php echo $userdata['name']?></span></li>
		</ul>
	</nav>

<?php elseif(($status == "loggedIn") && ($userdata['role'] == "admin")): ?>
	<nav>
<a href="/"><img src="/images/logo.png" alt="Quwius"></a>
	<ul>
		<li><a href="/courses">Courses</a></li>
		<li><a href="/streams">Streams</a></li>
		<li><a href="/aboutUs">About Us</a></li>
		<li><a href="/logout/logout">LogOut</a></li>
		<li><a href="/dashboard/">dashboard</a></li>
		<li><span id="welcome">Welcome, <?php echo $userdata['name']?></span></li>
	</ul>
</nav>


<?php else : ?>
			<nav>
	 <a href="/"><img src="/images/logo.png" alt="Quwius"></a>
			<ul>
				<li><a href="/courses">Courses</a></li>
				<li><a href="/streams">Streams</a></li>
				<li><a href="/aboutUs">About Us</a></li>
				<li><a href="/login">Login</a></li>
				<li><a href="/signup">Sign Up</a></li>
			</ul>
		</nav>
<?php endif; ?>
