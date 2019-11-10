<?php require 'partials/header.php' ?>

<div class="container d-flex justify-content-between align-items-center py-3">
    <h2>Showing Single Property</h2>
    <a href="/properties" class="btn btn-secondary btn-sm">Back</a>
</div>
<form class="col-md-8 offset-2">
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress" disabled value="<?=$property->address?>">
    </div>
    <div class="form-group">
        <label for="inputDescription">Description</label>
        <textarea rows="5" name="description" class="form-control" id="inputDescription" disabled><?=$property->description?></textarea>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputCountry">Country</label>
            <input type="text" name="country" class="form-control" id="inputCountry" disabled value="<?=$property->country?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputCity">Town</label>
            <input type="text" name="town" class="form-control" id="inputTown" disabled value="<?=$property->town?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputState">County</label>
            <input type="text" name="county" class="form-control" id="inputCounty" disabled value="<?=$property->county?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPostcode">Postcode</label>
            <input type="text" name="postcode" class="form-control" id="inputPostcode" disabled value="<?=$property->postcode?>">
        </div>
    </div>
    <div class="form-row ">
        <div class="form-group col-md-2">
            <label for="inputPrice">Price</label>
            <input type="text" name="price" class="form-control" id="inputPrice" disabled value="<?=$property->price?>">
        </div>

        <div class="form-group col-md-4">
            <label for="inputType">Property Type</label>
            <select name="propertyType" id="inputType" class="form-control" disabled>
                <option selected><?=$property->property_type_id?></option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="inputBedrooms">No. Bedrooms</label>
            <select name="bedrooms" id="inputBedrooms" class="form-control" disabled>
                <option selected><?=$property->num_bedrooms?></option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="inputBathrooms">No. Bathrooms</label>
            <select name="bathrooms" id="inputBathrooms" class="form-control" disabled>
                <option selected><?=$property->num_bathrooms?></option>
            </select>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Additional Information</div>
        <div class="card-body">
            <ul>
                <li>Longitude: <?=$property->longitude?></li>
                <li>Latitude: <?=$property->latitude?></li>
                <li>Image: <a target="_blank" href="<?=$property->image_url?>"><?=$property->image_url?></a></li>
                <li>Thumbnail: <a target="_blank" href="<?=$property->thumb_url?>"><?=$property->thumb_url?></a></li>
            <ul>
        </div>
    </div>

    <a href="/properties/destroy?uuid=<?=$property->uuid?>" class="btn btn-danger mt-3">Delete</a>
</form>

<?php require 'partials/footer.php' ?>
