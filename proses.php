<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
    // ambil data dari formulir
    if($_POST['aksi']=='add'){
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $sekolah_asal = $_POST['sekolah_asal'];
    $jurusan = $_POST['jurusan'];
    // Format tanggal sesuai dengan format MySQL (YYY-MM-DD)
    $tanggal_mysql = date("Y-m-d", strtotime($tanggal_lahir));
    // buat query
    $sql = "INSERT INTO pendaftaran (nama, tanggal_lahir, jenis_kelamin, agama, alamat, desa, kecamatan, kota, provinsi, kode_pos, no_telepon, email, sekolah_asal, jurusan)
    VALUE ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$desa', '$kecamatan', '$kota', '$provinsi', '$kode_pos', '$no_telepon', '$email', '$sekolah_asal', '$jurusan')";
    $query = mysqli_query($db, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} else if($_POST['aksi'] == 'edit'){
    $id_pendaftaran =$_POST['id_pendaftaran'];
    $nama =$_POST['nama'];
    $tanggal_lahir =$_POST['tanggal_lahir'];
    $jenis_kelamin =$_POST['jenis_kelamin'];
    $agama =$_POST['agama'];
    $alamat =$_POST['alamat'];
    $desa =$_POST['desa'];
    $kecamatan =$_POST['kecamatan'];
    $kota =$_POST['kota'];
    $provinsi =$_POST['provinsi'];
    $kecamatan =$_POST['kecamatan'];
    $kode_pos =$_POST['kode_pos'];
    $no_telepon =$_POST['no_telepon'];
    $email =$_POST['email'];
    $sekolah_asal = $_POST['sekolah_asal'];
    $jurusan =$_POST['jurusan'];
    $tanggal_mysql = date("y-m-d", strtotime($tanggal_lahir));
    $sql = "UPDATE pendaftaran SET nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', desa='$desa', kecamatan='$kecamatan', kota='$kota', provinsi='$provinsi', kode_pos='$kode_pos', no_telepon='$no_telepon', email='$email', sekolah_asal='$sekolah_asal', jurusan='$jurusan' WHERE id_pendaftaran='$id_pendaftaran'";
    $query = mysqli_query($db, $sql);
    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php?status=sukses');
    }else{
        header('Location: index.php?status=gagal');
    }
    }
}
if( isset ($_GET['hapus'])){
    // ambil id dari query string
    $id_pendaftaran = $_GET['hapus'];

    // buat query hapus
    $sql = "DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);
    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php?status=sukses');
    }else{
        header('Location: index.php?status=gagal');
    }
}    

?> 