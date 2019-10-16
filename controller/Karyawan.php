<?php
    function nik(){
        include '../../config/koneksi.php';
        $kode = "";
        $count = "SELECT count(*) as total FROM tb_karyawan";
        $query = mysqli_query($con, $count);
        $data = mysqli_fetch_assoc($query);

        $t = time();
        $kode_depan = date("ymd",$t);

        $baru = $data['total']+1;
        
        if ($data['total'] < 10) {
            $kode = 'K'.$kode_depan.'00'.$baru;
        }elseif ($data['total'] > 10) {
            $kode = 'K'.$kode_depan.'0'.$baru;
        }

        return $kode;
    }

    function insertKaryawan($nik,$nama_kar,$alamat_kar,$nomor_telp,$tgl_lahir,$jk,$pendidikan,$jabatan,$uname,$pass,$m1,$m2,$m3,$t1,$t2,$l1){
        include '../../config/koneksi.php';

        $cek = "SELECT * FROM tb_karyawan WHERE username = '$uname'";
        $query = mysqli_query($con,$cek);
        if (mysqli_num_rows($query) > 0) {
            ?>
            <script type="text/javascript">
            alert("Username sudah dipakai");
            </script>
            <?php
        }else{
            $insert = "INSERT INTO tb_karyawan 
                        VALUES(
                            '$nik',
                            '$nama_kar',
                            '$alamat_kar',
                            '$nomor_telp',
                            '$tgl_lahir',
                            '$jk',
                            '$pendidikan',
                            '$jabatan',
                            '$uname',
                            '$pass',
                            '$m1',
                            '$m2',
                            '$m3',
                            '$t1',
                            '$t2',
                            '$l1')";
            $query = mysqli_query($con,$insert);
            
            if ($query) {
                header("location:../master/karyawan-main.php");
                // echo "BERHASIL";
            }else{
                echo "Error : ".mysqli_error($con);
            }
        }
    }

    function selectKaryawan(){
        include '../../config/koneksi.php';
        $select = "SELECT * FROM tb_karyawan";
        $query = mysqli_query($con, $select);
        $no = 1;
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no ?></th>
                    <td><?php echo $row['nik'] ?></td>
                    <td width="180"><b><?php echo $row['nama_karyawan'] ?></b></td>
                    <td><?php echo $row['alamat_karyawan'] ?></td>
                    <td><?php echo $row['no_telp'] ?></td>
                    <td><?php echo $row['tgl_lahir'] ?></td>
                    <td><?php echo $row['jk'] ?></td>
                    <td><?php echo $row['pendidikan'] ?></td>
                    <td><?php echo $row['jabatan'] ?></td>
                    <td>
                    <center>
                        <a href="?nik=<?php echo $row['nik'] ?>">
                            <button class="btn btn-outline-danger" onclick="tombol()">
                            <i class="fas fa-times"></i>
                            </button>
                        </a>
                        <a href="karyawan-ubah.php?nik=<?php echo $row['nik'] ?>">
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

    function banyakKaryawan(){
        include '../../config/koneksi.php';
        $bayak;
        $count = "SELECT count(*) as total FROM tb_karyawan";
        $query = mysqli_query($con, $count);
        $data = mysqli_fetch_assoc($query);
        $banyak = $data['total'];
        return $banyak;
    }

    function deleteKaryawan($nik){
        include '../../config/koneksi.php';

        $delete = "DELETE FROM tb_karyawan WHERE nik='$nik'";
        $query = mysqli_query($con, $delete);

        if ($query) {
            header("location:../master/karyawan-main.php");
            // echo "Berhasil";
        }else{
            echo mysqli_error($con);
        }
    }

    function getDataKaryawan($nik){
        include '../../config/koneksi.php';

        $data = [];

        $select = "SELECT * FROM tb_karyawan WHERE nik='$nik'";
        $query = mysqli_query($con,$select);

        while($row = mysqli_fetch_assoc($query)){
            $data[0] = $row['nik'];
            $data[1] = $row['nama_karyawan'];
            $data[2] = $row['alamat_karyawan'];
            $data[3] = $row['no_telp'];
            $data[4] = $row['tgl_lahir'];
            $data[5] = $row['jk'];
            $data[6] = $row['pendidikan'];
            $data[7] = $row['jabatan'];
        }

        return $data;
    }

    function updateKaryawan($nik,$nama_kar,$alamat_kar,$nomor_telp,$tgl_lahir,$jk,$pendidikan,$jabatan){
        include '../../config/koneksi.php';

        $update = "UPDATE tb_karyawan SET
                    nama_karyawan = '$nama_kar',
                    alamat_karyawan = '$alamat_kar',
                    no_telp = '$nomor_telp',
                    tgl_lahir = '$tgl_lahir',
                    jk = '$jk',
                    pendidikan = '$pendidikan',
                    jabatan = '$jabatan'
                    WHERE nik = '$nik'";

        $query = mysqli_query($con,$update);
        
        if ($query) {
            header("location:../master/karyawan-main.php");
            // echo "BERHASIL";
        }else{
            echo "Error : ".mysqli_error($con);
        }
    }