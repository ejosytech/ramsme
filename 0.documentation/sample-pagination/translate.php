<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <mta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagination dengan PHP</title>

    <!-- Load file bootstrap.min.css yang ada di folder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .align-middle {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
    <!-- Membuat Menu Header / Navbar -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white;"><b>Pagination dengan PHP</b></a>
            </div>
        </div>
    </nav>

    <div style="padding: 0 15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th class="text-center">NO</th>
                    <th>NIS</th>
                    <th>JENIS KELAMIN</th>
                    <th>TELP</th>
                    <th>ALAMAT</th>
                </tr>
                <?php
                // Include / load file koneksi.php
                include "koneksi.php";

                // Check if there is data on the page URL
                $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                $limit = 5; // Amount of data per page

                // Create a query to display how many data will be displayed in the tables in the database
                $limit_start = ($page - 1) * $limit;

                // Create a query to display student data according to the specified limit
                $sql = $pdo->prepare("SELECT * FROM siswa LIMIT ".$limit_start.",".$limit);
                $sql->execute(); // Eksekusi querynya

                $no = $limit_start + 1; // Untuk penomoran tabel
                while ($data = $sql->fetch()) { // Ambil semua data dari hasil eksekusi $sql
                ?>
                    <tr>
                        <td class="align-middle text-center"><?php echo $no; ?></td>
                        <td class="align-middle"><?php echo $data['nis']; ?></td>
                        <td class="align-middle"><?php echo $data['nama']; ?></td>
                        <td class="align-middle"><?php echo $data['jenis_kelamin']; ?></td>
                        <td class="align-middle"><?php echo $data['telp']; ?></td>
                        <td class="align-middle"><?php echo $data['alamat']; ?></td>
                    </tr>
                <?php
                $no++; // Tambah 1 setiap kali looping
                }
                ?>
            </table>
        <div>

        <!--
        Make the pagination
         With bootstrap, it is easier for us to create pagination buttons with a beautiful design
         good of course -->
        <ul class="pagination">
            <!-- LINK FIRST AND PREV -->
            <?php
            if ($page == 1) { // If the page is the 1st use, then disable the PREV link
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // If you open page 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li><a href="index.php?page=1">First</a></li>
                <li><a href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah/total data
            $sql2 = $pdo->prepare("SELECT COUNT(*) AS total FROM siswa");
            $sql2->execute(); // Eksekusi querynya
            $get_jumlah = $sql2->fetch();

            $jumlah_page = ceil($get_jumlah['total'] / $limit); // Count the number of pages
            $jumlah_number = 3; // Specify the number of link numbers before and after the active page
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
                <li><a href="index.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="index.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>
</html>