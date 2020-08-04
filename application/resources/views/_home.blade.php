<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <title>Cartzilla | Electronics Store </title>
    <meta name = "description" content = "Cartzilla - Bootstrap E-commerce Template">
    <meta name = "keywords" content = "bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name = "author" content = "Createx Studio">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <link rel = "stylesheet" media = "screen" href = "{{ asset('assets/css/vendor.min.css') }}">
    <link rel = "stylesheet" media = "screen" id = "main-styles" href = "{{ asset('assets/css/theme.min.css') }}">
</head>
<body class = "bg-secondary">
<!-- Sign in / sign up modal-->
<div class = "modal fade" id = "signin-modal" tabindex = "-1" role = "dialog">
    <div class = "modal-dialog modal-dialog-centered" role = "document">
        <div class = "modal-content">
            <div class = "modal-header">
                <ul class = "nav nav-tabs card-header-tabs" role = "tablist">
                    <li class = "nav-item">
                        <a class = "nav-link active" href = "#signin-tab" data-toggle = "tab" role = "tab" aria-selected = "true"><i class = "czi-unlocked mr-2 mt-n1"></i>Sign in</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "#signup-tab" data-toggle = "tab" role = "tab" aria-selected = "false"><i class = "czi-user mr-2 mt-n1"></i>Sign up</a>
                    </li>
                </ul>
                <button class = "close" type = "button" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span>
                </button>
            </div>
            <div class = "modal-body tab-content py-4">
                <form class = "needs-validation tab-pane fade show active" autocomplete = "off" novalidate id = "signin-tab">
                    <div class = "form-group">
                        <label for = "si-email">Email address</label>
                        <input class = "form-control" type = "email" id = "si-email" placeholder = "johndoe@example.com" required>
                        <div class = "invalid-feedback">Please provide a valid email address.</div>
                    </div>
                    <div class = "form-group">
                        <label for = "si-password">Password</label>
                        <div class = "password-toggle">
                            <input class = "form-control" type = "password" id = "si-password" required>
                            <label class = "password-toggle-btn">
                                <input class = "custom-control-input" type = "checkbox"><i class = "czi-eye password-toggle-indicator"></i><span class = "sr-only">Show password</span>
                            </label>
                        </div>
                    </div>
                    <div class = "form-group d-flex flex-wrap justify-content-between">
                        <div class = "custom-control custom-checkbox mb-2">
                            <input class = "custom-control-input" type = "checkbox" id = "si-remember">
                            <label class = "custom-control-label" for = "si-remember">Remember me</label>
                        </div>
                        <a class = "font-size-sm" href = "#">Forgot password?</a>
                    </div>
                    <button class = "btn btn-primary btn-block btn-shadow" type = "submit">Sign in</button>
                </form>
                <form class = "needs-validation tab-pane fade" autocomplete = "off" novalidate id = "signup-tab">
                    <div class = "form-group">
                        <label for = "su-name">Full name</label>
                        <input class = "form-control" type = "text" id = "su-name" placeholder = "John Doe" required>
                        <div class = "invalid-feedback">Please fill in your name.</div>
                    </div>
                    <div class = "form-group">
                        <label for = "su-email">Email address</label>
                        <input class = "form-control" type = "email" id = "su-email" placeholder = "johndoe@example.com" required>
                        <div class = "invalid-feedback">Please provide a valid email address.</div>
                    </div>
                    <div class = "form-group">
                        <label for = "su-password">Password</label>
                        <div class = "password-toggle">
                            <input class = "form-control" type = "password" id = "su-password" required>
                            <label class = "password-toggle-btn">
                                <input class = "custom-control-input" type = "checkbox"><i class = "czi-eye password-toggle-indicator"></i><span class = "sr-only">Show password</span>
                            </label>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "su-password-confirm">Confirm password</label>
                        <div class = "password-toggle">
                            <input class = "form-control" type = "password" id = "su-password-confirm" required>
                            <label class = "password-toggle-btn">
                                <input class = "custom-control-input" type = "checkbox"><i class = "czi-eye password-toggle-indicator"></i><span class = "sr-only">Show password</span>
                            </label>
                        </div>
                    </div>
                    <button class = "btn btn-primary btn-block btn-shadow" type = "submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</div>
