<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Cập Nhật Sản Phẩm</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Danh Sách Sản Phẩm</li>
            <li><i class="fa fa-plus"></i>Cập Nhật Sản Phẩm</li>
        </ol>
    </div>
</div>

<?php
include './includes/product_function.php';
include './includes/category_function.php';

$result = getAllCategories();

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    $product = getProductById($productId);
}
?>

<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Sản Phẩm
            </header>
            <div class="panel-body">
                <form action="./actions/category_action.php" method="post">
                    <input type="hidden" name="action" value="editPProduct">
                    <div class="form-group">
                        <label for="product_id">Mã Sản Phẩm</label>
                        <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $product['product_id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="product_name" value="<?php echo $product['product_name'] ?>" name="product_name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product['quantity'] ?>" placeholder="Nhập số lượng" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price'] ?>" placeholder="Nhập giá sản phẩm" required>
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Giá Giảm</label>
                        <input type="number" class="form-control" id="sale_price" name="sale_price" value="<?php echo $product['sale_price'] ?>" placeholder="Nhập giá giảm" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Thể Loại</label>
                        <select class="form-control" id="category" name="category_id" required>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row['category_id'] == $product['category_id']) ? 'selected' : '';
                                    echo "<option value='{$row['category_id']}' $selected>{$row['category_name']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có thể loại nào</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div id="imagePreviewContainer" style="margin-top: 20px;">
                        <img id="imagePreview" src="../public/uploads/<?php echo $product['image_url'] ?>" alt="Image Preview" style="width: 50px; height: 50px; border-radius: 20px; margin-bottom: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Nhập mô tả" required><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
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