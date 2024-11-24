<?php
session_start();
if (!isset($_SESSION['formData'])) {
    echo "Data tidak tersedia.";
    exit;
}
$data = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Tanggal Lahir</th>
            <th>Browser</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($data['name']) ?></td>
            <td><?= htmlspecialchars($data['email']) ?></td>
            <td><?= htmlspecialchars($data['phone']) ?></td>
            <td><?= htmlspecialchars($data['dob']) ?></td>
            <td><?= htmlspecialchars($data['browserInfo']) ?></td>
        </tr>
    </table>

    <h2>Isi File:</h2>
    <table border="1">
        <tr>
            <th>Baris</th>
            <th>Konten</th>
        </tr>
        <?php foreach ($data['fileRows'] as $index => $row): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($row) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
