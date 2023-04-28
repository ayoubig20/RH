@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                padding: 200
            });
            autoplay();

            function autoplay() {
                $('.carousel').carousel('next');
                setTimeout(autoplay, 4500);
            }
        });
    </script>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="col">
            <h1 class="mb-0 text-center">Welcome in Employees Mangement systeme</h1>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/gallery/31.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/gallery/29.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/gallery/18.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button"
                            data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button"
                            data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col">
                    <div class="card mb-3">
                        <img src="assets/images/gallery/08.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body1">
                            <h5 class="card-title1">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                        <img src="assets/images/gallery/05.png" class="card-img-bottom" alt="...">
                    </div>
                </div>
            </div> --}}
        </div>
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Our Features</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="feature-item">
                            <i class="bx bx-shield"></i>
                            <h4>Secure</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                                pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature-item">
                            <i class="bx bx-laptop"></i>
                            <h4>Responsive</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                                pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature-item">
                            <i class="bx bx-sun"></i>
                            <h4>Easy to Use</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                                pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature">
                            <i class="fas fa-chart-line"></i>
                            <h3>Analytics</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed tincidunt mauris.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature">
                            <i class="fas fa-cog"></i>
                            <h3>Customization</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed tincidunt mauris.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature">
                            <i class="fas fa-users"></i>
                            <h3>User Management</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed tincidunt mauris.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>What Our Clients Say</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="testimonial-box">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed tincidunt mauris.
                                Vestibulum a turpis enim. Duis at nisl ut nunc tincidunt aliquam. Aenean blandit eleifend
                                sapien, ut pharetra arcu lobortis at."</p>
                            <p class="client-name">- John Smith</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial-box">
                            <p>"Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                egestas. Fusce facilisis metus sed nibh bibendum, quis posuere sapien egestas. Praesent
                                faucibus ac massa sit amet dapibus."</p>
                            <p class="client-name">- Jane Doe</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial-box">
                            <p>"Suspendisse semper leo nec felis gravida, sed egestas mi vestibulum. Donec vitae ante id
                                arcu sagittis hendrerit at et arcu. Nunc blandit, libero a fermentum malesuada, elit elit
                                tincidunt neque, quis tristique purus mauris quis nisi."</p>
                            <p class="client-name">- Michael Johnson</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="team section-padding" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center pb-5">
                            <h2>Our Team</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur<br>
                                adipisicing elit. Non, quo.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <img alt="" class="img-fluid rounded-circle"
                                    src="assets/images/avatars/avatar-25.png">
                                <h3 class="card-title py-2">Jack Wilson</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                    nostrum illo tempora esse quibusdam.</p>
                                <p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i
                                        class="bi bi-facebook text-dark mx-1"></i> <i
                                        class="bi bi-linkedin text-dark mx-1"></i> <i
                                        class="bi bi-instagram text-dark mx-1"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <img alt="" class="img-fluid rounded-circle"
                                    src="assets/images/avatars/avatar-2.png">
                                <h3 class="card-title py-2">Jack Wilson</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                    nostrum illo tempora esse quibusdam.</p>
                                <p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i
                                        class="bi bi-facebook text-dark mx-1"></i> <i
                                        class="bi bi-linkedin text-dark mx-1"></i> <i
                                        class="bi bi-instagram text-dark mx-1"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <img alt="" class="img-fluid rounded-circle"
                                    src="assets/images/avatars/avatar-3.png">
                                <h3 class="card-title py-2">Jack Wilson</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                    nostrum illo tempora esse quibusdam.</p>
                                <p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i
                                        class="bi bi-facebook text-dark mx-1"></i> <i
                                        class="bi bi-linkedin text-dark mx-1"></i> <i
                                        class="bi bi-instagram text-dark mx-1"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <img alt="" class="img-fluid rounded-circle"
                                    src="assets/images/avatars/avatar-4.png">
                                <h3 class="card-title py-2">Jack Wilson</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                    nostrum illo tempora esse quibusdam.</p>
                                <p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i
                                        class="bi bi-facebook text-dark mx-1"></i> <i
                                        class="bi bi-linkedin text-dark mx-1"></i> <i
                                        class="bi bi-instagram text-dark mx-1"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- team ends -->
        <section>
            <div class="container">
                <h1 class="section-header">Client Review <span>Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.</span></h1>
                <div class="testimonials">

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="single-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile">
                                                <div class="img-area">
                                                    <img src="assets/images/avatars/avatar-6.png" alt="">
                                                </div>
                                                <div class="bio">
                                                    <h2>Dave Wood</h2>
                                                    <h4>Web Developer</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content">
                                                <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Vel a eius excepturi molestias commodi
                                                    aliquam error magnam consectetur laboriosam numquam, minima eveniet
                                                    nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi
                                                    consequatur molestiae voluptatum!</p>
                                                <p class="socials">
                                                    <i class="fa fa-twitter"></i>
                                                    <i class="fa fa-behance"></i>
                                                    <i class="fa fa-pinterest"></i>
                                                    <i class="fa fa-dribbble"></i>
                                                    <i class="fa fa-vimeo"></i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="single-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile">
                                                <div class="img-area">
                                                    <img src="assets/images/avatars/avatar-5.png" alt="">
                                                </div>
                                                <div class="bio">
                                                    <h2>Martin Guptill</h2>
                                                    <h4>UI/UX Designer</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content">
                                                <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Vel a eius excepturi molestias commodi
                                                    aliquam error magnam consectetur laboriosam numquam, minima eveniet
                                                    nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi
                                                    consequatur molestiae voluptatum!</p>
                                                <p class="socials">
                                                    <i class="fa fa-twitter"></i>
                                                    <i class="fa fa-behance"></i>
                                                    <i class="fa fa-pinterest"></i>
                                                    <i class="fa fa-dribbble"></i>
                                                    <i class="fa fa-vimeo"></i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="single-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile">
                                                <div class="img-area">
                                                    <img src="assets/images/avatars/avatar-3.png" alt="">
                                                </div>
                                                <div class="bio">
                                                    <h2>Stephen Jones</h2>
                                                    <h4>Graphic Designer</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content">
                                                <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Vel a eius excepturi molestias commodi
                                                    aliquam error magnam consectetur laboriosam numquam, minima eveniet
                                                    nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi
                                                    consequatur molestiae voluptatum!</p>
                                                <p class="socials">
                                                    <i class="fa fa-twitter"></i>
                                                    <i class="fa fa-behance"></i>
                                                    <i class="fa fa-pinterest"></i>
                                                    <i class="fa fa-dribbble"></i>
                                                    <i class="fa fa-vimeo"></i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </section>



    </div>


@endsection
