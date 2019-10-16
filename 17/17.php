<?php
	$items = ['where', 'is', 'my', 'money'];
	$sum = 0;

	for ($i = 0; $i < 100; $i++)
	{
		if ($i % 3 == 0)
		{
			echo 'Любая непустая строка';
			if ($i % 5 == 0)
			{
				shuffle($items);
			}
		}
		else if ($i % 5 == 0)
		{
			$sum += $i;
		}
	}

	foreach ($items as $item)
	{
		echo $item . ' ';
	}
?>