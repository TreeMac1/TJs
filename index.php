<!DOCTYPE HTML>
<html lang=en>

<head>
    <title>Welcome to Disco Juice!</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            min-height: 100vh;
            margin: 0;
            font-family: sans-serif;
            background-color: #f5f5dc;
        }

        h1 {
            margin-bottom: 20px;
            animation: color-change 5s infinite alternate;
            font-family: 'Great Vibes', cursive;
            font-size: 3em;
        }

        @keyframes color-change {
            0% {
                color: green;
            }
            50% {
                color: orange;
            }
            100% {
                color: blue;
            }
        }

        img {
            display: block;
            margin: 20px auto;
            max-width: 200px;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        img:hover {
            transform: scale(1.05);
        }

        img:active {
            transform: scale(0.95);
        }

        p {
            margin-bottom: 10px;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        button {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease-in-out, background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
            transform: scale(1.02);
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        button:active {
            transform: scale(0.98);
        }

        footer {
            margin-top: auto;
            padding: 20px 0;
            width: 100%;
            background-color: #f0f0f0;
            animation: fade-in 1s ease-in-out;
            opacity: 0;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        footer p {
            margin: 0;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>

<body>

    <h1>Welcome!</h1>
    <img alt="Orange Juice" src="images/discojuice.jpg" />
    <p>Thanks for stopping by!</p>
    <p>Please purchase our <a href="./read.php">products</a>. We have good juices.</p>

    <h2>Orange Juice</h2>
    <p>Buy it because it's:</p>
    <ol type="a">
        <li>Orange</li>
        <li>Tasty</li>
        <li>Pulpy</li>
    </ol>
    <p>
        <button onclick="alert('Thanks for your purchase')">Buy Now</button>
    </p>

    <h2 id="apple">Apple Juice</h2>
    <p>Most consistently ranked &gt;&starf;&starf;.</p>
    <table>
        <thead>
            <tr>
                <th>Amount Per Serving</th>
                <th>%DV</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Fat 0 g</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>Sodium 30 mg</td>
                <td>1%</td>
            </tr>
            <tr>
                <td>Total Carbohydrates 29 g</td>
                <td>10%</td>
            </tr>
            <tr>
                <td>Sugar 28 g</td>
                <td></td>
            </tr>
            <tr>
                <td>Protein 0 g</td>
                <td></td>
            </tr>
            <tr>
                <td>Vitamin C </td>
                <td>120%</td>
            </tr>
            <tr>
                <td>Iron </td>
                <td>6%</td>
            </tr>
            <tr>
                <td>Potassium 290 mg</td>
                <td>6%</td>
            </tr>
        </tbody>
    </table>
    <p>
        <button onclick="document.getElementById('apple').style.color='red'">Buy Now</button>
    </p>

    <footer>
        <p>This site is sponsored by <a href="//www.wctc.edu">www.wctc.edu</a> and <a href="https://www.google.com/search?q=funny+cat">www.google.com</a></p>
    </footer>

</body>

</html>