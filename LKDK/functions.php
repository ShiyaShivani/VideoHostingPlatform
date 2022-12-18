<?php 
function userLikesDislikes($postid,$userid,$rating_action,$db)
{
        $sql="SELECT COUNT(*) FROM user_rating WHERE userid=:userid 
        AND postid=:postid AND rating_action=:rating_action";
         $stmt = $db->prepare($sql);
 $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
      $stmt->bindParam(':rating_action', $rating_action, PDO::PARAM_STR);
       $stmt->execute();
$count = $stmt->fetchColumn();
  if ($count > 0) {
    return true;
  }else{
    return false;
  }
}
function getLikesDislikes($postid,$rating_action,$db)
{
     $sql="SELECT COUNT(*) FROM user_rating WHERE postid = :postid AND rating_action=:rating_action";
          $stmt = $db->prepare($sql);
    $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
      $stmt->bindParam(':rating_action', $rating_action, PDO::PARAM_STR);
 $stmt->execute();
        $number_of_rows = $stmt->fetchColumn(); 
        return $number_of_rows;  
}
function insert_vote($userid,$postid,$rating_action,$db){
         $sql="INSERT INTO user_rating(userid, postid, rating_action) 
             VALUES (:userid, :postid, :rating_action) 
             ON DUPLICATE KEY UPDATE rating_action=:rating_action";
     $stmt = $db->prepare($sql); 
       $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
       $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
       $stmt->bindParam(':rating_action', $rating_action, PDO::PARAM_STR);
    $stmt->execute();
      }
      function delete_vote($userid,$postid,$db){
         $sql="DELETE FROM user_rating WHERE userid=:userid AND postid=:postid";
     $stmt = $db->prepare($sql); 
       $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
       $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->execute();
      }
      function getRating($postid,$db)
{
  $rating = array();
     $likes=getLikesDislikes($postid,'like',$db);
     $dislikes=getLikesDislikes($postid,'dislike',$db);
  $rating = [
    'likes' => $likes,
    'dislikes' => $dislikes
  ];
  return json_encode($rating);
}
?> 