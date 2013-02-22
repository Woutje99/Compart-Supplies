<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <strong class="brand"></strong>
            <div class="nav-collapse collapse">
                <ul class="nav"> 
                    <li><a href="admin/dashboard"><i class="icon-th"></i> Dashboard</a></li>
                    <li><a href="admin/pages"><i class="icon-pencil"></i> Pagina's</a></li>
                    <li><a href="admin/users"><i class="icon-user"></i> Gebruikers</a></li>
                    <li><a href="admin/products"><i class="icon-tags"></i> Producten</a></li>
                    <li><a href="admin/orders"><i class="icon-shopping-cart"></i> Orders</a></li>
                    <li><a href="admin/suppliers"><i class="icon-list"></i> Leveranciers</a></li>
                    <li><a href="admin/logout"><i class="icon-off"></i> Uitloggen</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php echo Notices::render();?>
    <?php echo $content;?>
</div>