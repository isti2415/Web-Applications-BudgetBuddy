
<nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 w-full" style="z-index: 999;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="index.php" class="flex items-center ">
            <img src="/images/logo.png" class="h-8" alt="BudgetBuddy Logo" />
            <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 dark:text-white">BudgetBuddy</span>
        </a>
        <div class="flex items-center md:order-2">
            <?php
            // Include your database connection code here
            if (isset($_SESSION["user_id"])) {
                echo '
            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="' . $_SESSION['profile_picture'] . '" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">' . $_SESSION['name'] . '</span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">' . $_SESSION['email'] . '</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                    </li>
                    <li>
                        <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                    </li>
                </ul>
            </div>
            ';
            } else {
                echo '
            <div class=" hidden md:flex md:items-center">
                <a href="login.php" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium text-white bg-blue-700 border border-transparent rounded-md shadow-sm md:px-4 md:py-2 md:text-sm md:rounded-md md:shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Login
                </a>
                <a href="register.php" class="inline-flex items-center justify-center px-4 py-2 ml-3 text-base font-medium text-blue-700 bg-white border border-transparent rounded-md shadow-sm md:px-4 md:py-2 md:text-sm md:rounded-md md:shadow-sm hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Register
                </a>
            </div>
            ';
            }
            ?>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <?php
        $currentFile = basename($_SERVER['SCRIPT_NAME']);
        ?>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <?php
            if (isset($_SESSION["user_id"])) {
                $links = [
                    "dashboard.php" => "Dashboard",
                    "income.php" => "Income",
                    "expense.php" => "Expense",
                    "budget.php" => "Budget"
                ];
            } else {
                $links = [
                    "index.php" => "Home",
                    "about.php" => "About",
                    "features.php" => "Features",
                    "contact.php" => "Contact",
                    "faq.php" => "FAQ"
                ];
            }

            echo '<ul class="dark:text-white text-black flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-4 lg:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">';

            foreach ($links as $file => $name) {
                $activeClass = $currentFile == $file ? 'text-blue-700' : 'hover:text-blue-700';
                echo "<li><a href=\"$file\" class=\"block py-2 pl-3 pr-4 rounded md:p-0 $activeClass\">$name</a></li>";
            }

            echo '</ul>';
            ?>
        </div>

    </div>
</nav>