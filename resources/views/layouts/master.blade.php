<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Vision HTML CSS Template</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet" /> 
    <link href="{{url('frontend/css/all.min.css')}}" rel="stylesheet" /> 
    <link href="{{url('frontend/slick/slick.css')}}" rel="stylesheet" /> 
    <link href="{{url('frontend/slick/slick-theme.css')}}" rel="stylesheet" />
	<link href="{{url('frontend/css/bootstrap.min.css')}}" rel="stylesheet" /> 
	<link href="{{url('frontend/css/templatemo-new-vision.css')}}" rel="stylesheet" />  
</head>
<body>

    <!-- Page Header -->
    <div class="container-fluid">
        <div class="tm-site-header">
            <div class="row">
                <div class="col-12 tm-site-header-col">
                    <div class="tm-site-header-left">
                        <i class="far fa-2x fa-eye tm-site-icon"></i>
                        <h1 class="tm-site-name">New Vision</h1>
                    </div>
                    <div class="tm-site-header-right tm-menu-container-outer">

                        <!--Navbar-->
                        <nav class="navbar navbar-expand-lg">

                          <!-- Collapse button -->
                          <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                                class="fas fa-bars fa-1x"></i></span></button>

                          <!-- Collapsible content -->
                          <div class="collapse navbar-collapse tm-nav" id="navbarSupportedContent1">

                            <!-- Links -->
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                <a class="nav-link tm-nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link tm-nav-link" href="{{url('company')}}">Our Company</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link tm-nav-link" href="{{url('services')}}">Services</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link tm-nav-link" href="{{url('contact')}}">Contact</a>
                              </li>
                            </ul>
                            <!-- Links -->

                          </div>
                          <!-- Collapsible content -->

                        </nav>
                        <!--/.Navbar-->
                    </div>
                </div>
            </div>
        </div>
@yield('content')
</body>
</html>