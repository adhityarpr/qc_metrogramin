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
                                            <th scope="col">Kode Baju</th>
                                            <th scope="col">Front</th>
                                            <th scope="col">Back</th>
                                            <th scope="col">Hand</th>
                                            <th scope="col">Collar</th>
                                            <th scope="col">Cuff</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Check By</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $id_pesanan = $_GET['id'];
                                        $query = mysqli_query($connect, "SELECT * , pesanan.po_number FROM quality_control INNER JOIN pesanan ON pesanan.id = quality_control.po_number INNER JOIN users ON pesanan.check_by = users.id_users INNER JOIN status ON pesanan.status = status.id_status WHERE quality_control.po_number = $id_pesanan");
                                        $query_total = mysqli_query($connect, "SELECT SUM(jumlah) AS total_defact FROM quality_control WHERE po_number = 8");
                                        $result_total = mysqli_fetch_row($query_total);
                                        
                                        //$result_total = $result_total[0];



                                        if ($query) {

                                            $cek_rows = mysqli_num_rows($query);
                                        } else {
                                            $cek_rows = 0;
                                        }

                                        if ($cek_rows >= 1) {


                                            $result2 = mysqli_fetch_assoc($query);
                                            $po_number = $result2["po_number"];


                                            $i = 1;
                                            foreach ($query as $row) : ?>

                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $row["po_number"]; ?></td>
                                                    <td><?= $row["id_shirt"]; ?></td>
                                                    <td><?= $row["front"]; ?></td>
                                                    <td><?= $row["back"]; ?></td>
                                                    <td><?= $row["hand"]; ?></td>
                                                    <td><?= $row["collar"]; ?></td>
                                                    <td><?= $row["cuff"]; ?></td>
                                                    <td><?= $row["jumlah"]; ?></td>
                                                    <td><?= $row["fullname"]; ?></td>
                                                </tr>
                                        <?php
                                                $i++;
                                            endforeach;
                                        } else {
                                            $query2 = mysqli_query($connect, "SELECT * FROM pesanan WHERE id =$id_pesanan");
                                            $result = mysqli_fetch_assoc($query2);
                                            $po_number = $result["po_number"];
                                        }





                                        ?>


                                    <!-- <tr>
                                        <td> //$result_total </td>
                                    </tr>             -->
                                    
                                    </tbody>
                                </table>
                                <?php if ($cek_rows >= 1) {
                                ?>
                                    <a href="quality_control_tambah_baju.php?po_number=<?= $po_number ?>&id_shirt=<?= $row['id_shirt'] ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Tambah</button></a>
                                <?php
                                } else {
                                ?>
                                    <a href="quality_control_tambah_baju.php?po_number=<?= $po_number ?>&id_shirt=A-0"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Tambah</button></a>
                                <?php
                                }; ?>
                                
                                <a href="calculate_fuzzy.php?id=<?=$row['id']?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Calculate Fuzzy</button></a>
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