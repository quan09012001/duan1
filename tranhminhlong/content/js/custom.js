// Hàm này được sử dụng để hiển thị một hộp thoại xác nhận khi bạn thực hiện thao tác xóa.
function checkDelete() {
    var x = confirm("Bạn chắc muốn xóa chứ?");
    if (x) {
        return true; // Nếu xác nhận OK, hành động xóa được thực hiện.
    } else {
        return false; // Nếu xác nhận Cancel, hành động xóa bị ngăn.
    }
}

// Hàm này tự động thay đổi kích thước của textarea dựa trên nội dung người dùng nhập.
function expandTextarea(id) {
    document.getElementById(id).addEventListener('keyup', function() {
        this.style.overflow = 'hidden';
        this.style.minHeight = '106.8px';
        this.style.height = 0;
        this.style.height = this.scrollHeight + 'px';
    }, false);
}
expandTextarea('txtarea');

// Hàm này hiển thị thông báo dạng toast khi trang web được tải xong.
$(document).ready(function() {
    $('.toast').toast('show');
});

// Chọn và bỏ chọn các checkbox trên trang list.php.
$(document).ready(function() {
    var checkboxItem = ":checkbox";
    $("#select-all").click(function() {
        if (this.checked) {
            $(checkboxItem).each(function() {
                this.checked = true;
            });
        } else {
            $(checkboxItem).each(function() {
                this.checked = false;
            });
        }
    });

    $("#deleteAll").click(function() {
        if ($(":checked").length === 0) {
            alert("Vui lòng chọn ít nhất một mục!");
            return false;
        }
    });
});
