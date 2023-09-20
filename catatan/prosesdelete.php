<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contoh Modal Konfirmasi Penghapusan Catatan</title>
    <style>
        /* Gaya untuk modal dialog */
        #modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        #modal-content {
            background-color: #fff;
            width: 300px;
            margin: 200px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #modal h2 {
            margin-top: 0;
        }

        #modal button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        #modal button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Modal dialog validasi hapus -->
    <div id="modal">
        <div id="modal-content">
            <h2>Konfirmasi Hapus Catatan</h2>
            <p>Anda yakin ingin menghapus catatan ini?</p>
            <button onclick="hapusData()">Ya</button>
            <button onclick="batalHapus()">Batal</button>
        </div>
    </div>

    <?php
    // Buat koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "diary");

    // Cek jika request method adalah GET dan terdapat parameter 'iddiary' di URL
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['iddiary'])) {
        $iddiary = $_GET['iddiary'];

        // Buat query SQL untuk menghapus catatan berdasarkan iddiary
        $query = "DELETE FROM catatan WHERE iddiary = $iddiary";

        // Eksekusi query untuk menghapus catatan
        mysqli_query($koneksi, $query);

        // Redirect ke halaman beranda.php setelah penghapusan
        header("Location: ../beranda.php");
        exit();
    }
    ?>

    <script>
        let idToDelete;

        function konfirmasiHapus(iddiary) {
            idToDelete = iddiary;
            document.getElementById('modal').style.display = 'block';
        }

        function hapusData() {
            window.location.href = 'prosesdelete.php?iddiary=' + idToDelete;
        }

        function batalHapus() {
            idToDelete = null;
            document.getElementById('modal').style.display = 'none';
        }
    </script>
</body>
</html>
