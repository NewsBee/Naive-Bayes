<?php
include 'koneksi.php';
$query  = mysqli_query($koneksi,"SELECT * FROM gejala");
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Naive Bayes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

        .tulisan{
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
                        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-dashboard"
                                style="margin-right:5px ;"></i>NaiveBayes</a>
                        <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-house"
                                style="margin-right:5px ;"></i>Home</a>
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
            <div class="col-lg-2 bg-white p-3">
                <a href=""><button class="btn btn-danger">NAIVE BAYES MENU</button></a>
                <div class="d-flex flex-column gap-1" style="margin-top: 25px;">
                    <a href="index.php" class="text-decoration-none tulisan">1.Dataset</a>
                    <a href="gejala.php" class="text-decoration-none text-black">2.Data Gejala</a>
                    <a href="penyakit.php" class="text-decoration-none tulisan">3.Data Penyakit</a>
                    <a href="prediksi.php" class="text-decoration-none tulisan">4.Prediksi</a>
                </div>
            </div>
            
            <div class="col-lg-10 bg-white d-flex" style="min-height: 500px;">
                <div style="background-color: rgb(233, 233, 233); width: 10px;"></div>
                <div class="p-3 w-100 h-100">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th class="th-sm">No
                          </th>
                          <th class="th-sm">Kode Gejala
                          </th>
                          <th class="th-sm">Nama Gejala
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                        $a=0;
                        while($db_row = mysqli_fetch_array($query)) {
                    ?>
                      <tr>
                          <td>
                              <?php echo $a+1; ?>
                          </td>
                          <td>
                              <?php echo $db_row["Kode_Gejala"]; ?>
                          </td>
                          <td>
                              <?php echo $db_row["Nama_Gejala"]; ?>
                          </td>
                      </tr>
                    <?php
                        $a++;
                    }
                    ?>
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>