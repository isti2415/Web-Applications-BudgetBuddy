<?php
session_start();
include('connection.php');

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $name = $_POST["name"];

    $emailCheckQuery = "SELECT email FROM users WHERE email = '$email'";
    $emailCheckResult = mysqli_query($connection, $emailCheckQuery);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        $error_message = "This email is already registered.";
    } else {
        // Handle profile picture upload
        if (!empty($_FILES['picture']['name'])) {
            $pictureName = $_FILES['picture']['name'];
            $tempName = $_FILES['picture']['tmp_name'];
            $picturePath = "images/profilepictures/";

            $timestamp = time();
            $newPictureName = $timestamp . $pictureName;
            $destination = $picturePath . $newPictureName;

            if (move_uploaded_file($tempName, $destination)) {
                $profile_picture = $destination;
            } else {
                $error_message = "Error uploading profile picture.";
            }
        }

        if ($password === $confirmPassword) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (email, password, name, profile_picture) VALUES ('$email', '$hashedPassword', '$name', '$profile_picture')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                header("Location: login.php");
                exit();
            } else {
                $error_message = "An error occurred while registering.";
            }
        } else {
            $error_message = "Passwords do not match.";
        }
    }

    // Delete the uploaded picture if an error occurs
    if (!empty($error_message) && !empty($profile_picture) && file_exists($profile_picture)) {
        unlink($profile_picture);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('./components/head.php'); ?>

<body>
    <div class="bg-white dark:bg-gray-900 min-h-screen flex flex-col justify-center items-center">
        <?php include('./components/nav.php'); ?>
        <?php include('./components/alert_error.php'); ?>
        <div class="flex lg:flex-row flex-col block max-w-screen-lg md:w-[70%] p-2 mt-20 mb-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="w-full flex items-center justify-center order-1 lg:order-0">
                <img class="w-full h-auto" src="images/register.svg" alt="Register" />
            </div>
            <div class="order-0 lg:order-1 w-full bg-white rounded-lg shadow dark:border lg:mt-0 lg:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-8 py-2 space-y-4">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 lg:space-y-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                            <input type="name" name="name" id="name" placeholder="John Doe" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile picture</label>
                            <input type="file" name="picture" id="picture" accept="image/jpg, image/png, image/jpeg, image/gif" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>

</html>