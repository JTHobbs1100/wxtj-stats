<!-- Resources used: https://www.php.net/manual/en/function.fgetcsv.php -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">  
    
  <title>WXTJ Testing</title>
</head>
<body>
  
  <h1>WXTJ Stats</h1>

  <?php
  $filepath = "./data/playlist.csv";
  $max_songs = 40;
  $max_artists = 40;
  $row = 1;
  $songs = array();
  $artists = array();
  if (($handle = fopen($filepath, "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          if(!empty($data[2])){
            $songs[$data[2]] += 1;
          }
          if(!empty($data[4])){
            $artists[$data[4]] += 1;
          }
      }
      fclose($handle);
  }
  asort($songs);
  $songs = array_reverse($songs);
  $songs = array_slice($songs, 0, $max_songs);

  asort($artists);
  $artists  = array_reverse($artists );
  $artists = array_slice($artists, 0, $max_artists);
?>
  <h2>Top Songs:</h2>
  <?php
  $s_rank = 1;
  foreach($songs as $song => $scount){
    echo $s_rank . ": " . $song . ": " . $scount . "<br />";
    $s_rank += 1;
  }
?>
<h2>Top Artists:</h2>
<?php
  $a_rank = 1;
  foreach($artists as $artist => $acount){
    echo $a_rank . ": " . $artist . ": " . $acount . "<br />";
    $a_rank += 1;
  }
?>



</body>
</html>
