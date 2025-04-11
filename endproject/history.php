<html>
<head>
	<title> History Data </title>
	<style>
		table{
			width: 60%;
			background-color: gold;
			border-collapse: collapse;
			margin: auto;
		}
		th,td{
			border: 1px solid #000;
			padding: 10px;
		}
		th{
			background-color: lightblue;
		}
        .btn {
            display: inline-block;
            margin: 15px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            color: white;
            background: #007bff;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.3s;
        }
        .card {
            background: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: right;
        }
        section {
            text-align: left;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            font-size: 1.25rem;
            margin: 20px auto;
        }
        section:nth-child(odd) {
            background-color: #e0faf4;
        }
        section:nth-child(even) {
            background-color: #b2e7ff;
        }
        header {
            font-family: 'Poppins', sans-serif;
            background-color: #e0faf4;
            color: black;
            padding: 20px 0;
            text-align: center;
            text-shadow: burlywood;
        }
	</style>
</head>
<body>
    <section>
        <header>
            <strong> HISTORY OF ALL TRACKS MADE </strong>
        </header>
    </section>

    <section>
        <?php
            require_once('conn.php');
            
            $sql = "SELECT id, start_point, destination_point, transport_mode, distance, duration, created_at FROM routes";
            $results = $conn->query($sql);
            
            // Display data in html table
            if($results->num_rows > 0) {
                echo "<table>
                    <tr>
                        <th> No. </th>
                        <th> Start Point </th>
                        <th> Destination </th>
                        <th> Transport Mode </th>
                        <th> Distance(KM) </th>
                        <th> Time(Mins) </th>
                        <th> Created on </th>
                    </tr>";
                    
                while($row=$results->fetch_assoc()){
                    echo "
                        <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['start_point'] . "</td>
                            <td>" . $row['destination_point'] . "</td>
                            <td>" . $row['transport_mode'] . "</td>
                            <td>" . $row['distance'] . "</td>
                            <td>" . $row['duration'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                        </tr>
                    ";
                } echo "</table>";
                
            } else {
                echo "No Record found!";
            }
            
            $conn->close();
            
        ?>
    </section>
    <div class="card">
            <button class="btn" onclick="location.href='accessMaps.html'"> Go to Home </button>
        </div>
</body>
</html>