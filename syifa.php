<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola User</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        background-color: rgb(213, 230, 235);
      }

      .container {
        display: flex;
        width: 100%;
      }

      .sidebar {
        width: 20%;
        height: 250%;
        background-color: rgb(94, 211, 247);
        padding: 25px;
        text-align: center;
      }

      .sidebar h2 {
        margin: 0;
      }

      .sidebar img {
        width: 100px;
        height: 100px;
        margin: 20px auto;
        border-radius: 50%;
      }

      .sidebar button {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: none;
        background-color: rgb(127, 245, 127);
        color: white;
        cursor: pointer;
        border-radius: 15px;
      }

      .sidebar button:hover {
        background-color: rgb(193, 248, 196);
      }

      .main-content {
        width: 80%;
        padding: 20px;
      }

      .main-content h1 {
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 15px;
      }

      .form-group label {
        display: block;
        margin-bottom: 5px;
      }

      .form-group input,
      .form-group select {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
      }

      .buttons {
        display: flex;
        gap: 10px;
      }

      .buttons button {
        padding: 10px 20px;
        background-color: #3050d2;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 15px;
      }

      .buttons button:hover {
        background-color: #8fa1ec;
      }

      .search-bar {
        width: 100%;
        display: flex;
        padding: 20px;
        margin: 20px 0;
        box-sizing: border-box;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      table th,
      table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
      }

      table th {
        background-color: #e7bb28;
      }
    </style>
  </head>
  <body>
  <div class="container">
    <div class="sidebar">
      <h2>Admin</h2>
      <img src="kelola.png" />
      <button>Kelola User</button>
      <button>Kelola Laporan</button>
      <button>Logout</button>
    </div>
    <div class="main-content">
      <h1>Kelola User</h1>

      <form method="POST" action="">
        <div class="form-group">
          <label for="tipe-user">Tipe User</label>
          <select id="tipe-user" name="tipeUser">
            <option value="Gudang">Gudang</option>
            <option value="Kasir">Kasir</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" placeholder="Nama" />
        </div>
        <div class="form-group">
          <label for="telepon">Telepon</label>
          <input type="text" id="telepon" name="telepon" placeholder="Telepon" />
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" id="alamat" name="alamat" placeholder="Alamat" />
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Username" />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Password" />
        </div>
        <div class="buttons">
          <button type="submit" name="tambah">Tambah</button>
          <button type="button">Edit</button>
          <button type="button">Hapus</button>
        </div>
      </form>

      <div class="search-bar">
        <input type="text" placeholder="Cari user" />
      </div>

      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "login";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tipeUser = $_POST['tipeUser'];
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $alamat = $_POST['alamat'];
  $sql = "INSERT INTO tabel_user (id, tipe, nama, alamat,
  telepon) VALUES (NULL, '$tipeUser', '$nama', '$alamat', '$telepon');";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
      $sql = "SELECT * FROM tabel_user";
      $result = $conn->query($sql); ?>
        <table>
          <thead>
            <tr>
              <th>Id User</th>
              <th>Tipe User</th>
              <th>Nama User</th>
              <th>Alamat</th>
              <th>Telepon</th>
            </tr>
          </thead>
          <tbody>
            <?php
        while($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["tipe"]; ?></td>
              <td><?php echo $row["nama"]; ?></td>
              <td><?php echo $row["alamat"]; ?></td>
              <td><?php echo $row["telepon"]; ?></td>
            </tr>
            <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>