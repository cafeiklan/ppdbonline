<p>
Berikut adalah formulir pendaftaran calon peserta didik baru <?php echo PPDBONLINE_NAMA_SEKOLAH;?> 
untuk tahun ajaran <?php echo $tahun_ajaran; ?>
</p>
<form id="form_pendaftaranppdb" method="POST">

<table id="table_formpendaftaranppdb">
	<tr>
		<td style="width: 5%;">1.</td>
		<td>Nama Lengkap</td>
		<td>: <input type="text" id="str_namalengkap" name="str_namalengkap" value="" maxlength="250" /></td>
	</tr>
	<tr>
		<td>2.</td>
		<td>Tempat/Tanggal Lahir</td>
		<td>: 
			<input type="text" id="str_namakotalahir" name="str_namakotalahir" value="" maxlength="100" /><br/>
			<select name="tgl_lahir">
				<option value="">-- Tanggal --</option>
				<?php
				for($i=1;$i<32;$i++){
					if($i<10){
						$i = '0'.$i;
					}
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
				?>
			</select>
			<select name="bln_lahir">
				<option value="">-- Bulan --</option>
				<?php
				for($i=1;$i<13;$i++){
					if($i<10){
						$i = '0'.$i;
					}
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
				?>
			</select>
			<select name="thn_lahir">
				<option value="">-- Tahun --</option>
				<?php
				$begin_year = date("Y") - 10;
				for($i=1;$i<11;$i++){
					$y = $begin_year - $i;
					echo '<option value="'.$y.'">'.$y.'</option>';
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>3.</td>
		<td colspan="2">Data Asal Sekolah</td>
	</tr>
	<tr>
		<td></td>
		<td>3.1 Nama Sekolah</td>
		<td>:
			<?php
			// jika array nama sekolah dalam rayon valid
			if( is_array( $namasekolah_dalamrayon) ):
			?>
			<select name="nama_sekolahasal">
				<option value="">Pilih Nama Sekolah (dalam Rayon)</option>
				<?php
				foreach($namasekolah_dalamrayon as $sekolah)
				{
					echo '<option value="'.$sekolah->nama.'">'.$sekolah->nama.'</option>';
				}
				?>
			</select>
			<?php
			endif;
			?>
			<input name="nama_sekolahasalnonrayon" value="" type="text" maxlength="150" />
		</td>
	</tr>
	<tr>
		<td></td>
		<td>3.2. SMP/MTs</td>
		<td>:
			<select name="jenis_sekolah">
				<option value="">-- Pilih --</option>
				<option value="1">SMP</option>
				<option value="2">MTs</option>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>3.2. Nama Kecamatan</td>
		<td>: <input type="text" id="str_namakecamatan" name="str_namakecamatansekolah" value="" maxlength="250" /></td>
	</tr>
	<tr>
		<td></td>
		<td>3.3. Nama Kabupaten/Kota</td>
		<td>: <input type="text" id="str_namakabkota" name="str_namakabkotasekolah" value="" maxlength="250" /></td>
	</tr>
	<tr>
		<td></td>
		<td>3.4 Nama Provinsi</td>
		<td>: <input type="text" id="str_namaprovinsi" name="str_namaprovinsisekolah" value="" maxlength="250" /></td>
	</tr>
	<tr>
		<td>4.</td>
		<td>Agama</td>
		<td>: <?php
				if( function_exists( 'selectbox_agama' ) ):
					echo selectbox_agama();
				endif;?>
		</td>
	</tr>
	<tr>
		<td>5.</td>
		<td>Alamat Lengkap</td>
		<td>: 
			<em>Nama jalan &amp; No/nama dusun</em><br/><input type="text" id="str_alamatlengkap" name="str_alamatlengkap" value="" maxlength="250" /><br/>
			<em>RT</em> <input type="text" name="num_rt" value="" maxlength="3" size="1"/>
			<em>RW</em> <input type="text" name="num_rw" value="" maxlength="3" size="1"/><br/>
			<em>Nama Desa/Kelurahan</em><br/><input type="text" name="str_namadesa" value="" maxlength="150" /><br/>
			<em>Nama Kecamatan</em><br/><input type="text" name="str_namakecamatan" value="" maxlength="150" /><br/>
		</td>
	</tr>
	<tr>
		<td>6.</td>
		<td colspan="2">Nama Orang Tua/Wali</td>
	</tr>
	<tr>
		<td></td>
		<td>6.1 Nama Ayah</td>
		<td>: <input type="text" name="str_namaayah" value="" maxlength="100" /> </td>
	</tr>
	<tr>
		<td></td>
		<td>6.2 Nama Ibu</td>
		<td>: <input type="text" name="str_namaibu" value="" maxlength="100" /> </td>
	</tr>
	<tr>
		<td>7.</td>
		<td colspan="2">Nomor Telepon</td>
	</tr>
	<tr>
		<td></td>
		<td>7.1 No. Telp Rumah</td>
		<td>: <input type="text" name="phone_rumah" value="" maxlength="18" /> </td>
	</tr>
	<tr>
		<td></td>
		<td>7.2 No. Telp Siswa</td>
		<td>: <input type="text" name="phone_siswa" value="" maxlength="18" /> </td>
	</tr>
</table>
<br/>
<p><strong>Rekapitulasi Nilai Raport</strong></p>
<table>
	<tr>
		<td rowspan="2">No.</td>
		<td rowspan="2">Mata Pelajaran</td>
		<td colspan="2">Kelas VII</td>
		<td colspan="2">Kelas VIII</td>
		<td>Kelas IX</td>
		<td rowspan="2">Jumlah</td>
		<td rowspan="2">Rata-rata</td>
	</tr>
	<tr>
		<td>Smt 1</td>
		<td>Smt 2</td>
		<td>Smt 1</td>
		<td>Smt 2</td>
		<td>Smt 1</td>
	</tr>
	<tr>
		<td>1.</td>
		<td>Bahasa Indonesia</td>
		<td><input type="text" name="bhs_1" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="bhs_2" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="bhs_3" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="bhs_4" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="bhs_5" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="bhs_total" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="bhs_average" value="" maxlength="3" size="1"/></td>
	</tr>
	<tr>
		<td>2.</td>
		<td>Bahasa Inggris</td>
		<td><input type="text" name="eng_1" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="eng_2" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="eng_3" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="eng_4" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="eng_5" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="eng_total" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="eng_average" value="" maxlength="3" size="1"/></td>
	</tr>
	<tr>
		<td>3.</td>
		<td>Matematika</td>
		<td><input type="text" name="mtk_1" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="mtk_2" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="mtk_3" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="mtk_4" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="mtk_5" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="mtk_total" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="mtk_average" value="" maxlength="3" size="1"/></td>
	</tr>
	<tr>
		<td>4.</td>
		<td>Ilmu Pengetahuan Alam</td>
		<td><input type="text" name="ipa_1" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ipa_2" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ipa_3" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ipa_4" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ipa_5" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ipa_total" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ipa_average" value="" maxlength="3" size="1"/></td>
	</tr>
	<tr>
		<td>5.</td>
		<td>Ilmu Pengetahuan Sosial</td>
		<td><input type="text" name="ips_1" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ips_2" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ips_3" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ips_4" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ips_5" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ips_total" value="" maxlength="3" size="1"/></td>
		<td><input type="text" name="ips_average" value="" maxlength="3" size="1"/></td>
	</tr>

</table>
<p>
	<input type="submit" value="Simpan" class="button"/>
</p>
</form>
