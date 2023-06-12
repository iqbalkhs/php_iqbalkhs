<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "testdb";


$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

//Query
$sql = "SELECT person.nama AS nama, person.alamat AS alamat, hobi.hobi AS hobi FROM hobi JOIN person ON person.id = hobi.person_id WHERE person.nama LIKE '%$nama%' OR person.alamat LIKE '%$alamat%' ";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Mengisi array dengan data yang ditemukan
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'hobi' => $row['hobi']
        );
    }
}

$conn->close();

// Mengembalikan hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>