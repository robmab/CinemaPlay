<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['check'] = true;

$sql = "SELECT * FROM films";
$result = $connection->query($sql);

$films = array();
$counter = 0;

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $films[$counter]['adult'] = $row['adult'];
    $films[$counter]['backdrop_path'] = $row['backdrop_path'];
    $films[$counter]['genre_ids'] = $row['genre_ids'];
    $films[$counter]['original_language'] = $row['original_language'];
    $films[$counter]['overview'] = $row['overview'];
    $films[$counter]['popularity'] = $row['popularity'];
    $films[$counter]['poster_path'] = $row['poster_path'];
    $films[$counter]['title'] = $row['title'];
    $films[$counter]['video'] = $row['video'];
    $films[$counter]['vote_average'] = $row['vote_average'];
    $films[$counter]['vote_count'] = $row['vote_count'];
    $films[$counter]['release_date'] = date("d-m-Y", strtotime($row['release_date']));

    $counter++;

  }
} else {
  echo "0 results";
}

// Comparison function
/* function compareDates($a, $b) {
  $dateA = strtotime($a['date']);
  $dateB = strtotime($b['date']);
  
  if ($dateA == $dateB) {
     return 0;
  } elseif ($dateA > $dateB) {
     return 1;
  } else {
     return -1;
  }
}

// Sort the multidimensional array using the custom comparison function
usort($films, 'compareDates'); */

/* print_r ($films[30]); */

$_SESSION['films'] = $films;
header("Location:../Views/Index.php");
exit;

?>