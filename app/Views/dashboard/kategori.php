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
    <h2>Kategori</h2>
    <form id="myForm" method="post">
        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" id="nama_kategori" name="nama_kategori"><br><br>
        <label for="deskripsi_kategori">Deskripsi Kategori:</label>
        <input type="text" id="deskripsi_kategori" name="deskripsi_kategori"><br><br>
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
                url: '<?= base_url('/kategoriinput') ?>',
                type: 'POST',
                data: formData,
                success: function (response) {
                    alert('Data inserted successfully!'); // show pop-up message
                    $('#myForm')[0].reset(); // clear form
                    // Send an AJAX request to the controller
                    const xhr = new XMLHttpRequest();
                    xhr.open('get', '/updateKategoriTabel');
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            // Update the table content
                            const table = document.getElementById('tabel-kategori');
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