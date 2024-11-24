<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Form Pendaftaran</h1>
    <form id="registrationForm" action="process.php" method="post" enctype="multipart/form-data">
        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required minlength="3" maxlength="50"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Nomor Telepon:</label>
        <input type="text" id="phone" name="phone" required pattern="\d+" maxlength="15"><br>

        <label for="dob">Tanggal Lahir:</label>
        <input type="date" id="dob" name="dob" required><br>

        <label for="textFile">Upload File Teks:</label>
        <input type="file" id="textFile" name="textFile" required accept=".txt"><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
