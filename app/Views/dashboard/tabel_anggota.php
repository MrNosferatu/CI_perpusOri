<table id="tabel-anggota">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Alamat</th>
    <th>Telepon</th>
  </tr>
  <?php foreach ($anggota as $row) : ?>
    <tr>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['alamat'] ?></td>
      <td><?= $row['telepon'] ?></td>
    </tr>
  <?php endforeach ?>
</table>