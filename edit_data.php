<?php
include_once "koneksi.php";

if (isset($_GET['nama'])) {
    echo "Nama tidak ditemukan.";
    exit;
}

    $nama = $_GET['nama'];

    $query = "SELECT FROM sbsp WHERE nama = '$nama'";
    $hasil = mysqli_query($conn, $query);

    if (mysqli_num_rows($hasil) == 0) {
        echo "Data pendaftar tidak ditemukan.";
        exit;
    }

    $data = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
        $nama= $_POST['nama'];
        $ttl= $_POST['ttl']; 
        $warga_negara= $_POST['warga_negara']; 
        $email= $_POST['email'];
        $nomor_hp= $_POST['nomor_hp']; 
        $asal_smp= $_POST['asal_smp'];
        $nama_ayah= $_POST['nama_ayah'];
        $nama_ibu= $_POST['nama_ibu'];
        $penghasilan_ortu= $_POST['penghasilan_ortu'];

        $update = "UPDATE sbsp SET
            nama='$nama',
            ttl='$ttl', 
            warga_negara = '$warga_negara', 
            email= '$email'
            nomor_hp= '$nomor_hp',
            asal_smp= '$asal_smp',
            nama_ayah= '$nama_ayah',
            nama_ibu= '$nama_ibu',
            penghasilan_ortu= '$penghasilan_ortu'
            WHERE nama= '$nama'";
    
    if (mysqli_query($conn, $update)) {
        echo "<script>
                alert('Data berhasil diperbarui.');
                window.location.href='lihat_data.php';
                </script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}    
?>

<form method="post" action="">
    <div>
        <h3>Edit Data Buku</h3>
    </div>

    <div>
        <label>Nama</label>
        <input type="text" value="<?php echo $data['nama']; ?>" disabled>
    </div>

    <div>
        <label>Tempat Tanggal Lahir</label>
        <input type="text" name="ttl" placeholder="Masukkan TTL" value="<?php echo htmlspecialchar($data['ttl']); ?>" required>
    </div>

    <div>
        <label>Warga Negara</label>
        <input type="text" name="warga_negara" placeholder="Masukkan Warga Negara" value="<?php echo htmlspecialchar($data['warga_negara']); ?>" required>
    </div>

    <div>
        <label>Email</label>
        <input type="text" name="email" placeholder="Masukkan email" value="<?php echo htmlspecialchar($data['email']); ?>" required>
    </div>

    <div>
        <label>Nomor HP</label>
        <input type="text" name="nomor_hp" placeholder="Masukkan nomor HP" value="<?php echo htmlspecialchar($data['nomor_hp']); ?>" required>
    </div>

    <div>
        <label>Asal SMP</label>
        <input type="text" name="asal_smp" placeholder="Masukkan Asal SMP" value="<?php echo htmlspecialchar($data['asal_smp']); ?>" required>
    </div>

    <div>
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah" placeholder="Masukkan nama ayah" value="<?php echo htmlspecialchar($data['nama_ayah']); ?>" required>
    </div>

    <div>
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" placeholder="Masukkan nama ibu" value="<?php echo htmlspecialchar($data['nama_ibu']); ?>" required>
    </div>

    <div>
        <label>Penghasilan Kedua Orang Tua</label>
        <input type="text" name="penghasilan_ortu" placeholder="Masukkan penghasilan" value="<?php echo htmlspecialchar($data['penghasilan_ortu']); ?>" required>
    </div>

    <input type="submit" name="submit" value="Simpan Perubahan">
    <a href="lihat_data.php">Kembali</a>
</form>
