<nav>
    <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-4">
            <div class="block">
                <button
                    id="menu-button"
                    onclick="toggleMenu()"
                    class="rounded p-2 text-gray-200 transition hover:text-gray-200/75">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="md:flex md:items-center md:gap-12">
                <a class="block text-teal-600" href="#">
                    <img src="../assets/images/logo.png" alt="Logo" class="w-10 h-10" />
                </a>
            </div>
        </div>
    </div>
</nav>

<div
    id="menu"
    class="relative top-0 left-0 scale-x-0 z-20 transition-all ease-in-out duration-200 mx-5 max-w-screen-2xl bg-slate-900 rounded-lg py-10 px-4 sm:px-6 lg:px-8">
    <div>
        <ul class="flex flex-col md:flex-row text-center items-center gap-10">
            <li>
                <a
                    href="index.php"
                    class="text-base md:text-lg lg:text-lg text-gray-50 hover:text-gray-50/75">Home</a>
            </li>
            <li>
                <a
                    href="blog.php"
                    class="text-base md:text-lg lg:text-lg text-gray-50 hover:text-gray-50/75">Blog</a>
            </li>
            <li>
                <a
                    href="author.php"
                    class="text-base md:text-lg lg:text-lg text-gray-50 hover:text-gray-50/75">Author</a>
            </li>
            <li>
                <a
                    href="./../../oop/pages/index.php"
                    class="text-base md:text-lg lg:text-lg text-gray-50 hover:text-gray-50/75">Dashboard</a>
            </li>
            <div class="relative inline-block">
                <button class="bg-blue-600 text-white px-4 py-2 rounded" onclick="toggleDropdown()">
                    Profile
                </button>
                <div id="dropdown" class="hidden absolute bg-white shadow rounded mt-2 w-40 hover:rounded-md">
                    <a href="./../../oop/pages/edit-user.php" class="block px-4 py-3 text-gray-700 hover:rounded-md  hover:text-gray-50 hover:bg-gray-400">Account</a>
                    <a href="logout.php" class="block px-4 py-3 text-gray-700 hover:rounded-md hover:text-gray-50 hover:bg-gray-400">Logout</a>
                </div>
            </div>

        </ul>
    </div>
</div>