<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Thêm Sản Phẩm</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Trang Chủ</li>
            <li><i class="fa fa-plus"></i>Thêm Sản Phẩm</li>
        </ol>
    </div>
</div>

<?php
include './includes/category_function.php';
$result = getAllCategories();
?>

<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Thêm Sản Phẩm
            </header>
            <div class="panel-body">
                <form action="./actions/product_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="addProduct">
                    <div class="form-group">
                        <label for="product_name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nhập tên sản phẩm" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm" required>
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Giá Giảm</label>
                        <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="Nhập giá giảm" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Thể Loại</label>
                        <select class="form-control" id="category" name="category_id" required>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có thể loại nào</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div id="imagePreviewContainer" style="margin-top: 20px;">
                        <img id="imagePreview" src="" alt="Image Preview" style="width: 50px; height: 50px; border-radius: 20px; margin-bottom: 10px; display: none;">
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Nhập mô tả" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                </form>
            </div>
        </section>
    </div>
</div>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.style.display = 'block';
    }
</script>