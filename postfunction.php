<?php
           function logged_in(){
			return (isset($_SESSION['user_id'])) ? true : false; 
		}
		//fetching post from databse
	function posts(){
			global $pdo;
			$query = $pdo->prepare("SELECT * FROM 'posts','users' WHERE id = user_id_p ORDER BY 'post_id' DESC");
			$query->execute();
			return $query->fetchAll();
		}
		//add new post if user post
	 function add_post($user_id,$status){
			global $pdo; 
			$query = $pdo->prepare("INSERT INTO 'posts' ('post_id', 'user_id_p', 'status', 'status_time') VALUES (NULL, ?, ?,  CURRENT_TIMESTAMP)");
			$query->bindValue(1,$user_id);
			$query->bindValue(2,$status);
			$query->execute();
			header('Location: open-book.php');
		}
		//fetch user data by user id
		function user_data($user_id){
			global $pdo;
			$query = $pdo->prepare('SELECT * FROM users WHERE id = ?');
			$query->bindvalue(1,$user_id);
			$query->execute();

			return $query->fetch();
		}
				//timeAgo Function
	 function timeAgo($time_ago){

			$time_ago = strtotime($time_ago);
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($time_elapsed / 60 );
			$hours      = round($time_elapsed / 3600);
			$days       = round($time_elapsed / 86400 );
			$weeks      = round($time_elapsed / 604800);
			$months     = round($time_elapsed / 2600640 );
			$years      = round($time_elapsed / 31207680 );
			// Seconds
			if($seconds <= 60){
			    return "just now";
			}
			//Minutes
			else if($minutes <=60){
			    if($minutes==1){
			        return "one minute ago";
			    }
			    else{
			        return "$minutes minutes ago";
			    }
			}
			//Hours
			else if($hours <=24){
			    if($hours==1){
			        return "an hour ago";
			    }else{
			        return "$hours hrs ago";
			    }
			}
			//Days
			else if($days <= 7){
			    if($days==1){
			        return "yesterday";
			    }else{
			        return "$days days ago";
			    }
			}
			//Weeks
			else if($weeks <= 4.3){
			    if($weeks==1){
			        return "a week ago";
			    }else{
			        return "$weeks weeks ago";
			    }
			}
			//Months
			else if($months <=12){
			    if($months==1){
			        return "a month ago";
			    }else{
			        return "$months months ago";
			    }
			}
			//Years
			else{
			    if($years==1){
			        return "one year ago";
			    }else{
			        return "$years years ago";
			    }
			}
		}
	
?>
