<?php

include("../configs/connection.php");
include("../configs/isAdmin.php");

$item_id = $conn -> real_escape_string($_POST['id']);

//first all ticket found by item id and make users
// chose any user 
//update in winner table
//delete all tikcets 
// ite is_end yes

$q0 = "SELECT target FROM items WHERE id = $item_id";

$res0 = $conn->query($q0);

$res0 = $res0->fetch_assoc();

$target = $res0['target'];

echo $target;

$q = "SELECT id, user_id FROM tickets WHERE item_id = $item_id";

$res = $conn->query($q);

$count_of_tickets = $res->num_rows;

if($count_of_tickets >= $target){

  $random_index =  rand(0, $count_of_tickets - 1);

  $all_tickets = $res->fetch_all(MYSQLI_ASSOC);

  $winner_ticket = $all_tickets[$random_index];

  $ticket_id = $conn -> real_escape_string($winner_ticket['id']);
  $winner_id = $conn -> real_escape_string($winner_ticket['user_id']);

  $q2 = "INSERT INTO winners (winner_id, item_id, lucky_no) VALUES ($winner_id, $item_id, $ticket_id) ";

  $conn->query($q2);

  $q3 = "DELETE FROM tickets WHERE item_id = $item_id";

  $conn->query($q3);

  $q4 = "UPDATE items SET is_end = 1 WHERE id = $item_id";

  $conn->query($q4);

  header("location:".SITE_URL."winners.php");

}else{
  $_SESSION['msg'] = "Not ready for winner.";
  header("location:".SITE_URL."index.php");
}
?>