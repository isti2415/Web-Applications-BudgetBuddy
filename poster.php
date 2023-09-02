<!DOCTYPE html>
<html lang="en">
<?php include './components/head.php'; ?>

<body>
    <div class="bg-white dark:bg-gray-900 min-h-screen flex flex-col justify-center items-center">
        <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 w-full" style="z-index: 999;">
            <div class="flex flex-row items-center justify-between mx-8 p-2">
                <a href="/api/index.php" class="flex items-center">
                    <img src="/images/logo.png" class="h-16" alt="BudgetBuddy Logo" />
                    <span class="ml-2 text-2xl font-extrabold tracking-wide text-gray-800 dark:text-white">BudgetBuddy</span>
                </a>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-user">
                    <ul class="flex flex-col font-medium p-2 md:p-0 mt-2 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-2 lg:space-x-12 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li class="flex flex-col">
                            <span class="text-bold font-bold text-md text-gray-900 dark:text-gray-50">Istiaq Ahmed</span>
                            <span class="text-bold font-bold text-gray-900 dark:text-gray-50">Student ID: 2021462</span>
                        </li>
                        <li class="flex flex-col">
                            <span class="text-bold font-bold text-md text-gray-900 dark:text-gray-50">Faiza Omar</span>
                            <span class="text-bold font-bold text-gray-900 dark:text-gray-50">Student ID: 2010319</span>
                        </li>
                        <li class="flex flex-col">
                            <span class="text-bold font-bold text-md text-gray-900 dark:text-gray-50">Rahat Hossain</span>
                            <span class="text-bold font-bold text-gray-900 dark:text-gray-50">Student ID: 2022431</span>
                        </li>
                        <li class="flex flex-col">
                            <span class="text-bold font-bold text-md text-gray-900 dark:text-gray-50">Nafis Islam</span>
                            <span class="text-bold font-bold text-gray-900 dark:text-gray-50">Student ID: 2020332</span>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <span class="text-bold font-bold text-gray-900 dark:text-gray-50">Course ID: CSE319</span>
                    <span class="text-bold font-bold text-gray-900 dark:text-gray-50">Course Title: Web Applications & Internet</span>
                    <span class="text-bold font-bold text-md text-gray-900 dark:text-gray-50">Instructor: Sanzar Adnan Alam</span>
                </div>
            </div>
        </nav>
        <div class="flex flex-col w-full mt-24 p-2 bg-white rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="flex flex-row">
                <div class="flex flex-col rounded-lg w-1/2 mr-2 items-center p-2 border dark:border-gray-500 border-gray-200">
                    <span class="text-bold font-extrabold text-md dark:text-gray-50 text-gray-900 underline mb-2">Introduction</span>
                    <span class="text-bold text-md dark:text-gray-50 text-gray-900">BudgetBuddy is an advanced web application designed to handle personal financial matters effectively. It focuses on managing income, expenses, and budgets, offering a reliable solution to navigate the complexities of personal finance. The intuitive platform streamlines financial activity monitoring, report generation, and budget creation. In a dynamic landscape, BudgetBuddy simplifies financial management, empowering individuals to achieve their financial goals.</span>
                </div>
                <div class="flex flex-col rounded-lg w-1/2 items-center p-2 border dark:border-gray-500 border-gray-200">
                    <span class="text-bold font-extrabold text-md dark:text-gray-50 text-gray-900 underline mb-2">Opportunities</span>
                    <span class="text-bold text-md dark:text-gray-50 text-gray-900">The financial landscape is evolving, and individuals and businesses are seeking more efficient and user-friendly ways to manage their finances. BudgetBuddy taps into the growing demand for digital solutions that empower users to make informed financial decisions. With the increasing adoption of online tools, there's a significant opportunity to provide a comprehensive and user-centric platform that caters to the diverse needs of individuals, families, freelancers, and small businesses.</span>
                </div>
            </div>

            <div class="flex flex-row mt-2">
                <div class="flex flex-col rounded-lg w-1/2 mr-2 items-center p-2 border dark:border-gray-500 border-gray-200">
                    <span class="text-bold font-extrabold text-md dark:text-gray-50 text-gray-900 underline mb-2">Main Features</span>
                    <ul class="pl-4 text-md dark:text-gray-50 text-gray-900">
                        <li class="list-disc">
                            <span class="font-bold">Income and Expense Tracking:</span> Easily record and categorize all sources of income and expenses, providing a clear overview of financial flows.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Budget Creation and Monitoring:</span> Customize and track budgets for various expense categories, ensuring prudent fund allocation and progress tracking.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Reports and Analytics:</span> Generate detailed reports, graphs, and charts for valuable insights into financial trends, aiding informed decision-making.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Financial Goal Setting:</span> Set and pursue short-term and long-term financial goals, using BudgetBuddy to measure progress.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Alerts and Reminders:</span> Stay informed with notifications for bill payments, budget deadlines, and financial milestones.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">User Profiles:</span> Create separate profiles for shared or individualized financial management within a household or group.
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col w-1/2 rounded-lg items-center p-2 border dark:border-gray-500 border-gray-200">
                    <span class="text-bold font-extrabold text-md dark:text-gray-50 text-gray-900 underline mb-2">Goals & Objectives</span>
                    <span class="text-bold text-md dark:text-gray-50 text-gray-900 mb-2">BudgetBuddy's primary goal is to provide a user-friendly platform that empowers users to take control of their financial well-being. Our objectives include:</span>
                    <ul class="pl-4 text-md dark:text-gray-50 text-gray-900">
                        <li class="list-disc">
                            <span class="font-bold">Simplicity:</span> Develop an interface that is easy to navigate, ensuring users can quickly input and access their financial data.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Accuracy:</span> Provide robust tracking mechanisms that ensure accurate recording and categorization of income and expenses.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Insights:</span> Generate comprehensive reports and analyses that offer valuable insights into spending habits and financial trends.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Budget Management:</span> Enable users to set, monitor, and adjust budgets effectively, helping them achieve their financial goals.
                        </li>
                        <li class="list-disc">
                            <span class="font-bold">Data Security:</span> Implement stringent security measures to safeguard users' financial information and maintain their privacy.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-row">
                <div class="flex flex-col mt-2 w-1/4 rounded-lg items-center p-2 border dark:border-gray-500 border-gray-200">
                    <span class="text-bold font-extrabold text-md dark:text-gray-50 text-gray-900 underline">Problems & Solutions</span>
                    <div class="flex flex-col">
                        <div class="flex flex-col rounded-lg mt-2 w-full items-center p-2 border dark:border-gray-500 border-gray-200">
                            <span class="text-bold font-bold text-md dark:text-gray-50 text-gray-900 mb-2">Many individuals struggle to manage their finances effectively, leading to overspending, missed bill payments, and inadequate savings.</span>
                            <span class="text-bold text-md dark:text-gray-50 text-gray-900">BudgetBuddy addresses this issue by providing a simple and intuitive platform that encourages disciplined financial tracking, offers insights for informed decision-making, and helps users stick to their budgets.</span>
                        </div>
                        <div class="flex flex-col rounded-lg mt-2 w-full items-center p-2 border dark:border-gray-500 border-gray-200">
                            <span class="text-bold font-bold text-md dark:text-gray-50 text-gray-900 mb-2">Existing financial software can be complex and overwhelming for casual users, making it difficult for them to get a clear understanding of their financial status.</span>
                            <span class="text-bold text-md dark:text-gray-50 text-gray-900">BudgetBuddy's user-friendly interface simplifies the financial management process, making it accessible to users with varying levels of financial literacy.</span>
                        </div>
                        <div class="flex flex-col rounded-lg mt-2 w-full items-center p-2 border dark:border-gray-500 border-gray-200">
                            <span class="text-bold font-bold text-md dark:text-gray-50 text-gray-900 mb-2">Inaccurate or inconsistent data entry can lead to unreliable financial insights and reporting.</span>
                            <span class="text-bold text-md dark:text-gray-50 text-gray-900">BudgetBuddy employs automated categorization, transaction matching, and data validation mechanisms to ensure accurate recording and reporting of financial activities.</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-3/4 mt-2 ml-2">
                    <div class="flex flex-col w-full h-auto rounded-lg items-center p-2 border dark:border-gray-500 border-gray-200">
                        <span class="text-bold mt-2 font-extrabold text-md dark:text-gray-50 text-gray-900 underline">Rich Picture</span>
                        <img class="h-72" src="/images/richpicture.drawio.svg" alt="Rich Picture Diagram" />
                    </div>
                    <div class="flex flex-col w-full mt-2 h-auto rounded-lg items-center p-2 border dark:border-gray-500 border-gray-200">
                        <span class="text-bold font-extrabold mb-2 text-md dark:text-gray-50 text-gray-900 underline">Project Gallery</span>
                        <div class="flex flex-row">
                            <img class="h-60 mx-1 border dark:border-gray-500 border-gray-200 rounded-lg" src="/images/1.png" alt="Gallery Image 1" />
                            <img class="h-60 mx-1 border dark:border-gray-500 border-gray-200 rounded-lg" src="/images/2.png" alt="Gallery Image 2" />
                            <img class="h-60 mx-1 border dark:border-gray-500 border-gray-200 rounded-lg" src="/images/1.png" alt="Gallery Image 3" />
                            <img class="h-60 mx-1 border dark:border-gray-500 border-gray-200 rounded-lg" src="/images/2.png" alt="Gallery Image 4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>