<?php 
    //Memanggil koneksi database 
    include_once "koneksi.php";

    //Memanggil data dari database 
    $panggil="SELECT * from spsb"; 
    $hasil=mysqli_query($conn,$panggil); 
    
    echo"<h4><center>Pendaftaran Siswa Baru</center></H4>"; 
    echo "<table width='600' border='1'> 
    <tr bgcolor='blue'>
        <th>No</th> 
        <th>Nama</th>
        <th>TTL</th>
        <th>Warga Negara</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Nomor HP</th>
        <th>Asal SMP</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Penghasilan Kedua Orang Tua</th>
        <th colspan='2'>Aksi</th> 
    </tr>";
    
    $nomor_urut=0; 
    while($tampil=mysqli_fetch_array($hasil)){ 
        $nama=$tampil['nama']; 
        $ttl=$tampil['ttl']; 
        $warga_negara=$tampil['warga_negara']; 
        $alamat=$tampil['alamat'];
        $email=$tampil['email']; 
        $nomor_hp=$tampil['nomor_hp'];
        $asal_smp=$tampil['asal_smp'];
        $nama_ayah=$tampil['nama_ayah'];
        $nama_ibu=$tampil['nama_ibu'];
        $penghasilan_ortu=$tampil['penghasilan_ortu'];
        //Menambahkan nomor urut dengan perulangan 
        $nomor_urut++; 
        
        echo " 
        <tr>
            <td>$nomor_urut</td>
            <td>$nama</td>
            <td>$ttl</td> 
            <td>$warga_negara</td>
            <td align='center'>$alamat</td> 
            <td align='center'>$email</td>
            <td align='center'>$nomor_hp</td>
            <td align='center'>$asal_smp</td> 
            <td align='center'>$nama_ayah</td>
            <td align='center'>$nama_ibu</td>
            <td align='center'>$penghasilan_ortu</td>
            <td>
                <a href='edit_data.php?nama=$nama'>Edit</a></td>;
            </td>
            <td>
                <a href='hapus_data.php?nama=$nama'>Hapus</a></td>;
            </td>
        </tr>"; 
        }
?> 