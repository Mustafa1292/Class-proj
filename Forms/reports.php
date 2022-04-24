<?php 
  include "connnect.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="styles2.css" />
    <title>Reports</title>
</head>

<body>
   <nav id="nav">
      <div class="navTop">
        <div class="navItem">
          <a href="dashboard.php">
            <h1>
              <span style="font-size: 36px; letter-spacing: 10px"
                ><em> UH Post Office </em></span
              >
            </h1>
            <h1><span style="font-size: 20px; letter-spacing: 5px"
                ><em>Data Reports</em></h1>
          </a>
        </div>
      </div>
    </nav> 
    <div>
      <canvas id="myChart" width="10" height="10"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <table class="table">
 <?php 
 $count = "SELECT COUNT(*) FROM users";

$sql_query3 = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
$result=mysqli_query($con, $sql_query3);
$result1=mysqli_query($con, $count);
$rows = mysqli_fetch_row($result1);


 $pack = "SELECT COUNT(*) FROM parcel";
$result2=mysqli_query($con, $pack);
$raw = mysqli_fetch_row($result2);

if($result){
  while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    
  }
}

$sql_query4 = "SELECT * FROM parcel ORDER BY packageID DESC LIMIT 1";
$resultP=mysqli_query($con, $sql_query4);
if($resultP){
  while($row1 = mysqli_fetch_assoc($resultP)){
    $id1 = $row1['packageID'];
    
  }
}

// Grab data for reports


$calc = $rows[0] + 6;
$packs = $raw[0] + 29;
echo'

  <tbody>
    <tr>
      <th scope="row">Total users this quarter</th>
      <td>'.$id.'</td>
      <td>Manager: Dennis</td>
      
    </tr>
    <tr>
      <th scope="row">Active Users</th>
      <td>'.$rows[0].'</td>
      <td>Manager: Kim</td>
      
    </tr>
    <tr>
      <th scope="row">Total packages this quarter</th>
      <td>'.$id1.'</td>
      <td>Manager: David</td>
    </tr>
    <tr>
      <th scope="row">Total active packages</th>
      <td>'.$raw[0].'</td>
      <td>Manager: Sidney</td>
    </tr>
    <tr>
      <th scope="row">Total revenue this quarter</th>
      <td> 5.49</td>
      <td>Manager: Dave</td>
    </tr>
    
  </tbody></br>
  </br>';
  
  echo "<h3>For our last quarter we had "," $calc total users and $packs total packages shipped</h3>";
  $totalQuartUser = intval($id);
  $totalActiveUser = intval($row[0]);
  $totalQuarterPackages = intval($id1);
  $totalActivePackages = intval($raw[0]);
  $sql = "INSERT INTO otherReport (totalQuartUser, totalActiveUser, totalQuarterPackages, totalActivePackages)
  VALUES ($totalQuartUser, $totalActiveUser, $totalQuarterPackages, $totalActivePackages)";
  // totalQuartUser	totalActiveUser	totalQuarterPackages	totalActivePackages
  $arr[]=[$totalQuartUser, $totalActiveUser, $totalQuarterPackages, $totalActivePackages];


  const val1='<?php echo $totalQuarterUser; ?>';
  const val2='<?php echo $totalActiveUser; ?>';
  const val3='<?php echo $totalQuarterPackages; ?>';
  const val4='<?php echo $totalActivePackages; ?>';
  const arrayEncode='<?php echo json_encode($arr) ?>';
  if (mysqli_query($con, $sql)) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

  mysqli_close($con);

  ?>
</table>

<script>
  const labels = [
    'Total Quarter Users',
    'Total Active Users',
    'Total Quarter Packages',
    'Total Active Packages',
    'Total Revenue this quarter',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Report Information',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: '<?php echo json_encode($arr) ?>',
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</body>
</html>
