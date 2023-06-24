<table id="tabel-buku">
  <tr>
    <th>judul</th>
    <th>pengarang</th>
    <th>penerbit</th>
    <th>tahun_terbit</th>
    <th>jumlah_halaman</th>
    <th>sinopsis</th>
  </tr>
  <?php foreach ($buku as $row) : ?>
    <tr>
      <td><?= $row['judul'] ?></td>
      <td><?= $row['pengarang'] ?></td>
      <td><?= $row['penerbit'] ?></td>
      <td><?= $row['tahun_terbit'] ?></td>
      <td><?= $row['jumlah_halaman'] ?></td>
      <td><?= $row['sinopsis'] ?></td>
    </tr>
  <?php endforeach ?>
</table>