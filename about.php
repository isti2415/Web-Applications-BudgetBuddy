<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>

<body>
    <div class="bg-white dark:bg-gray-900 min-h-screen flex flex-col justify-center items-center">
        <?php include('./components/nav.php'); ?>
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white pt-4">About Us</h2>
        <div id="accordion-collapse" data-accordion="collapse" class="md:w-[80%]">
            <h2 id="accordion-collapse-heading-1">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    <span>The team behind BudgetBuddy</span>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Meet the inventive minds from the Independent University, Bangladesh (IUB) Computer Science and Engineering (CSE) Department who birthed BudgetBuddy. Fueled by our passion for innovation, we've united our skills to craft a cutting-edge solution for contemporary financial needs. Our team, a vibrant blend of aspiring talents, thrives on the academic spirit of IUB CSE. BudgetBuddy echoes our dedication to excellence and user-centric design, serving as a testament to the collaborative prowess of IUB CSE students. Join us in this dynamic venture as we tailor BudgetBuddy to empower users in their financial journeys, driven by the very essence of IUB CSE: innovation, collaboration, and growth.</p>
                    <!-- Nested accordion -->
                    <div id="accordion-nested-collapse" data-accordion="collapse">
                        <h2 id="accordion-nested-collapse-heading-1">
                            <button type="button" class="flex items-center justify-between w-full p-5 rounded-t-xl font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-nested-collapse-body-1" aria-expanded="false" aria-controls="accordion-nested-collapse-body-1">
                                <span>Istiaq Ahmed</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </button>
                        </h2>
                        <div id="accordion-nested-collapse-body-1" class="hidden" aria-labelledby="accordion-nested-collapse-heading-1">
                            <div class="items-center shadow sm:flex border border-gray-200 dark:border-gray-700">
                                <a href="#">
                                    <img class="md:w-1/2" src="/images/istiaq.jpg" alt="Jese Avatar">
                                </a>
                                <div class=" p-5">
                                    <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <a href="#">Istiaq Ahmed</a>
                                    </h3>
                                    <span class="text-gray-500 dark:text-gray-400">Student ID: 2021462</span>
                                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Web developer and a current student of Department of CSE, IUB</p>
                                    <ul class="flex space-x-4 sm:mt-0">
                                        <li>
                                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 18 16" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: Nested accordion -->
                </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span>Technologies Used</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-gray-200 dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Our project is developed using a carefully selected set of modern programming languages and frameworks that ensure efficiency, scalability, and maintainability.</p>
                    <ul class="list-disc list-inside text-gray-700 dark:text-gray-300">
                        <li><span class="font-semibold">Programming Languages:</span> HTML, CSS, JavaScript, PHP</li>
                        <li><span class="font-semibold">Frontend Frameworks:</span>Tailwind CSS</li>
                        <li><span class="font-semibold">Backend Framework:</span>PHP, JavaScript</li>
                        <li><span class="font-semibold">Database:</span>MySQL</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>

</html>