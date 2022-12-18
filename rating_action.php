<?php require_once("config.php");
include("functions.php");
if(isset($_SESSION['login_session'])){ 
	$userid=$_SESSION['userid'];
}
if(isset($_POST['action'])) {

  $postid = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
    $vote_action='like';
insert_vote($userid,$postid,$vote_action,$db);
         break;
  	case 'dislike':
         $vote_action='dislike'; 
insert_vote($userid,$postid,$vote_action,$db);
         break;
  	case 'unlike':
delete_vote($userid,$postid,$db);

	      break;
  	case 'undislike':
  	delete_vote($userid,$postid,$db);
      break;
  	default:
  }
  // execute query to effect changes in the database ...
  echo getRating($postid,$db);
  exit(0);
}
?> 