<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';

$transactions_query = "SELECT * FROM transactions WHERE user_id = " . $_SESSION["user_id"];
$transations_result = mysqli_query($connection, $transactions_query);

$income = [];

$current_month = date("Y-m");

if ($transations_result && mysqli_num_rows($transations_result) > 0) {
    while ($row = mysqli_fetch_assoc($transations_result)) {
        if (substr($row["date"], 0, 7) === $current_month) {
            if ($row["type"] == "income") {
                array_push($income, $row);
            } else {
                array_push($expense, $row);
            }
        }
    }
}

$income_total = 0;

foreach ($income as $transaction) {
    $income_total += $transaction["amount"];
}

$cumulitive_income_date = [];

foreach ($income as $transaction) {
    $date = $transaction["date"];
    if (array_key_exists($date, $cumulitive_income_date)) {
        $cumulitive_income_date[$date] += $transaction["amount"];
    } else {
        $cumulitive_income_date[$date] = $transaction["amount"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>

<body>
    <div class="bg-white dark:bg-gray-900 min-h-screen flex flex-col justify-center items-center">
        <?php include('./components/nav.php'); ?>
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Dashboard</h2>

        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"> $<?php echo $income_total ?></h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Income this month</p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                    12%
                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Dropdown menu -->
                    <a href="income.php" class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Income details
                        <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                let options = {
                    chart: {
                        height: "100%",
                        maxWidth: "100%",
                        type: "area",
                        fontFamily: "Inter, sans-serif",
                        dropShadow: {
                            enabled: false,
                        },
                        toolbar: {
                            show: false,
                        },
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false,
                        },
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            opacityFrom: 0.55,
                            opacityTo: 0,
                            shade: "#1C64F2",
                            gradientToColors: ["#1C64F2"],
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        width: 6,
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: 0
                        },
                    },
                    series: [{
                        name: "Amount",
                        data: [<?php 
                            foreach ($cumulitive_income_date as $date => $amount) {
                            echo $amount . ",";
                        } ?>],
                        color: "#1A56DB",
                    }, ],
                    xaxis: {
                        categories: [<?php 
                            foreach ($cumulitive_income_date as $date => $amount) {
                            echo "'" . $date . "',";
                        } ?>],
                        labels: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                }

                if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("area-chart"), options);
                    chart.render();
                }
            });
        </script>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>