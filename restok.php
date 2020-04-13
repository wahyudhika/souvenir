<?php 
    include 'koneksi.php';
    if(isset($_POST['proses'])){
        $pilihan = $_POST['pilihan'];
        $stok = $_POST['jumlah'];
        $stok_tambah = $_POST['stok'];
        $id = $_POST['id_barang'];
        $total = 0;
        if($pilihan == 1){
            $total = $stok + $stok_tambah;
        }else if($pilihan == 2){
            $total = $stok - $stok_tambah;
        }
        $query = "update barang set jumlah=$total where id = '$id'";
        if(!$hasill = $db->query($query)){
            die('Gagal Mengupdate data');
        }else{
            $message = "Data Telah Berhasil Diupdate";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<body>
    
    <div class="container">
        <h1>Restok Barang</h1>

        <div class="row">
            <div class="col-sm">
                <a href="index.php" class="btn btn-primary">List Barang</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm">

                <?php if(isset($message)){ ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php } ?>

                <form class="border m-3 p-3" method="POST" action="restock.php" onsubmit="return confirm('Do you really want to submit the form?');">
                    <div class="form-group m-2">
                        <label>Pilih Barang</label>
                        <select class="form-control" name="barang">
                        <?php
                           if(!$result =$db->query('SELECT * FROM barang')){
                            die("Gagal meminta data");
                           }
                           while($rows = $result->fetch_assoc()){
                        ?>
                            <option value="<?php echo $rows['id'];?>"><?php echo $rows['nama'];?></option>
                        <?php 
                           }
                        ?>
                        </select>
                    </div>
                    <button type="submit" name='submit' class="btn btn-danger">Pilih</button>
                </form>
                <?php 
                if(isset($_POST['submit'])){
                    $barang=$_POST['barang'];
                    $sql="select * from barang where id='$barang'";
                    if(!$hasil = $db->query($sql)){
                        die("Gagal meminta data");
                    }
                    // var_dump($result);
                    // die();
                    $data = $hasil->fetch_assoc();
                ?>
                <form class="border m-3 p-3" method="POST" action="restock.php" onsubmit="return confirm('Do you really want to submit the form?');">
                    <div class="form-group m-2">
                        <label>Id Barang</label>
                        <input class="form-control" type="text" value="<?php echo $data['id']?>" name="id_barang" readonly>
                    </div>
                    <div class="form-group m-2">
                        <label>Nama Barang</label>
                        <input class="form-control" type="text" value="<?php echo $data['nama']?>" name="nm_barang" readonly>
                    </div>
                    <div class="form-group m-2">
                        <label>Jumlah Barang Saat Ini</label>
                        <input class="form-control" type="text" value="<?php echo $data['jumlah']?>" name="jumlah" readonly>
                    </div>
                    <div class="form-group m-2">
                        <label>Pilih :</label><br>
                        <label class="radio-inline mr-2"><input type="radio" name="pilihan" value="1" checked>Tambah Stok</label>
                        <label class="radio-inline"><input type="radio" name="pilihan" value="2">Kurangi Stok</label>
                    </div>
                    <div class="form-group m-2">
                        <label>Jumlah Barang Yang Ditambah/Dikurangi</label>
                        <input class="form-control" type="text" name="stok">
                    </div>
                    <button type="submit" name='proses' class="btn btn-secondary">Proses</button>
                </form>
                <?php } ?>

            </div>
        </div>
    </div>
    
</body>
</html>