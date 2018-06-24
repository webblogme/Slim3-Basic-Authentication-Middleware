{% extends "templates/layout.twig.php" %}

{% block seo %}
{% endblock %}


{% block pagehead %}
<h1>Change password</h1>
{% endblock %}

{% block content %}


	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		
		<!--{{ old | json_encode }}-->

              <form class="form-horizontal" method="post" action="{{ path_for('auth.password.change') }}" autocomplete="off">
 
                  
				  <div class="form-group {{ errors.password_old ? ' has-error' : '' }}">
                    <label class="control-label col-sm-4" for="pwd">Current password:</label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                      <input type="password" class="form-control" name="password_old" id="password_old" placeholder="Enter password">
					  {% if errors.password_old %}
					<span class="help-block" >{{ errors.password_old | first }}</span>
					{% endif %}
                    </div>
                  </div>
				  
				  
				  <div class="form-group {{ errors.password ? ' has-error' : '' }}">
                    <label class="control-label col-sm-4" for="pwd">Password:</label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
					  {% if errors.password %}
					<span class="help-block" >{{ errors.password | first }}</span>
					{% endif %}
                    </div>
                  </div>
				  
				  {{ csrf.field | raw }}

                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-6">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
				  
                </form>
			
		</div>
	</div>


{% endblock %}