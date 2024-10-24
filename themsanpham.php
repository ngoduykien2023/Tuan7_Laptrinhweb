
<!------------------------------------------------------- code php cho them san pham ------------------------------------------------>

<?php
require("ketNoiDatabase.php");
if(isset($_POST["submit"]) ){
    $tensp = $_POST["ten"];
    $gia = $_POST["gia"];
    $mota = $_POST["mota"];
    $hinhanh=$_FILES['hinhanh']['name'];
    // tạo thư mục ⇒ note, tạo thư mục images ở bên ngoài trước nhé
    $target_dir = "./images/";
    // tạo dường dẫn đến file
    $target_file = $target_dir.$hinhanh;
    // check đủ các trường thông tin
    if (isset($tensp) && isset($gia) && isset($mota) && isset($hinhanh)) {
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$target_file);
        $sql = "INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `mota`, `imgURL`)
        VALUES (NULL, '$tensp', '$gia', '$mota', '$hinhanh')";
        mysqli_query($conn, $sql);
        echo "<script>alert('bạn đã thêm thành công')</script>";
        header("Location:trangchu.php");
        }
}
?>


<!-------------------------------------------------------------- code html ---------------------------------------------------------->

<body>
        <a href="trangchu.php">Quay về </a>
        <h1>Thêm sản phẩm</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="ten">Tên sản phẩm</label>
                <input type="text" id='ten' name="ten" required>
            </div>
            <div>
                <label for="gia">Gía sản phẩm</label>
                <input type="number" id='gia' name="gia" required>
            </div>
            <div>
                <label for="file">Hình ảnh </label>
                <input type="file" id="file" name="hinhanh" value="Choose File" required>
            </div>
            <div>
                <label for="mota">Mô tả </label>
                <textarea name="mota" id='mota' cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" name="submit">
                Thêm sản phẩm
            </button>
        </form>
</body>


<!-------------------------------------------------------------- code css ----------------------------------------------------------->

<style>
    form {
    width: 600px;
}

div {
    display: flex;
    margin-bottom: 20px;
}

label {
    width: 100px;
}

input,
textarea {
    flex: 1;
}

button {
    margin-left: 100px;
    padding: 6px 12px;
    color: #2F1C25;
    background-color: transparent;
    border: 3px solid #D7B0DF;
    border-radius: 8px;
    cursor: pointer;
}
</style>