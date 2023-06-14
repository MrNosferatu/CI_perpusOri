<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 1em;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f2f2f2;
            padding: 2em;
            border-radius: 5px;
        }

        label {
            font-size: 1.2em;
            margin-bottom: 0.5em;
        }

        input {
            padding: 0.5em;
            border-radius: 3px;
            border: 1px solid #ccc;
            margin-bottom: 1em;
            width: 100%;
            max-width: 300px;
        }

        button[type="submit"] {
            padding: 0.5em 1em;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (session()->getFlashdata('errors')) {; ?>
            <div>
                <?= session()->getFlashdata('errors')?><br>
            </div>
            <?php
        } ?>

        <h1>Login</h1>
        <form id="login-form">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <button type="submit">Login</button>
        </form>

        <script>
            const loginForm = document.getElementById('login-form');

            loginForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                const response = await fetch('/login/authenticate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email,
                        password
                    })
                });
                if (response.ok) {
                    window.location.href = '<?= base_url('/dashboard') ?>';
                } else {
                    console.log(response)
                    const res = await response.json()
                    alert(res.message);
                }
            });
        </script>
    </div>
</body>

</html>