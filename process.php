<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dob = trim($_POST['dob']);
    $browserInfo = $_SERVER['HTTP_USER_AGENT'];
    $errors = [];

    // Validasi input
    if (strlen($name) < 3 || strlen($name) > 50) {
        $errors[] = "Nama harus antara 3-50 karakter.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }
    if (!preg_match('/^\d+$/', $phone)) {
        $errors[] = "Nomor telepon hanya boleh berisi angka.";
    }

    // Validasi file
    if (isset($_FILES['textFile'])) {
        $file = $_FILES['textFile'];
        if ($file['size'] > 1024 * 1024) {
            $errors[] = "Ukuran file tidak boleh lebih dari 1MB.";
        }
        if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'txt') {
            $errors[] = "Hanya file teks (.txt) yang diperbolehkan.";
        }
    } else {
        $errors[] = "File teks wajib diunggah.";
    }

    // Jika ada kesalahan
    if (!empty($errors)) {
        echo "<h1>Kesalahan Validasi</h1><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        exit;
    }

    // Baca isi file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileRows = explode("\n", trim($fileContent));

    // Simpan data untuk result.php
    session_start();
    $_SESSION['formData'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'dob' => $dob,
        'browserInfo' => $browserInfo,
        'fileRows' => $fileRows,
    ];
    header("Location: result.php");
    exit;
}
?>
