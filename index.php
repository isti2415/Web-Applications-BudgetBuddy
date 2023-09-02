  <?php
  // Include your database connection code here
  session_start();
  if(isset($_SESSION["user_id"])) {
      header("Location: dashboard.php");
      exit();
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <?php include('./components/head.php'); ?>

  <body>
    <div class="bg-white dark:bg-gray-900 min-h-screen flex justify-center items-center">
      <?php include('./components/nav.php'); ?>
      <div class="py-8 px-4 mx-auto max-w-screen-lg text-center lg:py-16">
        <img class="mx-auto mb-4 w-3/4" src="images/hero.png" alt="Illustration" />
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Your Path to Financial Freedom</h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Your trusted companion for simplifying financial wellness, from tracking expenses to achieving savings goals, making every dollar count on your journey to financial freedom.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
          <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Get started
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </a>
          <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            Learn more
          </a>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
  </body>

  </html>