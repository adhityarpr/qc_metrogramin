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
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">PO Number</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Tanggal Pesan</th>
                                            <th scope="col">Tanggal Selesai</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($connect, "SELECT * FROM pesanan INNER JOIN users ON pesanan.check_by = users.id_users INNER JOIN status ON pesanan.status = status.id_status");

                                        //var_dump(mysqli_fetch_assoc($query));

                                        $i = 1;
                                        foreach ($query as $row) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $row["po_number"]; ?></td>
                                                <td><?= $row["buyer"]; ?></td>
                                                <td><?= $row["qty"]; ?></td>
                                                <td><?= $row["tgl_pesan"]; ?></td>
                                                <td><?= $row["buyreq"]; ?></td>
                                                <td><?= $row["cek_info"]; ?></td>
                                                <td>
                                                    <a href="quality_control_tambah_baju.php?po_number=<?=$row['po_number']?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Detail</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endforeach;
                                        ?>



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




<?php include("layout/footer.php"); ?>