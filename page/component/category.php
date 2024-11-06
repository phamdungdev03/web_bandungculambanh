<style>
    /* Danh mục sản phẩm */
    .category {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .category-list {
        list-style: none;
    }

    .category-item {
        margin-bottom: 10px;
    }

    .category-item:last-child {
        margin-bottom: 0;
    }

    .category-item a {
        text-decoration: none;
        color: #333;
        font-size: 1rem;
        transition: color 0.3s;
    }

    .category-item a:hover {
        color: #f15b29;
    }

    .category-item .active-link {
        font-weight: bold;
        color: #f15b29;
        position: relative;
    }

    .category-item .active-link::before {
        content: "";
        position: absolute;
        left: -10px;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 6px;
        background-color: #f15b29;
        border-radius: 50%;
    }
</style>

<div class="category">
    <ul class="category-list">
        <?php
        include '../config/database.php';
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        }
        $conn = getConnection();
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["category_id"];
                $name = $row["category_name"];
        ?>
                <li class="category-item">
                    <a class="<?php echo $category_id == $id ? 'active-link' : ''; ?>" href="products.php?category_id=<?php echo $id; ?>"><?php echo $name ?></a>
                </li>
        <?php
            }
        }
        ?>
    </ul>
</div>