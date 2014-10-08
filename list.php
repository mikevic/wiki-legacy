<?php
require 'header.php';

//Get Parameters
if(isset($_GET['committee']) && !empty($_GET['committee'])){
	$committee = $_GET['committee'];
} else {
	$committee = 'unset';
}

if(isset($_GET['search']) && !empty($_GET['search'])){
	$search = $_GET['search'];
} else {
	$search = 'unset';
}

if(isset($_GET['page']) && !empty($_GET['page'])){
	$page = $_GET['page'];
	$offset = $page * 20;
} else {
	$page = 'unset';
	$offset = 0;
}

if($page == 'unset'){
	$previous_page = 0;
	$next_page = 2;
} else {
	$previous_page = $page - 1;
	$next_page = $page + 1;
}

$where_query = "";
//Process Parameters
if($committee != 'unset'){
	$where_query .= " AND `committee_id`=$committee";
}

if($search != 'unset'){
	$where_query .= " AND `content_title` LIKE '%$search%'";
}

$next_page_url = http_build_query(array('committee'=>$committee, 'search'=>$search, 'page'=>$next_page));
$previous_page_url = http_build_query(array('committee'=>$committee, 'search'=>$search, 'page'=>$previous_page));

?>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-8">
			<form class="form-inline" role="form">
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Enter Terms" id="search_bar" size="100" name="search" value="<?php if($search != 'unset') {echo $search;}  ?>">
			  </div>
			  <button type="submit" class="btn btn-default">Search</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<span class="text-left"><a href="list.php?<?php echo $previous_page_url; ?>">Previous Page</a></span>
		</div>
		<div class="col-md-2 col-md-offset-8 text-right">
			<span class="text-right"><a href="list.php?<?php echo $next_page_url; ?>">Next Page</a></span>
		</div>
		
		
	</div>
	<table class="table table-striped">
		<tr>
			<td>Wiki Name</td>
			<td>Committee</td>
			<td>Date</td>
		</tr>
<?php
$query = "SELECT * from `basic` WHERE 1 ".$where_query." ORDER BY `last_updated_date` DESC LIMIT $offset, 20";
$result = mysql_query($query);
$no_of_rows = mysql_num_rows($result);
if($no_of_rows!=0){
	while($row = mysql_fetch_assoc($result)){
		echo '<tr>';
		echo '<td><a href="view_wiki.php?id='.$row['content_id'].'">'.$row['content_title'].'</a></td>';
		echo '<td><a href="list.php?committee='.$row['committee_id'].'">'.get_committee($row['committee_id']).'</a></td>';
		echo '<td>'.$row['last_updated_date_display'].'</td>';
		echo '</tr>';
	}
} else  {
	echo '<h2>Unfortunately, your search parameters did not report any results.</h2>';
}
?>
	</table>
		<div class="row">
		<div class="col-md-2">
			<span class="text-left"><a href="list.php?<?php echo $previous_page_url; ?>">Previous Page</a></span>
		</div>
		<div class="col-md-2 col-md-offset-8 text-right">
			<span class="text-right"><a href="list.php?<?php echo $next_page_url; ?>">Next Page</a></span>
		</div>
		
		
	</div>
</div>
<?php
require 'footer.php';
?>