<header class = "box-shadow-sm">
    <div class = "navbar-sticky bg-light">
        <div class = "navbar navbar-expand-lg navbar-light">
            <div class = "container">
                <a class = "navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href = "{{ url('/') }}" style = "min-width: 7rem;"><img width = "142" src = "{{ asset('assets/img/logo-dark.png') }}" alt = "Cartzilla"/></a><a class = "navbar-brand d-sm-none mr-2" href = "index.html" style = "min-width: 4.625rem;"><img width = "74" src = "{{ asset('assets/img/logo-icon.png') }}" alt = "Cartzilla"/></a>
                <!-- Search-->
                <div class = "input-group-overlay d-none d-lg-block mx-4">
                    <div class = "input-group-prepend-overlay"><span class = "input-group-text"><i class = "czi-search"></i></span>
                    </div>
                    <input class = "form-control prepended-form-control appended-form-control" type = "text" placeholder = "Search for products">
                </div>
                <!-- Toolbar-->
                <div class = "navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <a class="navbar-toggler" href="#sideNav" data-toggle="sidebar"><span class="navbar-toggler-icon"></span></a>
                    </a>
                    <div class = "navbar-tool dropdown ml-3">
                        <a class = "navbar-tool-icon-box bg-secondary dropdown-toggle" href = "{{ url('/checkout') }}">
                            <span class = "navbar-tool-label">4</span>
                            <i class = "navbar-tool-icon czi-cart"></i>
                        </a>
                        <a class = "navbar-tool-text" href = "{{ url('/checkout') }}">৳ 1,247.00</a>
                        <!-- Cart dropdown-->
                        <div class = "dropdown-menu dropdown-menu-right" style = "width: 20rem;">
                            <div class = "widget widget-cart px-3 pt-2 pb-3">
                                <div style = "height: 15rem;" data-simplebar data-simplebar-auto-hide = "false">
                                    <div class = "widget-cart-item pb-2 border-bottom">
                                        <button class = "close text-danger" type = "button" aria-label = "Remove"><span aria-hidden = "true">&times;</span>
                                        </button>
                                        <div class = "media align-items-center">
                                            <a class = "d-block mr-2" href = "single.html"><img width = "64" src = "img/shop/cart/widget/05.jpg" alt = "Product"/></a>
                                            <div class = "media-body">
                                                <h6 class = "widget-product-title"><a href = "single.html">Bluetooth
                                                        Headphones</a></h6>
                                                <div class = "widget-product-meta"><span class = "text-accent mr-2">৳ 259.<small>00</small></span><span class = "text-muted">x 1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "widget-cart-item py-2 border-bottom">
                                        <button class = "close text-danger" type = "button" aria-label = "Remove"><span aria-hidden = "true">&times;</span>
                                        </button>
                                        <div class = "media align-items-center">
                                            <a class = "d-block mr-2" href = "single.html"><img width = "64" src = "img/shop/cart/widget/06.jpg" alt = "Product"/></a>
                                            <div class = "media-body">
                                                <h6 class = "widget-product-title"><a href = "single.html">Cloud
                                                        Security Camera</a></h6>
                                                <div class = "widget-product-meta"><span class = "text-accent mr-2">৳ 122.<small>00</small></span><span class = "text-muted">x 1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "widget-cart-item py-2 border-bottom">
                                        <button class = "close text-danger" type = "button" aria-label = "Remove"><span aria-hidden = "true">&times;</span>
                                        </button>
                                        <div class = "media align-items-center">
                                            <a class = "d-block mr-2" href = "single.html"><img width = "64" src = "img/shop/cart/widget/07.jpg" alt = "Product"/></a>
                                            <div class = "media-body">
                                                <h6 class = "widget-product-title"><a href = "single.html">Android
                                                        Smartphone S10</a></h6>
                                                <div class = "widget-product-meta"><span class = "text-accent mr-2">৳ 799.<small>00</small></span><span class = "text-muted">x 1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "widget-cart-item py-2 border-bottom">
                                        <button class = "close text-danger" type = "button" aria-label = "Remove"><span aria-hidden = "true">&times;</span>
                                        </button>
                                        <div class = "media align-items-center">
                                            <a class = "d-block mr-2" href = "single.html"><img width = "64" src = "img/shop/cart/widget/08.jpg" alt = "Product"/></a>
                                            <div class = "media-body">
                                                <h6 class = "widget-product-title"><a href = "single.html">Android
                                                        Smart TV Box</a></h6>
                                                <div class = "widget-product-meta"><span class = "text-accent mr-2">৳ 67.<small>00</small></span><span class = "text-muted">x 1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class = "d-flex flex-wrap justify-content-between align-items-center py-3">
                                    <div class = "font-size-sm mr-2 py-2">
                                        <span class = "text-muted">Subtotal:</span><span class = "text-accent font-size-base ml-1">৳ 1,247.<small>00</small></span>
                                    </div>
                                    <a class = "btn btn-outline-secondary btn-sm" href = "{{ url('/checkout') }}">Expand cart<i class = "czi-arrow-right ml-1 mr-n1"></i></a>
                                </div>
                                <a class = "btn btn-primary btn-sm btn-block" href = "checkout-details.html"><i class = "czi-card mr-2 font-size-base align-middle"></i>Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>
