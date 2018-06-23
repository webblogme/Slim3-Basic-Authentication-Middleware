{% extends "templates/layout.twig.php" %}

{% block seo %}

<title>Localhost - test</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="noindex,nofollow" />

{% endblock %}

{% block pagehead %}
<h1>All datas</h1>
{% endblock %}

{% block content %}

<h2 class="mt-20" >Showing {{ pagination.perpage }} records from {{ pagination.total }} </h2>

<p>You are on page {{ pagination.page }} / showing {{ pagination.start }} to {{ pagination.end }}</p>

<p class="numbers" >
{{ pagination.paginationCtrls | raw }}
</p>

<table class="table table-condensed table-stripe mt-20">

<thead>
<tr>
<th>NO.</th>
{% for key in datas.1|keys %}
<th>{{key|replace({'moddate': "register"})|upper }}</th>
{% endfor %}
</tr>
</thead>

{% for item in datas %}
<tr>
<td>{{ item.id }}</td>
<td>{{ item.ip }}</td>
<td>{{ item.loginfo }}</td>
<td>{{ item.moddate|date("j F o \\o\\n h:i") }}</td>
<td></td>
<!--<td>{#{ item.desc|striptags|truncate(20, true) }#}</td>-->
<td>{{ item.mailinfo }}</td>
</tr>
{% endfor %}

</table>



{% set debug = 0 %}
{% if debug == 1 %}
<pre>{{ dump(datas.0) }}</pre>
{% endif %}

{% endblock %}

