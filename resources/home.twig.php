{% extends "templates/layout.twig.php" %}

{% block seo %}

<title>Localhost - test</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="noindex,nofollow" />

{% endblock %}

{% block pagehead %}
<h1>home</h1>
{% endblock %}

{% block content %}

{% set debug = 1 %}
{% if debug == 1 %}
<pre>{{ dump(datas) }}</pre>
{% endif %}

<table class="table table-condensed table-stripe mt-20">

<thead>
<tr>
<th>NO.</th>
{% for key in datas.0|keys %}
<th>{{key|replace({'register_date': "register"})|upper }}</th>
{% endfor %}
</tr>
</thead>

{% for item in datas %}
<tr>
<td>{{ loop.index }}</td>
<td>{{ item.name }}</td>
<td>{{ item.email }}</td>
<td>{{ item.register_date|date("j F o \\o\\n h:i") }}</td>
<td>{{ item.desc|striptags|truncate(20, true) }}</td>
<td>{{ item.age }}</td>
</tr>
{% endfor %}

</table>





{% endblock %}

