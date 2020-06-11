<?php
//modified using
//PHP 7.3.16 (cli) (built: Mar 17 2020 13:32:34) ( NTS MSVC15 (Visual C++ 2017) x64 )
//Copyright (c) 1997-2018 The PHP Group
//Zend Engine v3.3.16, Copyright (c) 1998-2018 Zend Technologies

class Interview
{
	//$title needs to be static
	public static $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

//added check to ensure $_POST['person'] is set before referencing it
$person = isset($_POST['person']) ? $_POST['person'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<!-- $title needed to be changed to static in class Interview and added htmlentities -->
	<h1><?=htmlentities(Interview::$title);?></h1>

	<?php
	// Print 10 times
	//loop in wrong order should be 0 to 10
	for ($i=0; $i<10; $i++) {
		//concatenation was incorrect changed to dots
		//added htmlentities for formatting
		echo '<p>' . htmlentities($lipsum) . '</p>';
	}
	?>


	<hr>


	<!-- change method to post -->
	<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<!-- addded htmlentities for formatting -->
		<p><strong>Person</strong> <?=htmlentities($person['first_name']);?>, <?=htmlentities($person['last_name']);?>, <?=htmlentities($person['email']);?></p>
	<?php endif; ?>


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
				<tr>
					<!-- $person is not an object so it should be accessed by associated references -->
					<!-- added htmlentities for formatting -->
					<td><?=htmlentities($person['first_name']);?></td>
					<td><?=htmlentities($person['last_name']);?></td>
					<td><?=htmlentities($person['email']);?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>