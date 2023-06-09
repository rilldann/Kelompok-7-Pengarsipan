<?php
if(isset($_FILES['pdfFile'])) {
    $file = $_FILES['pdfFile'];

    // Periksa apakah terjadi kesalahan saat mengunggah file
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Terjadi kesalahan saat mengunggah file. Kode error: " . $file['error']);
    }

    // Periksa jenis file, pastikan hanya menerima file PDF
    $fileType = mime_content_type($file['tmp_name']);
    if ($fileType !== 'application/pdf') {
        die("Jenis file tidak valid. Hanya file PDF yang diizinkan.");
    }

    // Tentukan direktori tempat file akan disimpan
    $uploadDir = 'uploads/';
    $fileName = basename($file['name']);
    $uploadPath = $uploadDir . $fileName;

    // Pindahkan file yang diunggah ke direktori tujuan
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        echo "File berhasil diunggah.";
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>
