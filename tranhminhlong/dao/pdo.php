<?php
function pdo_get_connection()
{
    // Thiết lập thông tin kết nối đến cơ sở dữ liệu MySQL
    $dburl = "mysql:host=localhost;dbname=tranhminhlong;charset=utf8";
    $username = 'root';
    $password = '';

    // Tạo đối tượng PDO và thiết lập chế độ xử lý lỗi
    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Trả về đối tượng kết nối PDO đã được thiết lập
    return $conn;
}

function pdo_execute($sql)
{
    // Hàm thực hiện một truy vấn SQL không trả về kết quả
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query($sql)
{
    // Hàm thực hiện một truy vấn SQL và trả về tất cả các dòng kết quả
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_one($sql)
{
    // Hàm thực hiện một truy vấn SQL và trả về một dòng kết quả
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_value($sql)
{
    // Hàm thực hiện một truy vấn SQL và trả về giá trị đầu tiên của dòng kết quả
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
?>