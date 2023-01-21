<?php
include 'koneksi.php';
$query  = mysqli_query($koneksi, "SELECT * FROM gejala");
?>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Naive Bayes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        .atas {
            width: 100%;
            height: 55px;

        }

        body {
            background-color: rgb(233, 233, 233);
            box-sizing: border-box;
        }

        .tulisan {
            color: grey;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 atas" style="background-color:rgb(3, 114, 114);"></div>
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container" style="justify-content:flex-start; gap:40px;">
                        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-dashboard" style="margin-right:5px ;"></i>NaiveBayes</a>
                        <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-house" style="margin-right:5px ;"></i>Home</a>
                    </div>
            </div>
            </nav>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between">
                <h3 class="py-2">METODE NAIVE BAYES</h3>
                <p class="py-2">Home > Naive Bayes</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 bg-white p-3">
                <a href="prediksi.php" class="text-center w-100"><button class="btn btn-success w-100">HASIL PREDIKSI</button></a>
                <div class="d-flex flex-column gap-1" style="margin-top: 25px;">
                    <?php
                    $query_penyakit     = mysqli_query($koneksi, "SELECT COUNT(Kode_Penyakit) AS jumlah_penyakit FROM penyakit");
                    $query_gejala       = mysqli_query($koneksi, "SELECT COUNT(Kode_Gejala) AS jumlah_gejala FROM gejala");
                    $result_penyakit    = mysqli_fetch_assoc($query_penyakit);
                    $result_gejala      = mysqli_fetch_assoc($query_gejala);
                    $JmlPenyakit        = $result_penyakit['jumlah_penyakit'];
                    $JmlGejala          = $result_gejala['jumlah_gejala'];
                    $PeluangPenyakit    = 1 / $JmlPenyakit;

                    $Gejala = array();
                    $i = 0;
                    for ($a = 0; $a < $JmlGejala; $a++) {
                        if ((isset($_POST['gejala'][$a]) > 0) && ($_POST['gejala'][$a])) {
                            $Gejala[$i] = $_POST['gejala'][$a];
                            $i++;
                        }
                    }
                    // var_dump($Gejala);
                    echo '<table class="table table-striped table-bordered">';
                    echo '<tr><td>Jumlah Penyakit: ' . $JmlPenyakit . '</td>';
                    echo '<td>Jumlah Total Gejala : ' . $JmlGejala . '</td></tr>';
                    echo '<tr><td>Peluang Penyakit : ' . $PeluangPenyakit . '</td>';
                    echo '<td>Jumlah Gejala yang dialami : ' . $i . '</td></tr></table>';
                    ?>
                </div>
            </div>

            <div class="col-lg-9 bg-white d-flex" style="min-height: 500px;">
                <div style="background-color: rgb(233, 233, 233); width: 10px;"></div>
                <div class="p-3 w-100 h-100">
                    <?php
                    $x = 0;
                    $query_data = mysqli_query($koneksi, "SELECT Kode_Penyakit, Nama_Penyakit,Kode_Gejala FROM penyakit ORDER BY Kode_Penyakit");
                    $result_query = mysqli_num_rows($query_data);

                    echo '<div class="row">';
                    $PeluangPenyakit = 1 / $JmlPenyakit;

                    //hitung pada tiap gejala
                    $Total = array();
                    for ($a = 0; $a < $result_query; $a++) {
                        $DataPenyakit = mysqli_fetch_assoc($query_data);



                        echo '<div class="col-sm-4 border">
                            <div class="thumbnail">';
                        echo '<p style="margin-top:0px;"><b>' . ($a + 1) . ' | ' . $DataPenyakit['Nama_Penyakit'] . '</b></p>';


                        $P = 1;
                        foreach ($Gejala as $g) {
                            $cek = stripos($DataPenyakit['Kode_Gejala'], $g);
                            $nc = 1;

                            if ($cek === false) {
                                $nc = 0;
                            }


                            echo '<p>Nc (' . $g . ') : ' . $nc . '<br/>';

                            $Prob = ($nc + $JmlGejala * $PeluangPenyakit) / (1 + $JmlGejala);

                            echo 'P (' . $g . ') : ' . $Prob;

                            $P = $P * $Prob;
                        }

                        $Total[$a]['Probabilitas'] = $P * $PeluangPenyakit;
                        $Total[$a]['Kode_Penyakit'] = $DataPenyakit['Kode_Penyakit'];
                        $Total[$a]['Nama_Penyakit'] = $DataPenyakit['Nama_Penyakit'];

                        echo '<p><b>P (' . $Total[$a]['Kode_Penyakit'] . ') : </b>' . $Total[$a]['Probabilitas'] . '</p>';
                        echo '<hr>';
                        echo '</div>
                        </div>';
                    }

                    //sort hasil
                    $prob = array();
                    $idpenyakit = array();
                    $penyakit = array();

                    foreach ($Total as $key => $row) {
                        $idpenyakit[$key] = $row['Kode_Penyakit'];
                        $penyakit[$key] = $row['Nama_Penyakit'];
                        $prob[$key] = $row['Probabilitas'];
                    }
                    array_multisort($prob, SORT_DESC, $Total);

                    $n = 1;
                    $NBPenyakit = $Total[0]['Nama_Penyakit'];
                    ?>

                    <div class="mt-2" style="height:150px; width:300px; border-radius:10px;">
                        <h3 style="text-align: center; color:white;" class="bg-success">Penyakit yang dialami adalah</h3>
                        <h1 style="padding: 10px; margin-top:-8px; text-align: center; background-color: rgb(233, 233, 233);">
                            <?php echo $NBPenyakit ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>