<?php
$conn = new mysqli("localhost", "root", "", "hr");

if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$result = $conn->query("SELECT * FROM task3_view");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <style>
        body { font-family: sans-serif; background: #f0fdf4; padding: 20px; }
        h2 { color: #166534; text-align: center; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th { background: #22c55e; color: white; padding: 10px; text-align: left; border: 1px solid #16a34a; }
        td { border: 1px solid #dcfce7; padding: 10px; color: #1f2937; font-size: 13px; }
        tr:nth-child(even) { background: #f9fff9; }
    </style>
</head>
<body>


<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Job Title</th>
        <th>Employment Date <br/>
        Start Date - End Date</th>
        <th>Manager</th>
        <th>Department</th>
        <th>Location</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><strong><?php echo $row['employee_id']; ?></strong></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['job_title']; ?></td>
        <td><?php echo $row['employment_period'] ?: 'N/A'; ?></td>
        <td><?php echo $row['manager'] ?: 'None'; ?></td>
        <td><?php echo $row['department_name']; ?></td>
        <td><?php echo $row['location'] ?: 'N/A'; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
<?php $conn->close(); ?>