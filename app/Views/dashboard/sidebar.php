<div class="sidebar" id="sidebar">
    <ul id="menu">
        <li><a href="#" class="status active" id="Dashboard">Dashboard</a></li>
        <li><a href="admin" class="menu-item status">Admin</a></li>
        <li><a href="anggota" class="menu-item status">Anggota</a></li>
        <li><a href="buku" class="menu-item status">Buku</a></li>
        <li><a href="kategori" class="menu-item status">Kategori</a></li>
        <li><a href="peminjaman" class="menu-item status">Peminjaman</a></li>
        <li><a href="pengembalian" class="menu-item status">Pengembalian</a></li>
    </ul>
</div>

<style>
    .active {
        font-weight: bold;
    }

    .sidebar {
        width: 20%;
        background-color: #f1f1f1;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 2%;
    }

    .sidebar li {
        margin-bottom: 1%;
    }

    .sidebar a {
        display: block;
        text-decoration: none;
        color: #333;
        font-size: 2vw;
        white-space: nowrap;
        margin-bottom: 2vw;
    }

    @media(max-width: 768px) {
        .sidebar {
            width: 100%;
        }

        .sidebar ul {
            padding: 2%;
        }

        .sidebar li {
            margin-bottom: 2%;
        }
    }
</style>

<script>
    // Metode 1

    // Attach a click event listener to the menu items
    $('.menu-item').click(function (event) {
        event.preventDefault();

        var url = $(this).attr('href'); // Mendapatkan value dari attribute href pada tag menu

        // Melakukan ajax request
        $.ajax({
            url: url,
            method: 'GET',
            success: function (data) {
                // Mengganti element dengan id content dengan data yang diterima dari ajax request
                $('#content').html(data);
            },
            error: function () {
                console.log('Error occurred during AJAX request');
            }
        });

        // Mengganti class active pada menu yang sedang aktif
        $('.status').removeClass('active');
        $(this).addClass('active');
    });

    // Methode 2

    // Mendapatkan element dengan id Dashboard
    const Dashboard = document.getElementById('Dashboard');

    // Add event listener ketika Dashboard di klik
    Dashboard.addEventListener('click', loadDashboard);

    // Fungsi untuk fetch data dari server
    function loadDashboard() {
        fetch('<?= base_url('dashboard') ?>')
            .then(response => response.text())
            .then(data => {
                // Parsing data dari fetch dan mengambil element dengan id content
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, 'text/html');
                const targetElement = doc.getElementById('content');

                // Mengganti element dengan id content dengan data yang diterima dari fetch
                const container = document.getElementById('content');
                container.innerHTML = '';
                container.appendChild(targetElement);

                // Mengganti class active pada menu yang sedang aktif
                $('.status').removeClass('active');
                $(this).addClass('active');
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>