<h1></h1>
<table>
    <tr>
        <th>Pincode id</th>
        <th>Area</th>
    </tr>

   

    <?php foreach ($pincodes as $pincode): ?>
    <tr>
        <td><?= $pincode->id ?></td>
        <td><?= $pincode->area ?></td>
    </tr>
    <?php endforeach; ?>
</table>

