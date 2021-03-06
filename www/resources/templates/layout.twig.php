<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		
		{% block seo %}{% endblock %}

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" type="text/css" href="{{ base_url() }}/assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="{{ base_url() }}/assets/css/css.bs3.en.css" />		

	</head>

<body style="background:#f5f5f5;" >


<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="{{ path_for('home') }}" class="navbar-brand">Bootstrap</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li>
              <a href="../getting-started">Getting started</a>
            </li>
            <li class="active">
              <a href="../css">CSS</a>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
		  {% if auth.check %}
			<li><a>Howdy, {{ auth.user.name }}</a></li>
			<li><a href="{{ path_for('auth.password.change') }}">Change password</a></li>
			<li><a href="{{ path_for('auth.signout') }}">Log out</a></li>
				{% else %}
			<li><a href="{{ path_for('auth.signup') }}">Sign up</a></li>
			<li><a href="{{ path_for('auth.signin') }}">Sign in</a></li>
			{% endif %}
          </ul>
        </nav>
      </div>
    </header>
    
    <div class="container">
      <div class="row">
	  
	  <div class="col-xs-12 mb-20">
	  
		{% include 'templates/partials/flash.twig.php' %}
	  
		{% block pagehead %}{% endblock %}

	</div>
	  
	  <div class="col-xs-12">
	  
		
		
		{% block content %}{% endblock %}      

	</div>

	</div><!-- .row -->
    </div><!-- .container-fluid -->




<div class="container">

	
	<div class="row">
		<div class="col-xs-12">
			{% block footer %}
				&copy; Copyright {{ "now"|date('d m Y H:i', timezone="Asia/Bangkok") }} by <a href="http://domain.invalid/">you</a>.
			{% endblock %}
		</div>
	
	</div>
</div>

    </body>
</html>