<aside class="cz-sidebar cz-sidebar-fixed" id="sideNav" style="padding-top: 5rem;">
    <button class="close" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle">Close sidebar</span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
    <div class="cz-sidebar-inner">
        <ul class="nav nav-tabs mt-2 mt-lg-4 mb-0" role="tablist" style="min-height: 3rem;">
            <li class="nav-item"><a class="nav-link font-weight-medium active" href="#categories" data-toggle="tab" role="tab">Categories</a></li>

        </ul>
        <div class="cz-sidebar-body pt-3 pb-0" data-simplebar>
            <div class="tab-content">
                <!-- Categories-->
                <div class="sidebar-nav tab-pane fade show active" id="categories" role="tabpanel">
                    <div class="widget widget-categories">
                        <div class="accordion" id="shop-categories">
                            <!-- Special offers-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#"><span class="d-flex align-items-center"><i class="czi-discount font-size-lg text-danger mt-n1 mr-2"></i>Special Offers</span></a></h3>
                                </div>
                            </div>
                            <!-- Bakery-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#bakery" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="bakery"><span class="d-flex align-items-center"><i class="czi-bread font-size-lg opacity-60 mt-n1 mr-2"></i>Bakery</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="bakery" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Bread</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Baguette</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Loaves</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Ciabatta</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Wheat bread</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Corn bread</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Rye bread</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Rye wheat bread</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Bagels</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Puff pastry</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Stuffed buns</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Buns, sweet cheese danish</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Pita and Flatbread</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fruits and Vegetables-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#fruits" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="fruits"><span class="d-flex align-items-center"><i class="czi-apple font-size-lg opacity-60 mt-n1 mr-2"></i>Fruits and Vegetables</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="fruits" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Fruits</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Pears, apples, quinces</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Bananas, pineapples, kiwi</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Citrus</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Peaches, plums, apricots</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Grapes</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Exotic fruits</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Berries</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Vegetables</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Mushrooms</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Fresh greens</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Dried fruits</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dairy and Eggs-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#dairy" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="dairy"><span class="d-flex align-items-center"><i class="czi-cheese font-size-lg opacity-60 mt-n1 mr-2"></i>Dairy and Eggs</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="dairy" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Milk</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Pasteurized milk</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Condensed milk</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Sterilized milk</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Baked milk</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Powder milk</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Coconut milk</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Cheese</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Hard cheese</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Semi-hard cheese</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Pickled</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Soft cheese</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Cream-cheese</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Sour cream</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Yogurt</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Sour-milk drinks</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Butter and margarine</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Desserts</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Cream</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Eggs</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Meat and Poultry-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#meat" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="meat"><span class="d-flex align-items-center"><i class="czi-ham-leg font-size-lg opacity-60 mt-n1 mr-2"></i>Meat and Poultry</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="meat" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Fresh meat</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Pork</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Beef</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Rabbit</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Chicken</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Turkey</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Lamb</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Duck</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Minced meat</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Frozen ready-to-cook</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Sausages</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Meat delicatessen</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Ham</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Cold boiled pork</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Bacon</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Smoked meat</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Jamon</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Cooled meals</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fish and Seafood-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#fish" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="fish"><span class="d-flex align-items-center"><i class="czi-fish font-size-lg opacity-60 mr-2"></i>Fish and Seafood</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="fish" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Fresh fish</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Prepared fish</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Light-salted fish</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Marinated fish</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Butter with fish</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Smoked fish</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Dried fish</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Seafood</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Sushi</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sauces and Spices-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#sauces" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sauces"><span class="d-flex align-items-center"><i class="czi-fish font-size-lg opacity-60 mr-2"></i>Sauces and Spices</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="sauces" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Mayonnese</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Sauces</a>
                                                    <ul class="widget-list pt-1">
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Cooking base</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Mustard</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Soy sauce</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Tomato paste</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Barbecue sauce</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Tartar</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Hot sauces</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Balsamic sauce</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Salad dressing</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Curry sauce</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Garlic sauce</a></li>
                                                        <li class="widget-list-item"><a class="widget-list-link" href="#">Pesto sauce</a></li>
                                                    </ul>
                                                </li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Ketchup</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Herbs and spices</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Salt</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Canned Food and Oil-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#canned" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="canned"><span class="d-flex align-items-center"><i class="czi-canned-food font-size-lg opacity-60 mr-2"></i>Canned Food and Oil</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="canned" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Oils and vinegar</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Canned meat</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Canned fish</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Canned fruit</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Canned vegetables</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Salads and pickles</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Olives</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Pate</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Jam, fruit paste, confiture</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Honey</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Alcoholic Beverages-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#alcoholic" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="alcoholic"><span class="d-flex align-items-center"><i class="czi-wine font-size-lg opacity-60 mr-2"></i>Alcoholic Beverages</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="alcoholic" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Beer</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Wine</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Champagne and sparkling wine</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Alcopops</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Hard liquor</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Liquor</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Soft Drinks and Juice-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#drinks" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="drinks"><span class="d-flex align-items-center"><i class="czi-juice font-size-lg opacity-60 mr-2"></i>Soft Drinks and Juice</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="drinks" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Mineral water</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Juice</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Nectar</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Smoothie</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Fruit drincs</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Soda</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Tea</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Coffee</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Ice tea</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Cocoa drinks</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Hot chocolate</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Topping</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Packets, Cereals-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#packets" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="packets"><span class="d-flex align-items-center"><i class="czi-corn font-size-lg opacity-60 mr-2"></i>Packets, Cereals</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="packets" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Pasta</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Cereal</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Flour</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Porridge and muesli</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Snack meals</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">For baking</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Sugar and sweetener</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Soy food</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Supplements</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Frozen-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#frozen" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="frozen"><span class="d-flex align-items-center"><i class="czi-frozen font-size-lg opacity-60 mr-2"></i>Frozen</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="frozen" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Fish</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Meat and poultry</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Salads</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Seafood</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Pizza and breads</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Ready meals</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Fruits</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Vegetables</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Ice-cream</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Frozen bakery</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Personal hygiene-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#hygiene" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="hygiene"><span class="d-flex align-items-center"><i class="czi-toothbrush font-size-lg opacity-60 mr-2"></i>Personal hygiene</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="hygiene" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Oral care</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Cotton pads</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">For ladies</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">For shaving and epilation</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Cosmetic wipes</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Soap</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Kitchenware-->
                            <div class="card border-bottom">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-size-base px-grid-gutter"><a class="collapsed py-3" href="#kitchenware" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="kitchenware"><span class="d-flex align-items-center"><i class="czi-pot font-size-lg opacity-60 mr-2"></i>Kitchenware</span><span class="accordion-indicator"></span></a></h3>
                                </div>
                                <div class="collapse" id="kitchenware" data-parent="#shop-categories">
                                    <div class="card-body px-grid-gutter pb-4">
                                        <div class="widget widget-links">
                                            <ul class="widget-list">
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">View all</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Glasses, decanters</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Cookware</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Tableware</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Kitchenware</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Food storage</a></li>
                                                <li class="widget-list-item"><a class="widget-list-link" href="#">Disposable tableware</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="px-grid-gutter pt-5 pb-4 mb-2">
            <div class="d-flex mb-3"><i class="czi-support h4 mb-0 font-weight-normal text-primary mt-1 mr-1"></i>
                <div class="pl-2">
                    <div class="text-muted font-size-sm">Support</div><a class="nav-link-style font-size-md" href="tel:+100331697720">+1 (00) 33 169 7720</a>
                </div>
            </div>
            <div class="d-flex mb-3"><i class="czi-mail h5 mb-0 font-weight-normal text-primary mt-1 mr-1"></i>
                <div class="pl-2">
                    <div class="text-muted font-size-sm">Email</div><a class="nav-link-style font-size-md" href="mailto:customer@example.com">customer@example.com</a>
                </div>
            </div>
            <h6 class="pt-2 pb-1">Follow us</h6><a class="social-btn sb-outline sb-twitter mr-2 mb-2" href="#"><i class="czi-twitter"></i></a><a class="social-btn sb-outline sb-facebook mr-2 mb-2" href="#"><i class="czi-facebook"></i></a><a class="social-btn sb-outline sb-instagram mr-2 mb-2" href="#"><i class="czi-instagram"></i></a><a class="social-btn sb-outline sb-youtube mr-2 mb-2" href="#"><i class="czi-youtube"></i></a>
        </div>
    </div>
