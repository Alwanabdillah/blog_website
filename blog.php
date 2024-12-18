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
$post_author = $Users->post_author($_SESSION['id']);
$Posts_detail = $Posts->all();
$Post_detail = $Posts->all2(0, 1);
$Potes_detail = $Posts->all2(0, 3);
$potes_detail = $Posts->all_posts_category(0, 4);
$Pots_detail = $Posts->all2(0, 6);

$Categories = new Categories();
$Categories = $Categories->all();

$tags = new Tags();
$tags = $tags->all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog</title>
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

          <img
            src="./../../oop/assets/img/users/<?= $user[0]['avatar'] ?>"
            alt=""
            class="w-56 h-56 object-cover rounded-full mt-4" />
          <div class="flex flex-col gap-3 items-center md:items-start">
            <h1 class="text-center text-3xl font-bold text-gray-50">
              Hi, I'm <span class="text-slate-300"><?= $user[0]['full_name'] ?></span>
            </h1>
            <h2
              class="text-lg text-center w-96 md:w-full lg:text-left font-semibold text-slate-400">
              <?= $user[0]['bio'] ?> - Owner AlWan,Inc.
            </h2>
            <h2 class="text-sm text-center lg:text-left text-slate-400">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, enim.
            </h2>
          </div>

        </div>
      </div>
      <div class="absolute top-[90%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center justify-center gap-3">
        <div class="rounded-full bg-slate-300 p-2 font-bold"><img src="../assets/images/arrow.png" alt="" class="w-4 h-4 flex items-center justify-center"></div>
        <a
          href="#"
          class="text-base md:text-lg lg:text-lg text-gray-50 hover:text-gray-50/75">Scroll Down</a>
      </div>
    </div>
  </header>

  <section class="pt-32 pb-16 px-6 bg-gray-50">
    <div class="container mx-auto">
      <?php foreach ($post_author as $post): ?>
        <div class="max-w-6xl mx-auto">
          <h1 class="text-4xl font-bold text-slate-600 mb-6">
            <?= $post["tittle"] ?>
          </h1>

          <div class="flex items-center space-x-4 text-gray-500 mb-8">
            <span>Diposting pada 20 July 2024</span>
            <span>&#8226;</span>
            <span>Oleh AlWan, Inc.</span>
          </div>
          <img
            src="./../../oop/assets/img/posts/<?= $post["attachment_post"] ?>"
            alt=""
            class="w-full h-96 object-cover rounded-lg mb-8" />
          <div class="text-gray-700 leading-7">
            <p class="text-base tracking-wide font-medium text-slate-500 mt-10 mb-4">
              <?= $post["content"] ?>
            </p>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <main class="px-5 flex flex-col items-center justify-center gap-3 my-16">
    <h1 class="text-center text-4xl font-light pb-5">Top Categories</h1>
    <div class="flex flex-row gap-3">
      <?php foreach ($tags as $tag): ?>
        <div class="bg-slate-300 py-2 px-4 rounded-lg cursor-pointer">
          <h2><?= $tag['name_tag']; ?></h2>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="container gap-3 flex flex-row">
      <?php foreach ($Categories as $category): ?>
        <a
          href="#"
          class="group relative block rounded-lg bg-black h-40 md:h-52 lg:h-60 w-full">
          <img
            alt=""
            src="../assets/images/hero.png"
            class="absolute inset-0 h-full w-50 object-cover opacity-75 rounded-lg transition-opacity group-hover:opacity-50" />

          <div class="relative p-4 sm:p-6 lg:p-7">
            <div class="mt-20 sm:mt-48 lg:mt-36">
              <div
                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                <p
                  class="font-display text-center font-bold text-lg text-white">
                  - <?= $category['name_category'] ?> -
                </p>
                <p class="text-sm text-center font-light text-gray-400">
                  4 Post
                </p>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </main>

  <main class="flex flex-col mx-auto items-center justify-center bg-gray-50">
    <div class="flex float-left items-start justify-center pb-9">
      <h1 class="font-extralight text-left text-4xl">Latest News</h1>
    </div>
    <div
      class="container grid grid-cols-1 md:grid-cols-2 gap-4 items-center justify-center">
      <div class="rounded-lg">
        <?php foreach ($Post_detail as $post): ?>
          <img
            src="./../../oop/assets/img/posts/<?= $post["attachment_post"] ?>"
            alt=""
            class="h-96 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%]" />
          <div class="flex flex-col p-4">
            <a href="" class="text-slate-600 text-xl font-semibold md:text-3xl"><?= $post['tittle'] ?></a>
            <p class="text-gray-600 pt-2 text-sm overflow-hidden truncate whitespace-nowrap">
              <?= $post["content"] ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="grid grid-cols-1 gap-4 pb-5">
        <?php foreach ($Potes_detail as $post): ?>
          <a href="blog.php">
            <div class="flex flex-row">
              <img
                src="./../../oop/assets/img/posts/<?= $post["attachment_post"] ?>"
                alt=""
                class="h-28 w-28 md:h-32 md:w-32 lg:h-40 lg:w-40 rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%]" />
              <div
                class="flex flex-col pl-4 py-1 gap-1 items-baseline justify-center">
                <a
                  href=""
                  class="text-slate-600 text-[12.5px] font-semibold md:text-xl"><?= $post['tittle'] ?></a>
                <a
                  href=""
                  class="text-slate-600 text-left text-[10px] font-light md:text-xs">dibuat pada : <?= $post['created_at'] ?></a>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

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
        <?php foreach ($potes_detail as $post): ?>
          <li>
            <a href="#" 
            class="group block overflow-hidden">
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
    function toggleMenu() {
      const menu = document.getElementById("menu");
      menu.classList.toggle("scale-x-0");
    }
  </script>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById('dropdown');
      dropdown.classList.toggle('hidden');
    }
  </script>


</body>

</html>