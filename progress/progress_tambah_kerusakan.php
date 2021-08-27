<?php
require("../database/connection.php");

$kondisi = [
    "Belang",
    "Tidak_Sebahu",
    "Nonjol",
    "Jeding",
    "Kejang",
    "Kelipat",
    "Loncat",
    "Meleset",
    "Tidak_Rata",
    "Jebol",
    "Dedel",
    "Merk_Tidak_Center",
    "Tidak Center",
    "Kerut",
    "Ngegulung",
    "Ngambang Bagian Luar",
    "Gelembung/Melilit",
    "Bubbling",
    "Kancing_Kurang_Benang/Merudul/Ompong",
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
$posisi = [
    "Front",
    "Back",
    "Hand",
    "Collar",
    "Cuff",
    "Pocket",
    "Label"
];

// var_dump($_POST);
$po_number = $_POST["po_number"];
$id_shirt = $_POST["id_shirt"];



$query_pesanan = mysqli_query($connect, "SELECT * FROM pesanan WHERE po_number = '$po_number'");
$result_pesanan = mysqli_fetch_assoc($query_pesanan);

$id_pesanan = $result_pesanan["id"];



$query = mysqli_query($connect, "SELECT * FROM quality_control WHERE po_number = '$id_pesanan'");
$cek_row = mysqli_num_rows($query);
if ($cek_row >= 1) {
    // po sudah ada
    echo "udah ada";
} else {
    echo "belum ada";
    //po belum ada
    $query = mysqli_query($connect, "INSERT INTO quality_control (po_number, id_shirt,status,check_by) VALUES('$id_pesanan', '$id_shirt', 1,7)");
}





if (isset($_POST["Front"])) {
    $column = "";
    $values = "";
    $i = 0;
    while ($i < count($kondisi)) {
        if (isset($_POST["Front"][$kondisi[$i]])) {
            $column .= "$kondisi[$i],";
            if ($i < count($kondisi)) {
                $values .= $_POST["Front"][$kondisi[$i]] . ",";
            } else {
                $values .= $_POST["Front"][$kondisi[$i]];
            }
        }
        $i++;
    }

    $column = mb_strcut($column, 0, -1);
    $values = mb_strcut($values, 0, -1);
    $query = mysqli_query($connect, "INSERT INTO defact ($column) VALUES($values)");

    $query_last_row = mysqli_query($connect, "SELECT * FROM defact ORDER BY id_defact DESC LIMIT 1");

    $result_last_row = mysqli_fetch_assoc($query_last_row);
    $id_defact_last_row = $result_last_row["id_defact"];
    $query = mysqli_query($connect, "UPDATE quality_control SET front = $id_defact_last_row WHERE po_number = $id_pesanan");
} else {
    echo "front ga ada";
}
