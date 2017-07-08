<!-- Menu start -->
<div id='menu'>
    <ul>
        <li <?= $type == 'dashboard' ? 'class="highlight"' : '' ?>> 
            <a href='index.php' > <i class="fa fa-desktop"></i> <span>Home</span> </a> 
            <?= $type == 'dashboard' ? '<span class="current-page"></span>' : '' ?>
        </li>
        <li class='has-sub'> <a href='#'> <i class="fa fa-flask"></i> <span>User Manager</span> </a>
            <ul <?= ($type == 'user') ? 'style="display: block"' : '' ?>>
                <li> <a href='index.php?action=user_add' 
                        <?= ($type == 'user' && $action == 'add') ? 'class="select"' : '' ?>> <span>Add New User</span> </a> </li>
                <li> <a href='index.php?action=user_list'
                        <?= ($type == 'user' && $action == 'list') ? 'class="select"' : '' ?>> <span>List All</span> </a> 
                </li>
                <li> <a href="index.php?action=user_find"
                        <?= ($type == 'user' && $action == 'find') ? 'class="select"' : '' ?>> <span>Find Users</span> </a> </li>
            </ul>
        </li>
        <li class='has-sub'> <a href='#'> <i class="fa fa-tasks"></i> <span>Category Manager</span> </a>
            <ul <?= ($type == 'category') ? 'style="display: block"' : '' ?>>
                <li> <a href='index.php?action=category_add'
                        <?= ($type == 'category' && $action == 'add') ? 'class="select"' : '' ?>> <span>Add New Category</span> </a> </li>
                <li> <a href='index.php?action=category_list'
                        <?= ($type == 'category' && $action == 'list') ? 'class="select"' : '' ?>> <span>List All Categories</span> </a> </li>
                <li> <a href='index.php?action=category_find'
                        <?= ($type == 'category' && $action == 'find') ? 'class="select"' : '' ?>> <span>Find Categories</span> </a> </li>
            </ul>
        </li>
        <li class='has-sub'> <a href='#'> <i class="fa fa-tasks"></i> <span>Product Manager</span> </a>
            <ul <?= ($type == 'product') ? 'style="display: block"' : '' ?>>
                <li> <a href='index.php?action=product_add'
                        <?= ($type == 'product' && $action == 'add') ? 'class="select"' : '' ?>> <span>Add New Product</span> </a> </li>
                <li> <a href='index.php?action=product_list'
                        <?= ($type == 'product' && $action == 'list') ? 'class="select"' : '' ?>> <span>List All Products</span> </a> </li>
                <li> <a href='index.php?action=product_find'
                        <?= ($type == 'product' && $action == 'find') ? 'class="select"' : '' ?>> <span>Find Products</span> </a> </li>
            </ul>
        </li>        
    </ul>
</div>
<!-- Menu End --> 