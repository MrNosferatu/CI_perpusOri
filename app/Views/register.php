<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <form id="signup-form" action="<?= base_url('/register')?>" method="post">
    <div class="row">
    <div class="col">
    
    </div>
  </div>
    <div class="container p-5">
    <h1>Signup Form</h1>
    <?php if(session()->getFlashdata('errors')) {;?>
    <div style='color: red;'>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <?= $error ?><br>
    <?php endforeach;}?>
    </div>
        <div class="form-group">
            <label for="nama" class="form-label">Nama Lenkap</label>
            <input type="text" id="nama" name="nama"  class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email"  class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password"  class="form-control" required>
        </div>
        <div>
            <label for="agreement">
            <input type="checkbox" id="agreement" name="agreement" required>
            Saya menyetujui syarat dan ketentuan yang berlaku
            </label>
        </div>
        <div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">Sign Up</button>
</div>
        </div>

    </form>
    <script>
        const signupForm = document.getElementById('signup-form');
        signupForm.addEventListener('submit', function(event) {
            const namaInput = document.getElementById('nama');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const agreementInput = document.getElementById('agreement');
            
            if (!isValidName(namaInput.value)){
                alert('Nama lengkap harus diisi dan minimal 3 karakter');
                namaInput.focus();
                event.preventDefault();
                return false;
            }
            if (!isValidEmail(emailInput.value)){
                alert('Email tidak valid');
                emailInput.focus();
                event.preventDefault();
                return false;
            }
            if (!isValidPassword(passwordInput.value)){
                alert('Password minimal 8 karakter');
                passwordInput.focus();
                event.preventDefault();
                return false;
            }
            if (!agreementInput.checked){
                alert('Anda harus menyetujui syarat dan ketentuan');
                event.preventDefault();
                return false;
            }

            // // Validasi nama
            // function isValidName(nama){
            //     return nama.length >= 3;
            // }
            // // Validasi email
            // function isValidEmail(email){
            //     // Regex untuk validasi email
            //     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            //     return emailRegex.test(email);
            // }
            // // Validasi password
            // function isValidPassword(password){
            //     return password.length >= 8;
            // }
        })
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>