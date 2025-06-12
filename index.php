<?php 
    //Memanggil koneksi  
    include_once "koneksi.php"; 
    //Membuat Self Server 
    $server=$_SERVER['PHP_SELF']; 
?> 
<fieldset><legend>Silahkan Isi Form Pendaftaran Siswa Baru</legend> 
<form action="<?php echo $server;?>" method="post"> 
    <table width="376" border="0" align="left"> 
        <tr> 
            <td width="143">Nama</td> 
            <td width="8">:</td> 
            <td width="203"><input type="text" name="nama" id="textfield"></td> 
        </tr> 
        <tr> 
            <td>Tempat Tanggal Lahir</td> 
            <td>:</td> 
            <td><input type="text" name="ttl" id="textfield2"></td> 
        </tr> 
        <tr> 
            <td>Warga Negara</td> 
            <td>:</td> 
            <td><input type="text" name="warga_negara" id="textfield3"></td> 
        </tr>
        <tr> 
            <td>Alamat</td> 
            <td>:</td> 
            <td><input type="text" name="alamat" id="textfield4"></td> 
        </tr> 
        <tr> 
            <td>Email</td> 
            <td>:</td> 
            <td><input type="text" name="email" id="textfield5"></td> 
        </tr>
            <td>Nomor HP</td> 
            <td>:</td> 
            <td><input type="float" name="nomor_hp" id="textfield6"></td> 
        </tr>
            <td>Asal SMP</td> 
            <td>:</td> 
            <td><input type="text" name="asal_smp" id="textfield7"></td> 
        </tr>
            <td>Nama Ayah</td> 
            <td>:</td> 
            <td><input type="text" name="nama_ayah" id="textfield8"></td> 
        </tr> 
            <td>Nama Ibu</td> 
            <td>:</td> 
            <td><input type="text" name="nama_ibu" id="textfield9"></td> 
        </tr>
            <td>Penghasilan Kedua Orang Tua</td> 
            <td>:</td> 
            <td><input type="text" name="penghasilan_ortu" id="textfield10"></td> 
        </tr>
        <tr> 
            <td>&nbsp;</td> 
            <td>&nbsp;</td> 
            <td><input type="submit" name="Submit" id="button" value="Simpan"> 
            <input type="reset" name="Reset" id="button2" value="Batal"></td> 
            <input type="button" value="Lihat Data" onclick="window.location.href='lihat_data.php';"> 
        </tr> 
    </table> 
</form> 
</fieldset>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { //memastikan dikirim dengan methode post 
 
//Menerima data dengan Methode POST 
        $nama= $_POST['nama']   ?? ""; //operator ternary 
        $ttl= $_POST['ttl']   ?? ""; 
        $warga_negara= $_POST['warga_negara']  ?? ""; 
        $email= $_POST['email']       ?? "";
        $nomor_hp= $_POST['nomor_hp']       ?? ""; 
        $asal_smp= $_POST['asal_smp']       ?? "";
        $nama_ayah= $_POST['nama_ayah']       ?? "";
        $nama_ibu= $_POST['nama_ibu']       ?? "";
        $penghasilan_ortu= $_POST['penghasilan_ortu']       ?? "";
        
        //Menginputkan data dalam database 
        $query="INSERT into spsb (nama, ttl, warga_negara, email, nomor_hp, asal_smp, nama_ayah, nama_ibu, penghasilan_ortu) VALUES 
        ('$nama','$ttl','$warga_negara','$email','$nomor_hp','$asal_smp','$nama_ayah','$nama_ibu','$penghasilan_ortu')"; 
        $hasil=mysqli_query($conn, $query); 
        if ($hasil) { 
            echo "Data berhasil ditambahkan."; 
        } else { 
            echo "Terjadi kesalahan: " . mysqli_error($conn); 
        } 
} 