</aside>
<!-- Page Content-->
<!-- Hero (Banners + Slider)-->
<section class = "">
    <div class = "container py-xl-2">
        <div class = "row">
            <!-- Slider     -->
            <div class = "col-lg-10 order-xl-2 bg-secondary">

                <div class="cz-carousel cz-dots-enabled cz-dots-light cz-dots-inside">
                    <div class="cz-carousel-inner"  >
                        <img src="{{ asset('assets/img/home/hero-slider/01.jpg') }}" alt="...">
                        <img src="{{ asset('assets/img/home/hero-slider/01.jpg') }}" alt="...">
                        <img src="{{ asset('assets/img/home/hero-slider/01.jpg') }}" alt="...">
                    </div>
                </div>




            </div>
            <!-- Banner group-->
            <div class = "col-lg-2 mobile-area-off">

                <ul class = "dropdown-menu d-block" style = "position: initial">
                    @foreach($categories as $category)
                    <li class = "dropdown">
                        <a class = "dropdown-item" href = "{{ url($category->CategorySlug).'/'.$category->id }}"> {{ $category->CategoryName }} </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Products grid (Trending products)-->
<section class = "container pt-4 mb-5">
    <div class = "row pt-2 mx-n2 product-archive ">
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">

                                 অর্ডার করুন

                    </button>
                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                        অর্ডার করুন
                    </button>

                </div>
            </div>
        </div>
        <!-- Product-->
        <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
            <div class = "card product-card p-2 border">
                <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                <div class = "card-body py-2 px-0">
                    <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                    <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                            Headphones</a></h3>
                    <div class = "d-flex justify-content-between">
                        <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                    </div>
                </div>
                <div class = "card-body py-0 px-0">
                    <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast"> অর্ডার করুন</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Toast: Added to Cart-->
