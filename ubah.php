<?php
include 'koneksi.php';

// Mendapatkan id_pelanggan dari URL
$id_pelanggan = $_GET['id'];

// Mengambil data karyawan berdasarkan id_karyawan
$sql = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pelanggan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data pelanggan tidak ditemukan.";
    exit;
}

// Memproses form update jika data dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];

    // Update data karyawan
    $update_sql = "UPDATE pelanggan SET username = ?, password = ?, nama = ?, email = ?, no_telp = ? WHERE id_pelanggan = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssi", $username, $password, $nama, $email, $no_telp, $id_pelanggan);

    if ($stmt->execute()) {
        echo '<script>alert("Berhasil Mengubah Data pelanggan");</script>';
                echo '<script>location="menu.php"</script>';
    } else {
        echo '<script>alert("Gagal Mengubah Data pelanggan");</script>';
                echo '<script>location="menu.php"</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelanggan</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Ubah Data Pelanggan</h2>
    <form method="post" class="shadow p-4 rounded">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
    </form>
</div>

<!-- Link ke Bootstrap JS dan dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
