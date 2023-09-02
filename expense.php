<?php
// Include your database connection code here
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $user_id = $_SESSION["user_id"];
    $name = $_POST['name'];
    $type = "expense";
    $query = "INSERT INTO categories (user_id, name, type) VALUES ('$user_id', '$name', '$type')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("Location: expense.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $amount = $_POST["amount"];
    $category_id = $_POST["category"];
    $description = $_POST["description"];
    $type = "expense";

    $user_id = $_SESSION["user_id"];

    $query = "INSERT INTO transactions (name, date, amount, category_id, description, user_id, type) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssdisss', $name, $date, $amount, $category_id, $description, $user_id, $type);

    if (mysqli_stmt_execute($stmt)) {
        echo "New expense added successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include './components/head.php'; ?>

<body>
    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col justify-center items-center">
        <?php include('./components/nav.php'); ?>
        <h2 class="mb-4 mt-20 text-3xl tracking-tight font-extrabold text-center text-gray-900 dark:text-gray-50">Expense</h2>
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
                                    <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full pl-10 p-2 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-blue-600 dark:focus:border-blue-600" placeholder="Search">
                                    <input type="submit" class="hidden">
                                </div>
                                <button formaction="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="ml-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Reset</button>
                            </form>
                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button id="addExpenseButton" data-modal-toggle="addExpense" type="button" class="flex items-center justify-center text-gray-50 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-700 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add Expense
                            </button>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Select the modal and the button that opens it
                                    const modal = document.getElementById('addExpense');
                                    const modalButton = document.getElementById('addExpenseButton');

                                    // Function to toggle modal
                                    function toggleModal() {
                                        modal.classList.toggle('hidden');
                                    }

                                    // Add click event listener to button to toggle the modal
                                    modalButton.addEventListener('click', toggleModal);

                                    // Close modal functionality
                                    const closeButton = modal.querySelector('[data-modal-toggle="addExpense"]');
                                    closeButton.addEventListener('click', toggleModal);
                                });
                            </script>
                            <div id="addExpense" tabindex="-1" aria-hidden="true" class="hidden w-full md:w-auto overflow-y-auto overflow-x-hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <!-- Modal header -->
                                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Add Expense
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addExpense">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                <div>
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type Income name" required="">
                                                </div>
                                                <div>
                                                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                                    <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type Income name" required="">
                                                </div>
                                                <div>
                                                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                                    <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$2999" required="">
                                                </div>
                                                <div>
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected="">Select category</option>
                                                        <?php
                                                        $user_id = $_SESSION["user_id"];
                                                        $query = "SELECT category_id, name FROM categories WHERE user_id = $user_id AND type = 'expense'";
                                                        $result = mysqli_query($connection, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo '<option value="' . $row["category_id"] . '">' . $row["name"] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write Income description here"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Add new Income
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button id="addCategoryButton" data-modal-toggle="addCategory" type="button" class="flex items-center justify-center text-gray-50 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-700 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add Category
                            </button>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Select the modal and the button that opens it
                                    const modal = document.getElementById('addCategory');
                                    const modalButton = document.getElementById('addCategoryButton');

                                    // Function to toggle modal
                                    function toggleModal() {
                                        modal.classList.toggle('hidden');
                                    }

                                    // Add click event listener to button to toggle the modal
                                    modalButton.addEventListener('click', toggleModal);

                                    // Close modal functionality
                                    const closeButton = modal.querySelector('[data-modal-toggle="addCategory"]');
                                    closeButton.addEventListener('click', toggleModal);
                                });
                            </script>
                            <div id="addCategory" tabindex="-1" aria-hidden="true" class="hidden w-full md:w-auto overflow-y-auto overflow-x-hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                                <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <!-- Modal header -->
                                        <div class="flex justify-between items-center gap-4 pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Add New Expense Category
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addCategory">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <div class="grid gap-4 mb-4">
                                                <div>
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Expense Category Name</label>
                                                    <input type="text" name="name" id="name" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Expense Category Name" required="">
                                                </div>
                                                <button type="submit" name="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Add Category
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="budgetTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Date</th>
                                    <th scope="col" class="px-4 py-3">Category</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Description</th>
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
                                    $query_condition = "AND transactions.name LIKE '%$escaped_search_term%'";
                                }

                                $query = "SELECT date, categories.name AS category , transactions.name, description, amount FROM budgetbuddy.transactions INNER JOIN budgetbuddy.categories WHERE transactions.user_id = categories.user_id AND transactions.category_id = categories.category_id AND transactions.user_id = $user_id AND transactions.type = 'expense'  $query_condition LIMIT $offset, $items_per_page";
                                $result = mysqli_query($connection, $query);
                                $total_items_query = "SELECT COUNT(*) as total FROM transactions WHERE user_id = $user_id AND type = 'expense' $query_condition";
                                $total_items_result = mysqli_query($connection, $total_items_query);
                                $total_items_row = mysqli_fetch_assoc($total_items_result);
                                $total_items = $total_items_row['total'];

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr class="border-b dark:border-gray-900">';
                                    echo '<td class="px-4 py-3">' . $row["date"] . '</td>';
                                    echo '<td class="px-4 py-3">' . $row["category"] . '</td>';
                                    echo '<td class="px-4 py-3">' . $row["name"] . '</td>';
                                    echo '<td class="px-4 py-3">' . $row["description"] . '</td>';
                                    echo '<td class="px-4 py-3">$' . $row["amount"] . '</td>';
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
                            <a href="?page=<?= $i ?>" class="flex items-center justify-center text-sm py-2 px-3 leading-tight <?= $current_page == $i ? 'bg-blue-50 text-blue-700' : 'text-gray-500 bg-gray-50' ?> border border-gray-300 hover:bg-gray-100 hover:text-gray-900 dark:bg-gray-900 dark:border-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-50"><?= $i ?></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
</body>

</html>