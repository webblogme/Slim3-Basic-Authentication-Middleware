{% if flash.getMessage('info') %}
<div class="alert  alert-success">
	 {{ flash.getMessage('info') | first }}
</div>
{% endif %}

{% if flash.getMessage('danger') %}
<div class="alert  alert-danger">
	 {{ flash.getMessage('danger') | first }}
</div>
{% endif %}