<div class = "toast-container toast-top-center">
    <div class = "toast mb-3" id = "cart-toast" data-delay = "5000" role = "alert" aria-live = "assertive" aria-atomic = "true">
        <div class = "toast-header bg-success text-white"><i class = "czi-check-circle mr-2"></i>
            <h6 class = "font-size-sm text-white mb-0 mr-auto">Added to cart!</h6>
            <button class = "close text-white ml-2 mb-1" type = "button" data-dismiss = "toast" aria-label = "Close"><span aria-hidden = "true">&times;</span>
            </button>
        </div>
        <div class = "toast-body">This item has been added to your cart.</div>
    </div>
</div>
<!-- Footer-->
<footer class = "pt-5 bg-dark">
    <div class = "container">

        <div class = "row pb-2">
            <div class = "col-md-6 text-center text-md-left mb-4">
                <div class = "text-nowrap mb-4">
                    <a class = "d-inline-block align-middle mt-n1 mr-3" href = "#"><img class = "d-block" width = "117" src = "{{ asset('assets/img/footer-logo-light.png') }}" alt = "Cartzilla"/></a>

                </div>
                <div class = "widget widget-links widget-light">
                    <ul class = "widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                        <li class = "widget-list-item mr-4"><a class = "widget-list-link" href = "#">Outlets</a>
                        </li>
                        <li class = "widget-list-item mr-4"><a class = "widget-list-link" href = "#">Affiliates</a>
                        </li>
                        <li class = "widget-list-item mr-4"><a class = "widget-list-link" href = "#">Support</a>
                        </li>
                        <li class = "widget-list-item mr-4"><a class = "widget-list-link" href = "#">Privacy</a>
                        </li>
                        <li class = "widget-list-item mr-4">
                            <a class = "widget-list-link" href = "#">Terms of use</a></li>
                    </ul>
                </div>
            </div>
            <div class = "col-md-6 text-center text-md-right mb-4">
                <div class = "mb-3">
                    <a class = "social-btn sb-light sb-twitter ml-2 mb-2" href = "#"><i class = "czi-twitter"></i></a><a class = "social-btn sb-light sb-facebook ml-2 mb-2" href = "#"><i class = "czi-facebook"></i></a><a class = "social-btn sb-light sb-instagram ml-2 mb-2" href = "#"><i class = "czi-instagram"></i></a><a class = "social-btn sb-light sb-pinterest ml-2 mb-2" href = "#"><i class = "czi-pinterest"></i></a><a class = "social-btn sb-light sb-youtube ml-2 mb-2" href = "#"><i class = "czi-youtube"></i></a>
                </div>
                <img class = "d-inline-block" width = "187" src = "{{ asset('assets/img/cards-alt.png') }}" alt = "Payment methods"/>
            </div>
        </div>
        <div class = "pb-4 font-size-xs text-light opacity-50 text-center text-md-left">© All rights reserved. Made by
            <a class = "text-light" href = "https://createx.studio/" target = "_blank" rel = "noopener">Createx Studio</a>
        </div>
    </div>
