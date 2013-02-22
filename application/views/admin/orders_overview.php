<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Prijs</th>
            <th>Voorraad</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php //foreach( $orders as $order ): ?>
        <tr>
            <td><?php //echo $product->id; ?></td>
            <td><?php //echo $product->merk; ?></td>
            <td><?php //echo $product->model; ?></td>
            <td><?php //echo '€ '. $product->prijs; ?></td>
            <td><?php //echo $product->stock; ?></td>
            <td>
                <a href="admin/products/edit/<?php //echo $product->id ?>"><i class="icon-edit"></i> Bewerken </a>
            </td>
        </tr>
        <?php //endforeach; ?>      
    </tbody>
</table>