<?php
require('header.php');
?>
<div id ="container" style="display:flex; justify-content: center;">
    <div class="chart-container" style>
        <section>
            <h1 style=""> NUMBER OF USERS </h1>
                <div style="max-width: 250px;">
                    <canvas id="myChart"></canvas>
                </div>

                <?php
                include('config.php');

                $query = $conn->query("SELECT gender, COUNT(*) as number FROM user_form GROUP BY gender");
                foreach($query as $data){
                    $number[] = $data['number'];
                    $gender[] = $data['gender'];
                }
                ?>

                <script>
                    const data = {
                        labels: [
                            'Female',
                            'Male'
                        ],
                        datasets: [{
                            label: 'Amount',
                            data: <?php echo json_encode($number) ?> ,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }]
                    };

                    const config = {
                        type: 'pie',
                        data: data,
                    };
                    // === include 'setup' then 'config' above ===

                    var myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>
        </section>
    </div>
    <div class="chart-container" style>
        <section>
            <h1 style=""> NUMBER OF USERS </h1>
                <div style="max-width: 250px;">
                    <canvas id="myChart"></canvas>
                </div>

                <?php
                include('config.php');

                $query = $conn->query("SELECT DISTINCT `location`, COUNT(*) as number FROM jobopening GROUP BY `location`");
                foreach($query as $data){
                    $number[] = $data['number'];
                    $location[] = $data['location'];
                }
                ?>

                <script>
                    const data = {
                        labels: [ <?php
                            $query = $conn->query("SELECT `location` FROM jobopening GROUP BY job");
                            while($row = mysqli_fetch_array($query_run))
                            {
                            $location = $row['location'];
                            ?><?php
                            echo "'" . $location . "'";
                            }
                            ?>
                        ],
                        datasets: [{
                            label: 'Amount',
                            data: <?php echo json_encode($number) ?> ,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(209, 48, 150)',
                                'rgb(74, 226, 82)',
                                'rgb(24, 20, 255)',
                                'rgb(112, 6, 211)',
                                'rgb(9, 46, 183)',
                                'rgb(105, 244, 107)',
                                'rgb(214, 153, 83)',
                                'rgb(249, 87, 141)',
                                'rgb(237, 151, 54)',
                                'rgb(112, 53, 206)',
                                'rgb(196, 54, 87)',
                                'rgb(232, 6, 138)',
                                'rgb(68, 163, 252)',
                                'rgb(214, 171, 2)',
                                'rgb(157, 96, 214)',
                                'rgb(106, 237, 132)',
                                'rgb(93, 247, 186)'
                            ],
                            hoverOffset: 4
                        }]
                    };

                    const config = {
                        type: 'pie',
                        data: data,
                    };
                    // === include 'setup' then 'config' above ===

                    var myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>
        </section>
    </div>
</div>
<?php
require('footer.php');
?>