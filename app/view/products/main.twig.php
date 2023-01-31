{% extends 'partials/body.twig.php' %}

{% block title %}Products - Mini Framework{% endblock %}

{% block body %}
<div class="center-screen max-width padding bg-white mt-3">
    <h1>Products</h1>

    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <a href="{{BASE}}new-product/" class="btn btn-info btn-sm">New product</a>
        <a href="{{BASE}}"></a>
    </div>

    <hr>
</div>
{% endblock %}
