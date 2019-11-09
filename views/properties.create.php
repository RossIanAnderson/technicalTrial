<?php require 'partials/header.php' ?>

<div class="container d-flex justify-content-between align-items-center py-3">
    <h2>Add New Property</h2>
    <a href="/properties" class="btn btn-secondary btn-sm">Back</a>
</div>

<form class="col-md-8 offset-2" action="/properties/store" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress">
    </div>
    <div class="form-group">
        <label for="inputDescription">Description</label>
        <textarea rows="5" name="description" class="form-control" id="inputDescription" placeholder="A little about the property."></textarea>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputCountry">Country</label>
            <input type="text" name="country" class="form-control" id="inputCountry">
        </div>
        <div class="form-group col-md-3">
            <label for="inputCity">Town</label>
            <input type="text" name="town" class="form-control" id="inputTown">
        </div>
        <div class="form-group col-md-3">
            <label for="inputState">County</label>
            <input type="text" name="county" class="form-control" id="inputCounty">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPostcode">Postcode</label>
            <input type="text" name="postcode" class="form-control" id="inputPostcode">
        </div>
    </div>
    <div class="form-row ">
        <div class="form-group col-md-2">
            <label for="inputPrice">Price</label>
            <input type="text" name="price" class="form-control" id="inputPrice">
        </div>

        <div class="form-group col-md-4">
            <label for="inputType">Property Type</label>
            <select name="propertyType" id="inputType" class="form-control" disabled>
                <?php for($i=1;$i<6;$i++): ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="inputBedrooms">No. Bedrooms</label>
            <select name="bedrooms" id="inputBedrooms" class="form-control">
                <?php for($i=1;$i<10;$i++): ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="inputBathrooms">No. Bathrooms</label>
            <select name="bathrooms" id="inputBathrooms" class="form-control">
                <?php for($i=1;$i<10;$i++): ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="inlineRadioRent" value="rent">
                <label class="form-check-label" for="inlineRadioRent">To Rent</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" checked type="radio" name="type" id="inlineRadioSale" value="sale">
                <label class="form-check-label" for="inlineRadioSale">For Sale</label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

<?php require 'partials/footer.php' ?>
