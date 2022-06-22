<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update </title>
    <link rel="stylesheet" href="{% static 'edit-profile/style.css' %}">
    <link rel="stylesheet" href="{% static 'edit-profile/bootstrap.min.css' %}">

    <link rel="shortcut icon" type="image/x-icon" href="{% static 'update.png' %}">
    <link rel="apple-touch-icon" sizes="76x76" href="{% static 'update.png' %}">

    <link rel="alternate" type="application/rss+xml" title="Latest snippets resources templates and utilities for bootstrap from bootdey.com:" href="{% static 'edit-profile/rss' %}">
</head>

<body>
    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Edit Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-coffee"></i> {{message}}
                </div>
                <h3>Personal info</h3>

                <form class="form-horizontal" method="post" role="form">
                    {% csrf_token %} {{form.as_p}}
                    <br><button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{% url 'Home' %}"><button class="btn btn-primary" type="button">Back to Home</button></a>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <script type="text/javascript" src="{% static 'edit-profile/popper.min.js' %}"></script>
    <script src="{% static 'edit-profile/bootstrap.min.js' %}"></script>
</body>

</html>