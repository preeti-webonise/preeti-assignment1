<h1></h1>
<table>
    <tr>
        <th>Pincode id</th>
        <th>District</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($pincodes as $pincodes): ?>
    <tr>
        <td><?= $pincodes->id ?></td>
        <td><?= $pincodes->district ?></td>
    </tr>
    <?php endforeach; ?>
</table>

