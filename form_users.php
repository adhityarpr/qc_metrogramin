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
                    <h1 class="m-0 text-dark">Tambah Users</h1>
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
                            <h5 class="card-title">Tambah Data Users</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title"><a href="form_users.php" class="btn btn-primary">Tambah</a></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">No Telepon</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($connect, "SELECT *,role_name FROM users 
                                                                        JOIN role ON users.`id_role` = role.`id_role`");

                                        $coba = $_SESSION["id_role"];
                                        
                                        $i = 1;
                                        foreach($query as $row):
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $row["fullname"]; ?></td>
                                                <td><?= $row["username"]; ?></td>
                                                <td><?= $row["no_hp"]; ?></td>
                                                <td><?= $row["role_name"]; ?></td>
                                                <?php if($coba === 1){?>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal">Ubah</button></td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal">Hapus</button></td>
                                                <?php
                                                }else{?><th scope="row">-</th><?php
                                                }?>
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