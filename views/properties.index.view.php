<?php require 'partials/header.php' ?>

<div class="container d-flex justify-content-between align-items-center py-3">
    <h2>All the Properties</h2>
    <div class="btn-group"> 
        <a href="/properties/populate" class="btn btn-secondary btn-sm">Populate</a>
        <a href="/properties/create" class="btn btn-secondary btn-sm">Add New</a>
    </div>
</div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Address</th>
            <th scope="col">Town</th>
            <th scope="col">County</th>
            <th scope="col">Country</th>
            <th scope="col">Postcode</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($properties as $property): ?>
            <tr>
                <td><?=$property->address?></td>
                <td><?=$property->town?></td>
                <td><?=$property->county?></td>
                <td><?=$property->country?></td>
                <td><?=$property->postcode?></td>
                <td><a class="btn btn-primary btn-sm" href="/properties/show?uuid=<?=$property->uuid?>">View</a></td>
                <td><a class="btn btn-danger btn-sm" href="/properties/destroy?uuid=<?=$property->uuid?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'partials/footer.php' ?>
