<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Store</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

    <header>

        @include('front.navbar')

    </header>

        <div class="banner shadow">

                <div class="slogan">

                  <h2>Un <span class="orange">deseo</span>. Un <span class="orange">click</span>.<br> Nunca antes fue tan <span class="orange">fácil</span>.</h2>

                </div>

                <nav class="sociales">
                  <a href="#"><img src="/webimages/facebook.png" alt="icono facebook"></a>
                  <a href="#"><img src="/webimages/instagram.png" alt="icono instagram"></a>
                  <a href="#"><img src="/webimages/twitter.png" alt="icono twitter"></a>
                </nav>

              </div>


        <main>

                <nav class="products-nav container">
                  <ul>
                    {{-- @foreach ($categories as $category)
                        
                    <li><a href="#"><i class="{{$category->icon}}"></i>{{$category->name}}</a></li>
                    @endforeach --}}
                    <li><a href="#"><i class="fas fa-laptop"></i>Notebooks</a></li>
                    <li><a href="#"><i class="fas fa-tv"></i>TVs y Monitores</a></li>
                    <li><a href="#"><i class="fas fa-tablet-alt"></i>Tablets</a></li>
                    <li><a href="#"><i class="far fa-clock"></i>Smartwatches</a></li>
                    <li><a href="#"><i class="fas fa-plus"></i>Otras Categorías</a></li>
                  </ul>
                </nav>

                <!-- Carousel  -->


                    <div class="row no-gutters">
                      <div class="container-oferta col-12 col-lg-12 col-md-12">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="/webimages/summer-tech-wide.jpg" alt="First slide">
                              <div class="carousel-caption d-md-block">
                                <h5>SUMMER SALE</h5>
                                <p>Descuentos de verano!</p>
                              </div>
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="/webimages/outlet-tech-small-wide.jpg" alt="Second slide">
                              <div class="carousel-caption d-md-block">
                                <h5>OUTLET</h5>
                              </div>
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="/webimages/sales-img-small-wide.jpg" alt="Third slide">
                              <div class="carousel-caption d-md-block">
                                <h5>SUMMER SALE</h5>
                                <p>Descuentos de verano!</p>
                              </div>
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                       </div>

                      </div>

                    </div>

                    <section class="section-ofertas">

                      <div class="row no-gutters" id="container-oferta">
                        <div class="container-oferta col-12 col-lg-8 col-md-8 col-sm-12">
                          <div class="oferta1">
                            <h2>OFERTA 1</h2>
                            <h3>$1500</h3>
                            <button class="button-oferta" type="button" name="button">SHOP NOW</button>
                          </div>
                        </div>

                        <div class="container-oferta col-12 col-lg-4 col-md-4 col-sm-12">
                          <div class="oferta2">
                            <h3>40% SALE</h3>
                            <h2>OFERTA 2</h2>
                            <button class="button-oferta" type="button" name="button">SHOP NOW</button>
                          </div>
                        </div>
                      </div>

                    </section>
                    <!-- Fin SECTION OFERTAS -->

                    <section class="section-articulos container" id="section-articulos">
                      <h2>Productos destacados</h2>
                      <div class="row no-gutters">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                          <article class="articulo">
                            <img src="https://http2.mlstatic.com/monitores-D_NP_592925-MLA25521012722_042017-Q.jpg" alt="foto del producto">
                            <h4>Articulo Nombre</h4>
                            <h3>$9999</h3>
                            <a href="detalle.php" class="button-buy-now">Shop Now!</a>
                          </article>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                          <article class="articulo">
                            <img src="https://http2.mlstatic.com/monitores-D_NP_592925-MLA25521012722_042017-Q.jpg" alt="foto del producto">
                            <h4>Articulo Nombre</h4>
                            <h3>$9999</h3>
                            <a href="detalle.php" class="button-buy-now">Shop Now!</a>
                          </article>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                          <article class="articulo">
                            <img src="https://http2.mlstatic.com/monitores-D_NP_592925-MLA25521012722_042017-Q.jpg" alt="foto del producto">
                            <h4>Articulo Nombre</h4>
                            <h3>$9999</h3>
                            <a href="detalle.php" class="button-buy-now">Shop Now!</a>
                          </article>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                          <article class="articulo">
                            <img src="https://http2.mlstatic.com/monitores-D_NP_592925-MLA25521012722_042017-Q.jpg" alt="foto del producto">
                            <h4>Articulo Nombre</h4>
                            <h3>$9999</h3>
                            <a href="detalle.php" class="button-buy-now">Shop Now!</a>
                          </article>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                          <article class="articulo">
                            <img src="https://http2.mlstatic.com/monitores-D_NP_592925-MLA25521012722_042017-Q.jpg" alt="foto del producto">
                            <h4>Articulo Nombre</h4>
                            <h3>$9999</h3>
                            <a href="detalle.php" class="button-buy-now">Shop Now!</a>
                          </article>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                          <article class="articulo">
                            <img src="https://http2.mlstatic.com/monitores-D_NP_592925-MLA25521012722_042017-Q.jpg" alt="foto del producto">
                            <h4>Articulo Nombre</h4>
                            <h3>$9999</h3>
                            <a href="detalle.php" class="button-buy-now">Shop Now!</a>
                          </article>
                        </div>
                      </div>
                    </section>
                    <!-- FIN SECTION ARTICULOS -->

              </main>


             @include('front.footer')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
