<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin: 0.5em 0;
        }

        .error-message {
            font-size: 1.2em;
            margin: 1em 0;
        }

        .button {
            background-color: #721c24; /* Dark red button */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #a71d2a; /* Darker red on hover */
        }

        .icon {
            font-size: 3em; /* Larger icon */
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <div class="icon">❌</div> <!-- Error icon -->
    <h1>Login Error</h1>
    <div class="error-message">Sorry, your username or password is invalid.</div>
    <h2>Please enter a valid username and password to log in.</h2>
    <a href="http://localhost:8080/falcon_backend/user_login/signin.php" class="button">Go Back to Login</a> <!-- Button to go back -->
</body>
</html>