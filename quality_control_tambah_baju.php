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
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <tr>

                                            <th scope="col">Posisi</th>
                                            <?php $posisi = [
                                                "Front",
                                                "Back",
                                                "Hand",
                                                "Collar",
                                                "Cuff",
                                                "Pocket",
                                                "Label",
                                            ];
                                            $kondisi = [
                                                "Sobek",
                                                "Jaitan Lepas",
                                                "tes"
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