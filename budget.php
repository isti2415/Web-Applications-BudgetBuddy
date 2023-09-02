<?php
session_start();
include('connection.php');

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $category = $_POST["category"];
    $amount = $_POST["amount"];

    $checkQuery = "SELECT * FROM budget WHERE user_id = $user_id AND category_id = $category";
    $checkResult = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $updateQuery = "UPDATE budget SET amount = $amount WHERE user_id = $user_id AND category_id = '$category'";
        mysqli_query($connection, $updateQuery);
    } else {
        $insertQuery = "INSERT INTO budget (user_id, category_id, amount) VALUES ('$user_id', '$category', '$amount')";
        mysqli_query($connection, $insertQuery);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include './components/head.php'; ?>

<body>
    <div class="bg-white dark:bg-gray-900 pt-20 min-h-screen flex flex-col justify-center items-center">
        <?php include('./components/nav.php'); ?>
        <h2 class="mb-4 md:mt-0 text-3xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Budget</h2>
        <div action="" class="md:w-[80%] w-full px-4 mb-4 max-w-xl lg:px-12 gap-4 flex flex-col md:flex-row justify-between">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="md:w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Budget</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138" />
                        </svg>
                    </div>
                    <input type="text" name="amount" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0">
                </div>
                <select required id="countries" name="category" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a category</option>
                    <?php
                    $user_id = $_SESSION["user_id"];
                    $query = "SELECT category_id, name FROM categories WHERE user_id = $user_id AND type = 'expense'";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row["category_id"] . '">' . $row["name"] . '</option>';
                    }
                    ?>
                </select>
                <button type="submit" class="flex w-full mt-2 items-center justify-center text-gray-50 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Create Budget
                </button>
            </form>
            <div class="md:w-1/2 justify-center items-center p-6 bg-white flex flex-col border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Cumulitive Budget</label>
                <dt class="mb-2 dark:text-gray-50 text-gray-900 text-2xl md:text-3xl font-extrabold">
                    <?php
                    $user_id = $_SESSION["user_id"];
                    $query = "SELECT SUM(amount) as total FROM budget WHERE user_id = $user_id";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo '$' . htmlspecialchars($row['total']);
                    ?>
                </dt>
            </div>
        </div>
        <div class="md:w-[80%] w-full mb-4 max-w-4xl bg-gray-50 shadow dark:bg-gray-900 dark:border-gray-900">
            <!-- Start coding here -->
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-gray-50 dark:bg-gray-900 border dark:border-gray-800 border-gray-200 relative shadow-md rounded-lg overflow-hidden">
                    <div class=" bg-gray-50 dark:bg-gray-800 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" method="GET">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                                </div>
                                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Search</button>
                                <button formaction="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="ml-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Reset</button>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="budgetTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Category</th>
                                    <th scope="col" class="px-4 py-3">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user_id = $_SESSION["user_id"];
                                $items_per_page = 10; // Set the number of items to display per page
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $items_per_page;

                                $search_term = isset($_GET['search']) ? trim($_GET['search']) : '';

                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
                                    $search_term = '';
                                }

                                $query_condition = '';
                                if (!empty($search_term)) {
                                    $escaped_search_term = mysqli_real_escape_string($connection, $search_term);
                                    $query_condition = "AND categories.name LIKE ?";
                                }

                                // Updated query to include JOIN with categories table
                                $query = "SELECT budget.category_id, categories.name as category_name, budget.amount FROM budget 
                                            INNER JOIN categories ON budget.category_id = categories.category_id WHERE budget.user_id = ? $query_condition LIMIT ?, ?";

                                // Using prepared statements
                                $stmt = mysqli_prepare($connection, $query);
                                if ($query_condition) {
                                    $like_term = "%$escaped_search_term%";
                                    mysqli_stmt_bind_param($stmt, 'isii', $user_id, $like_term, $offset, $items_per_page);
                                } else {
                                    mysqli_stmt_bind_param($stmt, 'iii', $user_id, $offset, $items_per_page);
                                }

                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                // For total items
                                $total_items_query = "SELECT COUNT(*) as total FROM budget INNER JOIN categories on budget.category_id = categories.category_id WHERE budget.user_id = ? $query_condition";

                                $stmt_total = mysqli_prepare($connection, $total_items_query);
                                if ($query_condition) {
                                    mysqli_stmt_bind_param($stmt_total, 'is', $user_id, $like_term);
                                } else {
                                    mysqli_stmt_bind_param($stmt_total, 'i', $user_id);
                                }

                                mysqli_stmt_execute($stmt_total);
                                $total_items_result = mysqli_stmt_get_result($stmt_total);
                                $total_items_row = mysqli_fetch_assoc($total_items_result);
                                $total_items = $total_items_row['total'];

                                // Fetch results
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr class="border-b dark:border-gray-900">';
                                    echo '<td class="px-4 py-3">' . htmlspecialchars($row['category_name']) . '</td>';
                                    echo '<td class="px-4 py-3">$' . htmlspecialchars($row['amount']) . '</td>';
                                    echo '</tr>';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                        <!-- Previous page link -->
                        <?php if ($current_page > 1) { ?>
                            <a href="?page=<?= ($current_page - 1) ?>" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-gray-50 rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-900 dark:bg-gray-900 dark:border-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-50">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php } ?>
                        <!-- Page numbers -->
                        <?php for ($i = 1; $i <= ceil($total_items / $items_per_page); $i++) { ?>
                            <a href="?page=<?= $i ?>" class="flex items-center justify-center text-sm py-2 px-3 leading-tight <?= $current_page == $i ? 'bg-blue-50 text-blue-600' : 'text-gray-500 bg-gray-50' ?> border border-gray-300 hover:bg-gray-100 hover:text-gray-900 dark:bg-gray-900 dark:border-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-50"><?= $i ?></a>
                        <?php } ?>
                        <!-- Next page link -->
                        <?php if ($current_page < ceil($total_items / $items_per_page)) { ?>
                            <a href="?page=<?= ($current_page + 1) ?>" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-gray-50 rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-900 dark:bg-gray-900 dark:border-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-50">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#budgetTable').DataTable();
            $('#simple-search').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>

</html>