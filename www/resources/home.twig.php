{% extends "templates/layout.twig.php" %}

{% block seo %}

<title>Localhost - test</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="noindex,nofollow" />

{% endblock %}

{% block pagehead %}
<h1>Home</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui provident ad, eligendi minus delectus accusamus quaerat, ipsum, voluptate in aperiam dignissimos fuga harum dicta voluptatibus pariatur asperiores, nulla beatae perferendis!</p>

<p><a href="{{ path_for('data.all') }}" title="All datas" class="btn btn-primary btn-lg" >All datas</a></p>


{% endblock %}

{% block content %}



{% endblock %}

