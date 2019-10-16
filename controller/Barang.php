<?php

    function insertBarang($kode_barang,$nm_barang,$kategori,$stok_barang,$harga_beli,$harga_jual){
        include '../../config/koneksi.php';

        $query = "INSERT INTO tb_barang VALUES('$kode_barang','$nm_barang','$stok_barang','$kategori','$harga_beli','$harga_jual')";
        $insert = mysqli_query($con, $query);

        if ($insert) {
            header("location:../master/barang-main.php");
            // echo "BERHASIL";
        }else{
            echo "Error : ".mysqli_error($con);
        }
    }

    function select_barang(){
        include '../../config/koneksi.php';
        $select = "SELECT * FROM tb_barang";
        $query = mysqli_query($con, $select);
        $no = 1;
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no ?></th>
                    <td><?php echo $row['kode_barang'] ?></td>
                    <td width="230"><b><?php echo $row['nama_barang'] ?></b></td>
                    <td><?php echo $row['qty'] ?></td>
                    <td><?php echo $row['kategori'] ?></td>
                    <td>Rp <?php echo number_format($row['harga_beli']) ?></td>
                    <td>Rp <?php echo number_format($row['harga_jual']) ?></td>
                    <td>
                    <center>
                        <a href="?id=<?php echo $row['kode_barang'] ?>">
                            <button class="btn btn-outline-danger" onclick="tombol()">
                            <i class="fas fa-times"></i>
                            </button>
                        </a>
                        <a href="barang-ubah.php?id_barang=<?php echo $row['kode_barang'] ?>">
                        <button class="btn btn-outline-info">
                            <i class="fas fa-edit"></i>
                        </button>
                        </a>
                    </center>
                    </td>
                </tr>
            <?php
                $no++;
            }
        }
    }

    function updateBarang($kode,$nama,$kategori_brg,$stok_barang,$harga_beli,$harga_jual){
        include '../../config/koneksi.php';

        $update = "UPDATE tb_barang SET 
                    nama_barang = '$nama', 
                    qty = '$stok_barang', 
                    kategori = '$kategori_brg', 
                    harga_beli = '$harga_beli', 
                    harga_jual = '$harga_jual'
                    WHERE kode_barang = '$kode'";

        $query = mysqli_query($con, $update);

        if ($query) {
            header("location:../master/barang-main.php");
            // echo "BERHASIL";
        }else{
            echo "ERROR : ".mysqli_error($con);
        }
    }

    function deleteBarang($id){
        include '../../config/koneksi.php';
        $delete = "DELETE FROM tb_barang WHERE kode_barang = '$id'";
        $query = mysqli_query($con, $delete);

        if($query){
            header("location:../master/barang-main.php");
        }else{
            echo mysqli_error($con);
        }
    }

    function banyak_barang(){
        include '../../config/koneksi.php';
        $bayak;
        $count = "SELECT count(*) as total FROM tb_barang";
        $query = mysqli_query($con, $count);
        $data = mysqli_fetch_assoc($query);
        $banyak = $data['total'];
        return $banyak;
    }

    function kode_barang(){
        include '../../config/koneksi.php';
        $kode = "";
        $count = "SELECT count(*) as total FROM tb_barang";
        $query = mysqli_query($con, $count);
        $data = mysqli_fetch_assoc($query);

        $baru = $data['total']+1;
        
        if ($data['total'] < 10) {
            $kode = "B-00".$baru;
        }elseif ($data['total'] > 10) {
            $kode = "B-0".$baru;
        }

        return $kode;
    }

    function getDataBarang($id){
        include '../../config/koneksi.php';
        $hasil = [];

        $select = "SELECT * FROM tb_barang where kode_barang = '$id'";
        $query = mysqli_query($con, $select);
        while($row = mysqli_fetch_array($query)){
            $hasil[0] = $row['kode_barang'];
            $hasil[1] = $row['nama_barang'];
            $hasil[2] = $row['qty'];
            $hasil[3] = $row['kategori'];
            $hasil[4] = $row['harga_beli'];
            $hasil[5] = $row['harga_jual'];
        }

        return $hasil;
    }