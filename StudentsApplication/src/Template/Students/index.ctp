<h1></h1>
<table>
    <tr>
        <th>Student id</th>
        <th>Student name</th>
        <th>Address city</th>
    </tr>

    <!-- Here is where we iterate through our $articles students object, printing out article info -->

    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= $student->id ?></td>
        <td><?= $student->name ?></td>
        <td><?= $student->_matchingData['Addresses']['city'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

