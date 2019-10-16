<?php
	/*Я не совсем понял условие этой задачи, поэтому сделал так, как сделал.
	Мне не совсем понятно, зачем нужно придумывать структуру результирующего
	массива, если у нас есть база данных с информацией, и мы можем
	запросами получить информацию и вывести её.
	Если бы данные вместо базы данных хранились в массиве, то тогда нужно
	было бы придумывать структуру массива для более удобного хранения
	данных. Возможно, я просто не так понял условие.*/

	$host = 'localhost';
	$user = 'root';
	$password = 'password';
	$database = 'authors';

	$connection = mysqli_connect($host, $user, $password, $database);

	// Check Connection.
	if (mysqli_connect_errno())
	{
		// Connection Failed.
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}
	else
	{
		// No Errors.

		// Create Query.
		$query = 'SELECT * FROM authors ORDER BY birth_date ASC';

		// Get Result.
		$result = mysqli_query($connection, $query);

		// Fetch Data.
		$authors = mysqli_fetch_all($result, MYSQLI_ASSOC);

		foreach ($authors as $author)
		{
			echo $author['name'] . ' - ' . $author['email'] . ' - ' . $author['birth_date'];
			echo '<br>';
		}

		echo '<br>';

		// Free Result.
		mysqli_free_result($result);

		$query = 'SELECT * FROM books INNER JOIN authors ON books.author_id = authors.id ORDER BY books.year_of_release ASC';

		$query = 'SELECT * FROM authors INNER JOIN books ON authors.id = books.author_id ORDER BY books.year_of_release ASC';

		$result = mysqli_query($connection, $query);

		$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

		foreach ($books as $book)
		{
			echo $book['name'] . ' - ' . $author['name'] . ' - ' . $book['year_of_release'];
			echo '<br>';
		}
			
		// Close Connection.
		mysqli_close($connection);
	}
?>