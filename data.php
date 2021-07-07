<?php
    include("config/db.php");
	if (isset($_POST['getData'])) {
		
		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$sql = $conn->query("SELECT title, description,category FROM posts LIMIT $start, $limit");
		if ($sql->num_rows > 0) {
			$response = "";

			while($data = $sql->fetch_array()) {
				$response .= '
					<div>
						<h2>'.$data['title'].'</h2>
						<p>'.$data['description'].'</p>
                        <p>'.$data['category'].'</p>
					</div>
				';
			}

			exit($response);
		} else
			exit('reachedMax');
	}
?>