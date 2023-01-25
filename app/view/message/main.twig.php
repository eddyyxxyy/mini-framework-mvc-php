{% extends 'partials/body.twig.php' %}

{% block title %}Page not found - Mini Framework{% endblock %}

{% block body %}
<div class="center-screen max-width padding bg-white">
    <div class="card border-danger mb-3">
        <div class="card-header">
            <h5 class="card-title mt-2">{{message}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{title}}</p>
        </div>
    </div>
</div>
{% endblock %}
