{% extends 'partials/body.twig.php' %}

{% block title %}{{title}} - Mini Framework{% endblock %}

{% block body %}
<div class="center-screen max-width padding bg-white mt-3">
    <h1>{{title}}</h1>
    <hr>

    <p>{{description}}</p>

    {% if link != null %}
    <a href="{{link}}" class="btn btn-primary">Go back</a>
    {% endif %}
</div>
{% endblock %}
