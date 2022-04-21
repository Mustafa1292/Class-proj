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
    
  </tbody></br>
  </br>';
  
echo "<h3>For our last quarter we had "," $calc total users and $packs total packages shipped</h3>";
  ?>
</table>

<canvas id="myChart" width="400" height="400"></canvas>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


</body>
</html>