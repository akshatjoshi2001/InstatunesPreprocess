<?php
	$q = $_GET["q"];
	$link = file_get_contents("https://tourneybackend.herokuapp.com/search?q=".urlencode($q));
	if($link[0] == 'h')
	{
		$music = file_get_contents("https://tourneybackend.herokuapp.com/music?id=".urlencode($link));
		if($music[0] != 'h')
		{
			$music = file_get_contents("https://tourneybackend.herokuapp.com/music?id=".$link);
			if($music[0] != 'h')
			{
				die("The song cannot be processed at this time. ");
			}	
		}
		?>
		<audio controls autoplay>
  
  <source src="<?php echo $music; ?>" type="audio/mpeg">
Your browser does not support Instatunes. Please upgrade your browser.
</audio>
<br />
<br />
Liked the song? <a class='btn btn-primary' href='<?php echo $music; ?>' Download it! </a>
<?php		
	}
	else
	{
		die('Song not found :(. Try refining your search.');
	}
	
?>