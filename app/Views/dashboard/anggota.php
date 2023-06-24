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
<h2>Input Anggota</h2>

<!-- HTML form -->
<form id="myForm" method="post">
    <label for="name">Name:</label>
    <input type="text" id="nama" name="nama"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat"><br><br>
    <label for="telepon">No Telepon:</label>
    <input type="text" id="telepon" name="telepon"><br><br>
    <button id="update-button" type="submit" value="Submit">Add</button>
  </form>
  <h2>Daftar Anggota</h2>


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
  // Send an AJAX request to the controller
  const xhr = new XMLHttpRequest();
  xhr.open('get', '/updateAnggotaTabel');
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Update the table content
      const table = document.getElementById('tabel-anggota');
      table.innerHTML = xhr.responseText;
    } else {
      console.error('Error:', xhr.statusText);
    }
  };
  xhr.onerror = function() {
    console.error('Error:', xhr.statusText);
  };
  xhr.send();
      },
      error: function(xhr, status, error) {
        alert('Data not inserted'); // show pop-up message
      }
    });
  });
});


    </script>