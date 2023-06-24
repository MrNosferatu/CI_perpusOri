<style>
  .content {
    max-width: 100%;
    padding: 0 2%;
    margin: 0 auto;
    box-sizing: border-box;
  }

  h2 {
    font-size: 3vw;
    text-align: center;
  }

  p {
    font-size: 2vw;
    text-align: justify;
  }

  @media (max-width: 768px) {
    h2 {
      font-size: 4vw;
    }

    p {
      font-size: 3vw;
    }
  }
</style>
<div class="content">
  <h2>Buku</h2>
  <form id="myForm" method="post">
    <label for="judul">judul:</label>
    <input type="text" id="judul" name="judul"><br><br>
    <label for="pengarang">pengarang:</label>
    <input type="text" id="pengarang" name="pengarang"><br><br>
    <label for="penerbit">penerbit:</label>
    <input type="text" id="penerbit" name="penerbit"><br><br>
    <label for="tahun_terbit">tahun_terbit:</label>
    <input type="text" id="tahun_terbit" name="tahun_terbit"><br><br>
    <label for="jumlah_halaman">jumlah_halaman:</label>
    <input type="text" id="jumlah_halaman" name="jumlah_halaman"><br><br>
    <label for="sinopsis">sinopsis:</label>
    <input type="text" id="sinopsis" name="sinopsis"><br><br>
    <button id="update-button" type="submit" value="Submit">Add</button>
  </form>
</div>
<script>
  $(document).ready(function () {
    $('#myForm').submit(function (event) {
      event.preventDefault(); // prevent default form submission

      // get form data
      var formData = $(this).serialize();

      // send form data to PHP script using AJAX
      $.ajax({
        url: '<?= base_url('/bukuinput') ?>',
        type: 'POST',
        data: formData,
        success: function (response) {
          alert('Data inserted successfully!'); // show pop-up message
          $('#myForm')[0].reset(); // clear form
          // Send an AJAX request to the controller
          const xhr = new XMLHttpRequest();
          xhr.open('get', '/updateBukuTabel');
          xhr.setRequestHeader('Content-Type', 'application/json');
          xhr.onload = function () {
            if (xhr.status === 200) {
              // Update the table content
              const table = document.getElementById('tabel-buku');
              table.innerHTML = xhr.responseText;
            } else {
              console.error('Error:', xhr.statusText);
            }
          };
          xhr.onerror = function () {
            console.error('Error:', xhr.statusText);
          };
          xhr.send();
        },
        error: function (xhr, status, error) {
          alert('Data not inserted'); // show pop-up message
        }
      });
    });
  });


</script>