<?php
require("../database/connection.php");

$kondisi = [
    "Kerut",
                                                    "Ngambang_Bagian_Dalam",
                                                    "Belang",
                                                    "Bubbling",
                                                    "Belum_Press",
                                                    "Benang_Keselip",
                                                    "Tidak_Dijahit",
                                                    "Bekas_Jahitan",
                                                    "Benang_Timbul",
                                                    "Glue_Mark",
                                                    "Kondent",
                                                    "Crease_Mark",
                                                    "Kejang",
                                                    "Kelipat",
                                                    "Jebol",
                                                    "Balap",
                                                    "Cacat_Press",
                                                    "Terbalik",
                                                    "Wrong_Accsesories"
];
$posisi = [
    "Front",
    "Back",
    "Hand",
    "Collar",
    "Cuff",
];

// var_dump($_POST);
$po_number = $_POST["po_number"];
$id_shirt = $_POST["id_shirt"];



$query_pesanan = mysqli_query($connect, "SELECT * FROM pesanan WHERE po_number = '$po_number'");
$result_pesanan = mysqli_fetch_assoc($query_pesanan);

$id_pesanan = $result_pesanan["id"];



$query = mysqli_query($connect, "SELECT * FROM quality_control WHERE po_number = '$id_pesanan' and id_shirt = '$id_shirt'");
$cek_row = mysqli_num_rows($query);
if ($cek_row >= 1) {
    // po sudah ada
    echo "udah ada";
} else {
    echo "belum ada";
    //po belum ada
    $query = mysqli_query($connect, "INSERT INTO quality_control (po_number, id_shirt,check_by,jumlah) VALUES('$id_pesanan', '$id_shirt',7,0)");
}




$p = 0;
while($p < count($posisi)){
    if (isset($_POST["$posisi[$p]"])) {
        $column = "";
        $values = "";
        $i = 0;
        $counter = 0;
        while ($i < count($kondisi)) {
            if (isset($_POST["$posisi[$p]"][$kondisi[$i]])) {
                $column .= "$kondisi[$i],";
                if ($i < count($kondisi)) {
                    $values .= $_POST["$posisi[$p]"][$kondisi[$i]] . ",";
                } else {
                    $values .= $_POST["$posisi[$p]"][$kondisi[$i]];
                }
                $counter = $counter + 1;
            }
            $i++;
        }
    
        $column = mb_strcut($column, 0, -1);
        $values = mb_strcut($values, 0, -1);
        $query = mysqli_query($connect, "INSERT INTO defact ($column) VALUES($values)");
        echo $column;
        echo $values;
        $query_last_row = mysqli_query($connect, "SELECT * FROM defact ORDER BY id_defact DESC LIMIT 1");
    
        $result_last_row = mysqli_fetch_assoc($query_last_row);
        $id_defact_last_row = $result_last_row["id_defact"];
        $query = mysqli_query($connect, "UPDATE quality_control SET $posisi[$p] = $id_defact_last_row, jumlah = jumlah + $counter WHERE po_number = $id_pesanan and id_shirt = '$id_shirt'");
    } else {
        echo "front ga ada";
    }
    $p++;    
}
// if (isset($_POST["Front"])) {
//     $column = "";
//     $values = "";
//     $i = 0;
//     $counter = 0;
//     while ($i < count($kondisi)) {
//         if (isset($_POST["Front"][$kondisi[$i]])) {
//             $column .= "$kondisi[$i],";
//             if ($i < count($kondisi)) {
//                 $values .= $_POST["Front"][$kondisi[$i]] . ",";
//             } else {
//                 $values .= $_POST["Front"][$kondisi[$i]];
//             }
//             $counter = $counter + 1;
//         }
//         $i++;
//     }

//     $column = mb_strcut($column, 0, -1);
//     $values = mb_strcut($values, 0, -1);
//     $query = mysqli_query($connect, "INSERT INTO defact ($column) VALUES($values)");
//     echo $column;
//     echo $values;
//     $query_last_row = mysqli_query($connect, "SELECT * FROM defact ORDER BY id_defact DESC LIMIT 1");

//     $result_last_row = mysqli_fetch_assoc($query_last_row);
//     $id_defact_last_row = $result_last_row["id_defact"];
//     $query = mysqli_query($connect, "UPDATE quality_control SET front = $id_defact_last_row, jumlah = jumlah + $counter WHERE po_number = $id_pesanan and id_shirt = '$id_shirt'");
// } else {
//     echo "front ga ada";
// }

// if (isset($_POST["Back"])) {
//     $column = "";
//     $values = "";
//     $i = 0;
//     $counter = 0;
//     while ($i < count($kondisi)) {
//         if (isset($_POST["Back"][$kondisi[$i]])) {
//             $column .= "$kondisi[$i],";
//             if ($i < count($kondisi)) {
//                 $values .= $_POST["Back"][$kondisi[$i]] . ",";
//             } else {
//                 $values .= $_POST["Back"][$kondisi[$i]];
//             }
//             $counter = $counter + 1;
//         }
//         $i++;
//     }

//     $column = mb_strcut($column, 0, -1);
//     $values = mb_strcut($values, 0, -1);
//     $query = mysqli_query($connect, "INSERT INTO defact ($column) VALUES($values)");

//     $query_last_row = mysqli_query($connect, "SELECT * FROM defact ORDER BY id_defact DESC LIMIT 1");

//     $result_last_row = mysqli_fetch_assoc($query_last_row);
//     $id_defact_last_row = $result_last_row["id_defact"];
//     $query = mysqli_query($connect, "UPDATE quality_control SET Back = $id_defact_last_row, jumlah = jumlah + $counter WHERE po_number = $id_pesanan and id_shirt = '$id_shirt'");
// } else {
//     echo "back ga ada";
// }
header('Location: ../cek_qualitycontrol.php?id='.$id_pesanan);