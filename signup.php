<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Regjistrim</title>
    <link rel="stylesheet" href="signup.css" />
    <style>
        .message-container {
            text-align: center;
            border-radius: 4px;
            font-size: 12px;
            padding: 0;
        }

        .message-container.success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .message-container.error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }

        .signup-form h2 {
            text-align: center;
            color: #0174be;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="signup-form" id="signupForm">
            <h2>Krijo llogarinë</h2>

            <div id="messageContainer"></div>

            <label for="name">Emri</label>
            <input type="text" id="name" name="name" required />

            <label for="surname">Mbiemri</label>
            <input type="text" id="surname" name="surname" required />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />

            <label for="phone">Telefoni</label>
            <input type="text" id="phone" name="phone" required />

            <label for="password">Fjalëkalimi</label>
            <input type="password" id="password" name="password" required />

            <label for="confirmPassword">Përsërit Fjalëkalimin</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required />

            <button type="submit">Regjistrohu</button>
        </form>
    </div>

    <script>
        document.getElementById('signupForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const messageContainer = document.getElementById('messageContainer');
            messageContainer.innerHTML = '';
            messageContainer.className = 'message-container';

            try {
                const formData = new FormData(this);

                const response = await fetch('process_signup.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                if (data.success) {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        messageContainer.classList.add('success');
                        messageContainer.innerHTML = `<p>${data.message}</p>`;
                    }
                } else {
                    messageContainer.classList.add('error');
                    if (data.errors && data.errors.length > 0) {
                        messageContainer.innerHTML = `<ul>${data.errors.map(error => `<li>${error}</li>`).join('')}</ul>`;
                    } else {
                        messageContainer.innerHTML = `<p>${data.message || 'Ndodhi një gabim gjatë përpunimit'}</p>`;
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                messageContainer.classList.add('error');
                messageContainer.innerHTML = '<p>Ndodhi një gabim në komunikim me serverin</p>';
            }
        });
    </script>
</body>

</html>