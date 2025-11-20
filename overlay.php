<style type="text/css">
	#overlay-ad .image{
		position: relative;
	}

	#overlay-ad{
		position: fixed;
		text-align: center;
		top: 0;
		right: 0;
		height: 100%;
		width: 100%;
		z-index: 9999;
		min-height: 400px;
	}
	#overlay-ad .wrap{
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-align-items: center;
		align-items: center;
		justify-content: center;
		height: 100vh;
	}
	#overlay-ad:before{
		content: '';
		position: fixed;
		width: 100%;
		height: 100%;
		left: 0;
		top: 0;
		background: rgba(0, 0, 0, 0.8);
	}
	#overlay-ad .icon-close{
		color: #fff;
		cursor: pointer;
		float: right;
		width: 28px;
		height: 28px;
		border: 1px solid #fff;
		position: absolute;
		top: -2px;
		right: 5px;
		border-radius: 50%;
		line-height: 1.8;
		background: #ff0000;
		font-weight: bold;
		font-size: 0.9em;
	}
	.icon-close span{
		position: absolute;
		font-size: 0.8em;
		left: 8px;
		top: 3px;
	}

</style>

<?php
        
        // $con = mysqli_connect('mysqlsvr83.world4you.com', 'sql2907834', '5cf4r*eg', '5669563db1');
        // $con = mysqli_connect('localhost', 'root', '', 'jayo');

	// Read database connection details from the text file
	    $databaseFile = 'database_connect.txt';
	    $lines = file($databaseFile, FILE_IGNORE_NEW_LINES);

	    if (!$lines || count($lines) !== 4) {
	        die("Error reading database connection details.");
	    }

	    $host = $lines[0];
	    $username = $lines[1];
	    $password = $lines[2];
	    $database = $lines[3];

	    // Establish the database connection
	    $con = mysqli_connect($host, $username, $password, $database);
	    if (!$con) {
	        die("Database connection failed: " . mysqli_connect_error());
	    }

        $p_0 = " select * from banner";

		$result = mysqli_query($con, $p_0);
		// echo $result;
		$row_count = mysqli_num_rows($result);
    ?>

<div id="overlay-ad" onclick="hideOverlay()">
	<div class="wrap">
		<div class="image">
			<h2 class="text-primary m-0">Up comming Event</h2>
			<div class="text-center bg-lightgray">
				<?php
					for($i=1; $i<=$row_count; $i++)
					{
					    $row = mysqli_fetch_array($result);
				?>
				<a target="_blank" href="Events.php?event=<?php echo $row["event_start"]; ?>" >
					<img class="img-responsive" src="img/events/<?php echo $row["imgname"]; ?>" style="width: 300px;">
				</a>
				<?php
				    }
				?>
			</div>
			<i class="icon-close" onclick="hideOverlay()">
				<span>X</span>
			</i>
		</div>
	</div>
</div>

<script>
	function hideOverlay(){
		document.getElementById('overlay-ad').style.display = 'none' ;
	}
</script>

