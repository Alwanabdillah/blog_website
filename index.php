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

$Posts = new Posts();
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
  <title>Home</title>
  <link rel="stylesheet" href="src/output.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">
  <header
    class="object-cover bg-center h-full w-full min-h-screen"
    style="background-image: url('../assets/images/hero.png')">
    <?php include_once __DIR__ . "../../components/layout/navbar.php"; ?>

    <div
      class="flex flex-col items-start mx-auto max-w-screen-2xl gap-6 pt-20 my-auto px-4 sm:px-6 lg:px-8">
      <h1
        class="font-serif text-left md:w-[50%] text-5xl md:text-6xl lg:text-8xl text-gray-50">
        Knowledge and Ideas Center
      </h1>
      <p class="text-left text-base md:text-xl text-gray-50">
        Your trusted source for innovative insights and new perspectives.
      </p>

    </div>
    <!-- <div>

      </div> -->
  </header>

  <main class="px-5 flex flex-col items-center justify-center gap-3 my-16">
    <h1 class="text-center text-4xl font-light pb-5">Top Categories</h1>
    <div class="container gap-3 flex flex-row">
      <?php
      foreach ($Categories as $category):
      ?>

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

                <p class="font-display text-center font-bold text-lg text-white">
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

  <main class="flex flex-row items-baseline justify-center bg-slate-100 my-16 mx-5">
    <div
      class="container grid grid-cols-1 md:grid-cols-2 gap-4 items-center justify-center">
      <?php foreach ($Post_detail as $post): ?>
        <div>
          <a href="blog.php?id=<?= $post["id_posts"] ?>" class="rounded-lg">
            <img
              src="./../../oop/assets/img/posts/<?= $post["attachment_post"] ?>"
              alt=""
              class="h-96 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%]" />
            <div class="flex flex-col p-4">
              <a href="" class="text-slate-600 text-xl font-semibold md:text-3xl"><?= $post['tittle'] ?></a>
              <p class="text-gray-600 pt-2 text-sm ">
                <?= $post["created_at"] ?>
              </p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>


      <div class="grid grid-cols-1 gap-4 pb-5">
        <?php foreach ($Potes_detail as $post): ?>
          <a href="blog.php?id=<?= $post["id_posts"] ?>">
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

  <main
    class="flex flex-col items-baseline justify-center md:mx-7 lg:mx-auto px-10 md:px-20 lg:px-28 gap-10">
    <div class="flex items-start justify-center float-left pl-3">
      <h1 class="font-extralight text-left text-4xl">Latest News</h1>
    </div>
    <div class="container grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($Pots_detail as $post): ?>
        <a href="blog.php?id=<?= $post["id_posts"] ?>" class="rounded-lg">
            <div class="h-96 w-[420px] p-2">
              <img src="./../../oop/assets/img/posts/<?= $post["attachment_post"] ?>" alt="" class="w-[390px] h-52 object-cover rounded-lg" />
              <div class="py-3 gap-2">
                <h1
                  class="text-base md:text-lg lg:text-xl text-slate-600 font-bold pb-2">
                  <?= $post['tittle'] ?>
                </h1>
                <h3 class="text-xs pb-1 text-slate-600">dibuat pada : <?= $post['created_at'] ?></h3>
                <p class="text-base font-mono text-slate-500 overflow-hidden truncate whitespace-nowrap">
                  <?= $post['content'] ?>
                </p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
    </div>
  </main>

  <?php include_once __DIR__ . "../../components/layout/footer.php"; ?>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById('dropdown');
      dropdown.classList.toggle('hidden');
    }

    $(document).ready(function() {
      $("#keyCat").on("keyup", function() {
        $("#container").load(
          "./../search/search-category.php?keyCat=" + $("#keyCat").val()
        );
      });
    });

    function toggleMenu() {
      const menu = document.getElementById("menu");
      menu.classList.toggle("scale-x-0");
    }

    function modalDetails(id, name) {
      let content = '<ul>';
      content += `<li><strong>Id kategori: </strong>${id}</li>`;
      content += `<li><strong>Nama kategori: </strong>${name}</li>`;
      content += '</ul>';
      $('#detailModal .modal-body').html(content);
      $('#detailModal .modal-tittle').text('Detail Kategori');
      $('#detailModal').modal('show');
    }
  </script>
</body>

</html>