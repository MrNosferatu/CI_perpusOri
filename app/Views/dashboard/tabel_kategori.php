<table id="tabel-kategori">
  <tr>
    <th>Nama Kategori</th>
    <th>Deskripsi Kategori</th>
  </tr>
  <?php foreach ($kategori as $row) : ?>
    <tr>
      <td><?= $row['nama_kategori'] ?></td>
      <td><?= $row['deskripsi_kategori'] ?></td>
    </tr>
  <?php endforeach ?>
</table>