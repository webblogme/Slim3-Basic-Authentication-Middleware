{% extends "templates/layout.twig.php" %}

{% block seo %}
{% endblock %}


{% block pagehead %}
<h1>Sign up</h1>
{% endblock %}

{% block content %}


	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		
		<!--{{ old | json_encode }}-->

              <form class="form-horizontal" method="post" action="{{ path_for('auth.signup') }}" autocomplete="off">
                
				<div class="form-group {{ errors.email ? ' has-error' : '' }}">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-9 col-md-9 col-lg-9">
                      <input type="email" class="form-control" name="email" id="email" value="{{ old.email }}" placeholder="Enter email">
					  {% if errors.email %}
					<span class="help-block" >{{ errors.email | first }}</span>

					{% endif %}
                    </div>
                  </div>
				  
				  <div class="form-group {{ errors.name ? ' has-error' : '' }}">
                  <label class="control-label col-sm-3" for="name">Name:</label>
                  <div class="col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old.name }}" placeholder="Enter Name">
					{% if errors.name %}
					<span class="help-block" >{{ errors.name | first }}</span>
					{% endif %}
					
                  </div>
                </div>
 
                  <div class="form-group {{ errors.password ? ' has-error' : '' }}">
                    <label class="control-label col-sm-3" for="pwd">Password:</label>
                    <div class="col-sm-9 col-md-9 col-lg-9">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
					  {% if errors.password %}
					<span class="help-block" >{{ errors.password | first }}</span>
					{% endif %}
                    </div>
                  </div>
				  
				  {{ csrf.field | raw }}

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                      <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                  </div>
				  
                </form>
			
		</div>
	</div>


{% endblock %}