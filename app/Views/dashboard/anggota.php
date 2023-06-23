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
<!-- HTML form -->
<form id="myForm" method="post">
    <label for="name">Name:</label>
    <input type="text" id="nama" name="nama"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Submit">
  </form>
  <table>
  <tr>
    <th>Name</th>
    <th>Email</th>
  </tr>
  <?php foreach ($anggota as $row) : ?>
    <tr>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['email'] ?></td>
    </tr>
  <?php endforeach ?>
</table>
</div>

  <!-- jQuery AJAX -->
  <script>
$(document).ready(function() {
  $('#myForm').submit(function(event) {
    event.preventDefault(); // prevent default form submission

    // get form data
    var formData = $(this).serialize();

    // send form data to PHP script using AJAX
    $.ajax({
      url: '<?= base_url('/anggotainput')?>',
      type: 'POST',
      data: formData,
      success: function(response) {
        alert('Data inserted successfully!'); // show pop-up message
        $('#myForm')[0].reset(); // clear form

      },
      error: function(xhr, status, error) {
        alert('Data not inserted'); // show pop-up message
      }
    });
  });
});
    </script>