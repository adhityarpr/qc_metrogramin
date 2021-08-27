<?php
require_once("progress/cek_login.php");
require_once("database/connection.php");

?>

<?php include("layout/header.php");
?>
<?php include("layout/navbar.php");
?>
<?php include("layout/sidebar.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Quality Control</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <!-- ROW PESANAN -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Quality Control List</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group">
                                <label for="exampleInputEmail1">PO Number</label>
                                <input type="text" name="po_number" class="form-control" id="exampleInputEmail1" placeholder="PO Number" value="<?=$_GET['po_number'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Baju</label>
                                <input type="text" name="id_shirt" class="form-control" id="exampleInputEmail1" placeholder="Kode Baju" value="<?=$_GET['id_shirt'] ?>">
                            </div>
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <tr>

                                            <th scope="col">Kondisi</th>
                                            <?php $posisi = [
                                                "Belang",
                                                "Tidak Sebahu",
                                                "Nonjol",
                                                "Jeding",
                                                "Kejang",
                                                "Kelipat",
                                                "Loncat",
                                                "Meleset",
                                                "Tidak Rata",
                                                "Jebol",
                                                "Dedel",
                                                "Merk Tidak Center",
                                                "Tidak Center",
                                                "Kerut",
                                                "Ngegulung",
                                                "Ngambang Bagian Luar",
                                                "Gelembung/Melilit",
                                                "Bubbling",
                                                "Kancing Kurang Benang/Merudul/Ompong",
                                                "Panjang Pendek",
                                                "Balap",
                                                "Cacat Kain/Aksesoris",
                                                "Cacat Press/Kotor(Benang Dalam)/Kelipat",
                                                "Crease Mark",
                                                "Lem/ Glue Mark",
                                                "Terbalik/Wrong Face Side",
                                                "Miring",
                                                "Jalur",
                                                "Seam Gapping",
                                                "See Through",
                                                "Empty",
                                                "Hiking",
                                                "Wrong Accsesories"
                                            ];
                                            $kondisi = [
                                                "Front",
                                                "Back",
                                                "Hand",
                                                "Collar",
                                                "Cuff",
                                                "Pocket",
                                                "Label"
                                                
                                            ];

                                            $i = 0;
                                            while ($i < count($kondisi)) {
                                            ?>
                                                <th scope="col"><?= $kondisi[$i]; ?></th>

                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $i = 0;
                                        while ($i < count($posisi)) {
                                        ?>
                                            <tr>
                                                <td><?= $posisi[$i]; ?></td>

                                                <?php

                                                $j = 0;
                                                while ($j < count($kondisi)) {
                                                ?>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                        </div>
                                                    </td>

                                                <?php
                                                    $j++;
                                                }; ?>


                                            </tr>

                                        <?php
                                            $i++;
                                        }; ?>





                                    </tbody>
                                </table>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        <div class="card-footer">
                            <div class="row">

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





< <?php include("layout/footer.php"); ?>