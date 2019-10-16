<?php

    function login($uname,$passwd){
        include '../config/koneksi.php';

        $select = "SELECT * FROM tb_karyawan WHERE username='$uname' AND password = '$passwd'";
        $query = mysqli_query($con, $select);
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['username'] = $uname;
            header("location:../index.php");
        }else{
            echo "ERROR ".mysqli_error($con);
        }
    }

    function getHakAkses($username){
        include 'config/koneksi.php';

        $data = [];

        $select = "SELECT m1,m2,m3,t1,t2,l1,nama_karyawan FROM tb_karyawan WHERE username='$username'";
        $query = mysqli_query($con,$select);

        while($row = mysqli_fetch_assoc($query)){
            $data[0] = $row['m1'];
            $data[1] = $row['m2'];
            $data[2] = $row['m3'];
            $data[3] = $row['t1'];
            $data[4] = $row['t2'];
            $data[5] = $row['l1'];
            $data[6] = $row['nama_karyawan'];
        }

        return $data;
    }

    function getHakAkses2($username){
        include '../../config/koneksi.php';

        $data = [];

        $select = "SELECT m1,m2,m3,t1,t2,l1,nama_karyawan FROM tb_karyawan WHERE username='$username'";
        $query = mysqli_query($con,$select);

        while($row = mysqli_fetch_assoc($query)){
            $data[0] = $row['m1'];
            $data[1] = $row['m2'];
            $data[2] = $row['m3'];
            $data[3] = $row['t1'];
            $data[4] = $row['t2'];
            $data[5] = $row['l1'];
            $data[6] = $row['nama_karyawan'];
        }

        return $data;
    }