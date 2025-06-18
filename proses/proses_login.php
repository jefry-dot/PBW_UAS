<?php
session_start();
require '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['login_Un51k4'] = true;
            $_SESSION['nama'] = $user['nama_lengkap'];
            $_SESSION['id'] = $user['id'];

            header("Location: ../admin/index.php");
            exit;
        }
    }

    header("Location: ../login.php?message=" . urlencode("Username atau password salah."));
}
?>
