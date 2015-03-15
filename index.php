<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kickin";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "SELECT DID, Name FROM dogroups";
$result = $conn->query($sql);

$sql2 = "SELECT PID, FirstName FROM persons";
$result2 = $conn->query($sql2);

$sql3 = "SELECT PID, DID, Rank FROM ranking";
$result3 = $conn->query($sql3);

?>

<html>
<head>
<link href="style.css" rel="stylesheet" />
<meta charset=utf-8 />
<title>Family tree</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cytoscape.github.io/cytoscape.js/api/cytoscape.js-latest/cytoscape.min.js"></script>
<script>
$(function(){ // on dom ready

var cy = cytoscape({
  container: document.getElementById('cy'),
  
  style: cytoscape.stylesheet()
    .selector('node')
      .css({
        'background-color': '#ff9900',
        'content': 'data(name)'
      })
    .selector('edge')
      .css({
        'target-arrow-shape': 'triangle',
        'width': 4,
        'line-color': '#ddd',
        'target-arrow-color': '#000'
      })
    ,
  
  elements: {
      nodes: [
<?php	  
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "{ data: { id: 'd" . $row["DID"]. "', name:'" . $row["Name"]. "' } },";
		
    }
} else {
    echo "0 results";
}
if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo "{ data: { id: 'p" . $row2["PID"]. "', name:'" . $row2["FirstName"]. "' } },";
		
    }
} else {
    echo "0 results";
}

 ?>
      ], 
      
      edges: [
	  
	  
	  <?php	  
        if ($result3->num_rows > 0) {
    // output data of each row
	$counter = 1;
    while($row3 = $result3->fetch_assoc()) {
		
		if ($row3["Rank"] == "Kiddo")
		{
		
        echo "{ data: { id: 'l" . $counter ."', source: 'd" . $row3["DID"] ."', target: 'p" . $row3["PID"] ."' } },";
		}
		else
		{
		echo "{ data: { id: 'l" . $counter ."', source: 'p" . $row3["PID"] ."', target: 'd" . $row3["DID"] ."' } },";
		}
		$counter = $counter + 1;
    }
} else {
    echo "0 results";
}

 ?>
        
      ]
    },
  
  layout: {
    name: 'grid',
    directed: true,
    padding: 10,
	animate             : true,

  // Number of iterations between consecutive screen positions update (0 -> only updated on the end)
  refresh             : 4,
  }
});
  


}); // on dom ready

</script>
</head>
<body>
<div id="cy"></div>
</body>
</html>