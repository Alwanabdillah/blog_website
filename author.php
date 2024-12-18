<?php
require_once __DIR__ . "/../model/users.php";
require_once __DIR__ . "/../model/categories.php";
require_once __DIR__ . "/../model/tags.php";
require_once __DIR__ . "/../model/posts.php";
require_once __DIR__ . "/../model/model.php";

if (!isset($_SESSION['full_name'])) {
  echo "<script>
  window.location.href = 'login.php';
  </script>";
  exit;
}



$Users = new Users();
$user = $Users->find($_SESSION['id']);
$Posts = new Posts();
$Posts_detail = $Posts->all();
$Post_detail = $Posts->all2(0, 1);
$Potes_detail = $Posts->all2(0, 3);
$Pots_detail = $Posts->all2(0, 6);
$potes_detail = $Posts->all_posts_category(0, 1);
$postes_detail = $Posts->all_posts_category(0, 4);
$Categories = new Categories();
$Categories = $Categories->all();
$tags = new Tags();
$tags = $tags->all();

$CountCategory = count($Categories);
$CountTag = count($tags);
$CountPosts = count($Posts_detail);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Author</title>
  <link rel="stylesheet" href="src/output.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <header class="bg-slate-600 h-full w-full min-h-screen">
    <?php include_once __DIR__ . "../../components/layout/navbar.php"; ?>

    <div class="flex flex-col gap-3 items-center justify-center">
      <div
        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col md:flex-row items-center justify-center gap-16 md:gap-20">
        <div class="container flex flex-col lg:flex-row items-center gap-5">
          <?php foreach ($potes_detail as $post): ?>
            <img
              src="./../../oop/assets/img/categories/<?= $post['attachment_category'] ?>"
              alt=""
              class="w-56 h-56 object-cover rounded-full mt-4" />
            <div class="flex flex-col gap-3 items-center md:items-start">
              <h1 class="text-center text-3xl font-bold text-gray-50">
                Hi, I'm <span class="text-slate-300"><?= $post['full_name']; ?></span>
              </h1>
            <?php endforeach; ?>
            <div class="flex flex-row gap-10">
              <div class="flex flex-col items-center justify-center p-4 rounded-lg">
                <h1 class="font-bold font-mono text-white text-xl"><?= $CountTag ?></h1>
                <h2 class="font-extralight font-mono text-white text-base">Tags</h2>
              </div>
              <div class="flex flex-col items-center justify-center p-4 rounded-lg">
                <h1 class="font-bold font-mono text-white text-xl"><?= $CountCategory ?></h1>
                <h2 class="font-extralight font-mono text-white text-base">Categories</h2>
              </div>
              <div class="flex flex-col items-center justify-center p-4 rounded-lg">
                <h1 class="font-bold font-mono text-white text-xl"><?= $CountPosts ?></h1>
                <h2 class="font-extralight font-mono text-white text-base">Posts</h2>
              </div>
            </div>
            </div>

        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
      <header class="text-center">
        <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Popular Author</h2>

        <p class="mx-auto mt-4 max-w-md text-gray-500">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque praesentium cumque iure
          dicta incidunt est ipsam, officia dolor fugit natus?
        </p>
      </header>

      <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($postes_detail as $post): ?>
          <li>
            <a href="#" class="group block overflow-hidden">
              <img
                src="./../../oop/assets/img/categories/<?= $post['attachment_category'] ?>"
                alt=""
                class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

              <div class="relative pt-3">
                <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                  13th
                </h3>

                <p class="mt-2">

                  <span class="tracking-wider text-gray-900"> <?= $post['full_name']; ?> </span>
                </p>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </main>

  <?php include_once __DIR__ . "../../components/layout/footer.php"; ?>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById('dropdown');
      dropdown.classList.toggle('hidden');
    }

    function toggleMenu() {
      const menu = document.getElementById("menu");
      menu.classList.toggle("scale-x-0");
    }
    const container = document.getElementById("carousel-container");
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");

    let currentIndex = 0;
    const slides = document.querySelectorAll("#carousel-container > div");
    const totalSlides = slides.length;

    function updateCarousel() {
      const offset = -currentIndex * 100; // Setiap slide menempati 100% lebar container
      container.style.transform = `translateX(${offset}%)`;
    }

    prevButton.addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Loop ke slide terakhir jika currentIndex < 0
      updateCarousel();
    });

    nextButton.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % totalSlides; // Loop ke slide pertama jika currentIndex > totalSlides
      updateCarousel();
    });
  </script>
</body>

</html>