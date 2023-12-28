<!-- header -->
<?php include "../components/header.php"; ?>
<!-- sidebar -->
<?php include "../components/sidebar.php"; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?php include "../components/navbar.php"; ?>
  <!-- End Navbar -->

  <?php

  require "../functions/student.function.php";
  require "../functions/presence.function.php";

  $nis = query("SELECT nis FROM users");

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [];

    $data["nis"] = $_POST["nis"];
    $data["journal_collection"] = $_POST["journal_collection"];
    $data["student_attendance"] = $_POST["student_attendance"];

    if(createPresence($data) > 0) {
      echo '
        <script>
              Swal.fire({
                title: "Good job!",
                text: "Success create presence",
                icon: "success"
              });
              setTimeout(() => {
                location.href = "presence.php?page=presence";
              }, 1500)
          </script> 
        ';
    }
  }

  $dataPresence = queryPresence("SELECT * FROM presences");

  ?>

  <?php
  if ($even !== "undefined") {
    include "../components/presence/createPresence.php";
  } else {
    include "../components/presence/tablePrsence.php";
  }
  ?>

  <?php include "../components/bottom.php"; ?>
  </div>
</main>
<!-- bottom -->
<?php include "../components/plugin.php"; ?>

<!-- footer -->
<?php include "../components/footer.php" ?>