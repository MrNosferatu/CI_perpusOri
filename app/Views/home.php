<div class="container">
    <h1>Selamat Datang di Perpustakaan</h1>
    <p>Ini adalah halaman pertama dari perpustakaan.</p>
    <a href="<?= base_url('/login')?>">Login html</a>
<style>
a{
    display: inline-block;
    padding: 7px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-size:15px;
}
a:hover{
    background-color: #0062cc;
    color:#fff;
}
</style>
<button class="btn btn-primary" onclick="window.location.href='/login'">Login js</button>
</div>