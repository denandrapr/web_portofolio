<?php

    function kode_sup(){
        include '../../config/koneksi.php';
        $kode = "";
        $count = "SELECT count(*) as total FROM tb_supplier";
        $query = mysqli_query($con, $count);
        $data = mysqli_fetch_assoc($query);

        $t = time();
        $kode_depan = date("ymd",$t);

        $baru = $data['total']+1;
        
        if ($data['total'] < 10) {
            $kode = 'SUP'.$kode_depan.'00'.$baru;
        }elseif ($data['total'] > 10) {
            $kode = 'SUP'.$kode_depan.'0'.$baru;
        }

        return $kode;
    }

    function insertSupplier($kd_supp,$nm_supp,$nm_per,$alamat,$kota,$no_telp,$no_hand,$email,$keterangan){
        include '../../config/koneksi.php';

        $insert = "INSERT INTO tb_supplier VALUES('$kd_supp','$nm_supp','$nm_per','$alamat','$kota','$no_telp','$no_hand','$email','$keterangan')";
        $query = mysqli_query($con, $insert);

        if ($query) {
            header("location:../master/supplier-main.php");
        }else{
            echo mysqli_error($con);
        }
    }

    function selectSupplier(){
        include '../../config/koneksi.php';
        $select = "SELECT * FROM tb_supplier";
        $query = mysqli_query($con, $select);
        $no = 1;
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no ?></th>
                    <td><?php echo $row['kode_supplier'] ?></td>
                    <td><b><?php echo $row['nama_supplier'] ?></b></td>
                    <td><?php echo $row['nama_perusahaan'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><?php echo $row['kota'] ?></td>
                    <td><?php echo $row['no_telp'] ?></td>
                    <td><?php echo $row['no_handphone'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['keterangan'] ?></td>
                    <td>
                    <center>
                        <a href="?id=<?php echo $row['kode_supplier'] ?>">
                            <button class="btn btn-outline-danger" onclick="tombol()">
                            <i class="fas fa-times"></i>
                            </button>
                        </a>
                        <a href="supplier-ubah.php?id=<?php echo $row['kode_supplier'] ?>">
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

    function updateSupplier($kd_supp,$nm_supp,$nm_per,$alamat,$kota,$no_telp,$no_hand,$email,$keterangan){
        include '../../config/koneksi.php';

        $update = "UPDATE tb_supplier SET
                    nama_supplier = '$nm_supp',
                    nama_perusahaan = '$nm_per',
                    alamat = '$alamat',
                    kota = '$kota',
                    no_telp = '$no_telp',
                    no_handphone = '$no_hand',
                    email = '$email',
                    keterangan = '$keterangan'
                    WHERE kode_supplier = '$kd_supp'";

        $query = mysqli_query($con,$update);
        
        if ($query) {
            // echo "<h1>Error : ".mysqli_error($con)."</h1>";
            header("location:../master/supplier-main.php");
            // echo "BERHASIL";
        }else{
            echo "Error : ".mysqli_error($con);
        }
    }

    function deleteSupplier($id){
        include '../../config/koneksi.php';

        $delete = "DELETE FROM tb_supplier WHERE kode_supplier='$id'";
        $query = mysqli_query($con, $delete);

        if ($query) {
            header("location:../master/supplier-main.php");
            // echo "Berhasil";
        }else{
            echo mysqli_error($con);
        }
    }

    function banyakSupplier(){
        include '../../config/koneksi.php';
        $bayak;
        $count = "SELECT count(*) as total FROM tb_supplier";
        $query = mysqli_query($con, $count);
        $data = mysqli_fetch_assoc($query);
        $banyak = $data['total'];
        return $banyak;
    }

    function getDataSupplier($id){
        include '../../config/koneksi.php';

        $data = [];

        $select = "SELECT * FROM tb_supplier WHERE kode_supplier='$id'";
        $query = mysqli_query($con,$select);

        while($row = mysqli_fetch_assoc($query)){
            $data[0] = $row['kode_supplier'];
            $data[1] = $row['nama_supplier'];
            $data[2] = $row['nama_perusahaan'];
            $data[3] = $row['alamat'];
            $data[4] = $row['kota'];
            $data[5] = $row['no_telp'];
            $data[6] = $row['no_handphone'];
            $data[7] = $row['email'];
            $data[8] = $row['keterangan'];
        }

        return $data;
    }