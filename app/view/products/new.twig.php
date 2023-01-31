{% extends 'partials/body.twig.php' %}

{% block title %}New Product - Mini Framework{% endblock %}

{% block body %}
<div class="center-screen max-width padding bg-white">
    <h1>New Product</h1>
    <hr>

    <form action="{{BASE}}insert-product" method="post">
        <fieldset>
            <div class="form-group">
                <label for="txtTitle" class="form-label mt-3">Name</label>
                <input type="text" class="form-control mb-3" name="txtTitle" id="txtTitle" aria-describedby="textHelp" placeholder="Enter product's name..." required>
            </div>
            <div class="form-group">
                <label for="txtImage" class="form-label">Image</label>
                <input type="text" class="form-control mb-3" name="txtImage" id="txtImage" aria-describedby="textHelp" placeholder="Enter product's image URL...">
            </div>
            <div class="form-group">
                <label for="txtDescription" class="form-label">Description</label>
                <textarea class="form-control mb-3" name="txtDescription" id="txtDescription" rows="5" aria-describedby="textHelp" placeholder="Enter product's description..." required></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </fieldset>
    </form>
</div>
{% endblock %}