</footer>
<!-- Toolbar for handheld devices-->
<div class = "cz-handheld-toolbar">
    <div class = "d-table table-fixed w-100">
        <a class = "d-table-cell cz-handheld-toolbar-item" href = "account-wishlist.html"><span class = "cz-handheld-toolbar-icon"><i class = "czi-heart"></i></span><span class = "cz-handheld-toolbar-label">Wishlist</span></a><a class = "d-table-cell cz-handheld-toolbar-item" href = "#navbarCollapse" data-toggle = "collapse" onclick = "window.scrollTo(0, 0)"><span class = "cz-handheld-toolbar-icon"><i class = "czi-menu"></i></span><span class = "cz-handheld-toolbar-label">Menu</span></a><a class = "d-table-cell cz-handheld-toolbar-item" href = "{{ url('/checkout') }}"><span class = "cz-handheld-toolbar-icon"><i class = "czi-cart"></i><span class = "badge badge-primary badge-pill ml-1">4</span></span><span class = "cz-handheld-toolbar-label">৳ 265.00</span></a>
    </div>
</div>
<a class = "btn-scroll-top" href = "#top" data-scroll>
    <span class = "btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
    <i class = "btn-scroll-top-icon czi-arrow-up"> </i>
</a>
<script src = "{{ asset('assets/js/vendor.min.js') }}"></script>
<script src = "{{ asset('assets/js/theme.min.js') }}"></script>
</body>
</html>
