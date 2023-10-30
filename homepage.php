<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MACTEA Homepage</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="d-flex flex-column min-vh-100 m-0">

<!-- navbar start -->
<div class="container-fluid px-5">
    <nav class="navbar navbar-expand-sm navbar-light bg-transparent py-4 px-4">
        <a
            href="#" 
            class="navbar-brand mb-0 fs-5 logo py-auto"
            style="display: flex; align-items: center;"
            data-aos="fade-right" data-aos-delay="100">
                <img 
                class="d-inline-block align-top me-2"
                data-aos="fade-right" data-aos-delay="50"
                src="./images/mactea.png"
                height="60" width="60" />
                MACTEA
        </a>
        <button 
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            class="navbar-toggler"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div 
            class="collapse navbar-collapse " 
            id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="50">
                    <a href="homepage.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="100">
                    <a href="#about" class="nav-link">About</a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="150">
                    <a href="#contact" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- navbar end -->

<!-- container for bg-image and title-con start -->
<div class="container-fluid px-5 px-md-0 d-flex mb-5">
    <!-- <div class="row border"> -->
        <div 
            class="bg-image ms-lg-5 me-lg-2 border-end border-dark" 
            data-aos="zoom-in" data-aos-delay="50"
            style="background-image: url('./images/splash.png');
            height: 90vh; width: 95vh; background-size: contain;">
        </div>
        <div class="title-con p-lg-3 p-md-0 p-sm-0 ms-lg-2 ms-md-1 center">
            <p class="title-enjoy display-2 display-md-3 display-sm-4 text-center m-0 mt-lg-5 " data-aos="fade-left" data-aos-delay="50">Enjoy</p>
            <p class="title display-3 display-md-4 display-sm-5 text-center my-1 "data-aos="fade-left" data-aos-delay="100">your day with a cup of</p>
            <p class="series display-2 display-md-3 display-sm-4 text-center mt-0 my-0 "data-aos="fade-left" data-aos-delay="150">Milk Tea</p>
            <p class="details text-center my-4"data-aos="fade-up" data-aos-delay="50">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Illo laborum molestiae voluptatum vitae consequuntur inventore
            nesciunt praesentium impedit, unde cum consequatur laudantium
            iusto dignissimos quo animi.
            </p>
            <div class="text-center mt-2">
                <button type="button" onclick="signIn()" class="btn btn-outline-success px-lg-4 px-sm-1 mx-1 mx-sm-1 font-weight-bold" data-aos="fade-up" data-aos-delay="100">Sign In</button>
                <button type="button" onclick="signUp()" class="btn btn-outline-success px-lg-4 px-sm-1 mx-1 mx-sm-0 font-weight-bold" data-aos="fade-up" data-aos-delay="100">Sign Up</button>
            </div>  
        </div>
    <!-- </div> -->
</div>

    <!-- container end -->

    <!-- about start -->
<div class="container-fluid">

    <div class="row about p-4 " id="about">
        <div class="col-12 p-lg-4 p-md-2 p-sm-0">
            <h1 data-aos="fade-down" data-aos-delay="50">About us</h1>
            <p data-aos="fade-down" data-aos-delay="100">Welcome to MACTEA: Your Ultimate Milk Tea Destination</p>
            <p data-aos="fade-down" data-aos-delay="150">At MACTEA, we're dedicated to crafting the perfect blend of flavors to bring you an
                unparalleled milk tea experience. Our cozy shop is a haven for milk tea enthusiasts
                , where every sip takes you on a journey of rich aromas and delightful tastes. With
                a wide variety of flavors and customization options, you're sure to find your new favorite here.
            </p>
        </div>
    </div>  
    
    <div class="row highlights-con d-flex bg-dark ">
        <div class="col-lg-6 col-md-12 p-4 text-white">
            <h1 data-aos="fade-right" data-aos-delay="50">Our Menu Highlights</h1>
            <ul>
                <li data-aos="fade-right" data-aos-delay="100">Classic Milk Teas: Indulge in the nostalgia of our classic milk tea varieties, prepared with precision and care. From Traditional Black Milk Tea to Creamy Thai Tea, our classics are designed to satisfy your cravings.
                </li>
                <li data-aos="fade-right" data-aos-delay="120">Fruit-infused Delights: Experience the refreshing fusion of fruit and tea in our Fruit Tea collection. Try our zesty Mango Green Tea or the exotic Passionfruit Oolong.                
                </li>
                <li data-aos="fade-right" data-aos-delay="140">Signature Creations: Unleash your adventurous side with our signature milk tea concoctions. The MACTEA Special blends unique ingredients like boba pearls, aloe vera, and fresh fruit for an explosion of flavors in every cup.
                </li>
                <li data-aos="fade-right" data-aos-delay="160">Custom Creations: Can't find the perfect blend? Create your own milk tea masterpiece. Choose your base tea, sweetness level, toppings, and more, and watch as we turn your vision into reality.
                </li>
            </ul>
        </div>
        <div class="col-lg-6 p-0">
            <div 
                class="bg-image"
                data-aos="zoom-in" data-aos-delay="180"
                style="background-image: url('./images/ingredients.jpg');
                height: 66vh;">
            </div>
        </div>
    </div>


    <div class="row why-con d-flex bg-success">
        <div class="col-lg-6 p-0 d-flex justify-content-end">
            <div 
                class="bg-image"
                data-aos="zoom-in" data-aos-delay="180"
                style="background-image: url('./images/ingredients.jpg');
                width: 100vh; height: 66vh;">
            </div>
        </div>
        <div class="col-lg-6 col-md-12 p-4 text-white">
            <h1 data-aos="fade-left" data-aos-delay="50">Why Choose MACTEA?</h1>
            <ul>
                <li data-aos="fade-left" data-aos-delay="70">Quality Ingredients: We source only the finest tea leaves, fresh fruits, and premium
                    toppings to ensure that every cup is a masterpiece of taste and quality.
                </li>
                <li data-aos="fade-left" data-aos-delay="90">Expert Craftsmanship: Our skilled tea artisans bring years of experience to every brew.
                    With a deep understanding of flavor profiles, they carefully balance ingredients to achieve the perfect blend.
                </li>
                <li data-aos="fade-left" data-aos-delay="110">Cozy Ambiance: Step into our inviting shop, where the aroma of freshly brewed tea welcomes you.
                    Relax in our comfortable seating and enjoy your drink amidst a soothing atmosphere.
                </li>
                <li data-aos="fade-left" data-aos-delay="130">Community and Connection: MACTEA isn't just a shop; it's a community of milk tea enthusiasts.
                    Join us for events, workshops, and a chance to meet fellow tea lovers.
                </li>
            </ul>
        </div>
    </div>

    
    <div class="row visit bg-danger text-white  p-4">
        <h1 class="pb-3 pt-4 text-center" data-aos="fade-up" data-aos-delay="50">Visit Us</h1>

            <div class="col-lg-4 col-md-6 col-sm-12"><!-- Use 'col-4' to create three equal-width columns -->
                <div class="luna p-2 p-md-2" data-aos="fade-up" data-aos-delay="10">
                    <h2 class="fw-bold mb-1 fs-5">Luna Branch</h2>
                    <p><i class="fa-solid fa-location-dot text-white" style="color: #262627;"></i> 9375+WMJ, J Luna St, Poblacion, San Pedro, 4023 Laguna.</p>
                    <p><i class="fa-solid fa-clock" style="color: #fafafa;"></i> 11am-11pm</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12"><!-- Use 'col-4' for the other two columns -->
                <div class="sanAntonio p-2 p-md-2" data-aos="fade-up" data-aos-delay="10">
                    <h2 class="fw-bold fs-5">San Antonio Branch</h2>
                    <p><i class="fa-solid fa-location-dot text-white" style="color: #262627;"></i> 139 A Mabini St, San Antonio, San Pedro, 4023 Laguna.</p>
                    <p><i class="fa-solid fa-clock" style="color: #fafafa;"></i> 12nn-11pm</p>
                </div>
            </div>
        <div class="col-lg-4 col-md-6 col-sm-12"><!-- Use 'col-4' for the last column -->
            <div class="calendola p-2 p-md-2" data-aos="fade-up" data-aos-delay="10">
                <h2 class="fw-bold fs-5">Calendola Branch</h2>
                <p><i class="fa-solid fa-location-dot text-white" style="color: #262627;"></i> Narra Barangay Hall, San Pedro, 4023 Laguna.</p>
                <p><i class="fa-solid fa-clock" style="color: #fafafa;"></i> 11am-8pm</p>
            </div>
        </div>
    </div>

</div>
    <!-- about end -->

    <!-- contact start -->
    <div class="container p-2" id="contact">
        <div class="contact text-dark p-4 mb-3">
            <h1 class="pb-4 text-center" data-aos="fade-up" data-aos-delay="50">Contact Us</h1>
            <div class="d-sm-flex justify-content-between" data-aos="fade-up" data-aos-delay="100">
                <p><i class="fa-solid fa-mobile-screen-button" style="color: #181818;"></i></i></i><span> Mobile Number:</span> 094 837 2846</p>
                <p><i class="fa-solid fa-tty" style="color: #181818;"></i><span> Telephone Number:</span> 7720 689</p>
                <p><i class="fa-solid fa-envelope" style="color: #181818;"></i><span> Email:</span> Macteamilkteashop@gmail.com</p>
            </div>
        </div>
    </div>

    <!-- footer -->
  <div class="container-fluid mt-auto">
    <footer class="footer bg-transparent text-muted text-center py-3 mt-auto border-top border-dark">
        <div class="d-flex">
            <p>&copy; 2023 MACTEA. All rights reserved.</p> 
            <div class="ms-auto">    
                <a href="https://www.facebook.com/macteashop/" target="_blank" class="px-2"><i class="fab fa-facebook-f text-dark"></i></a>
                <a href="https://twitter.com/macteashop" target="_blank" class="px-2"><i class="fab fa-twitter text-dark"></i></a>
                <a href="https://www.instagram.com/macteashop/" target="_blank" class="px-2"><i class="fab fa-instagram text-dark"></i></a>
                <a href="https://www.tiktok.com/@macteamilkteashop" target="_blank" class="px-2"><i class="bi bi-tiktok text-dark"></i></a>
                </div>
            </div>
    </footer>
  </div>

  
 <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous">
</script>   
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>

    function signIn(){
        window.location.href="./login_page/login.php"
    }
    function signUp(){
        window.location.href="./login_page/register.php"
    }

  AOS.init();

</script>
</body>

<style>
    :root{
        --font: Arial, Helvetica, sans-serif;
        --green: #008000;
    }
    *{
        /* border: 1px solid black; */
    } 
     body, html {
         overflow-x: hidden;
    }
    .logo{
        font-family: var(--font);
        font-weight: 900;
        color: var(--green);
    }
    .nav-link{
        font-family: var(--font);
        color: var(--green);
        font-weight: 700;
    }
    ul{
        gap: 7.5rem;
    }
    li{
        padding:0.3rem;
    }
    .bg-image {
    background-size: contain;
    background-repeat: no-repeat;
    }
    .title-con{
        width: 47%;
        /* margin: 0px auto; */
    }
    .title-enjoy{
        font-family: var(--font);
        font-weight: 900;
        color: black;
    }
    .title{
        font-family: var(--font);
        font-weight: 800;
        color: black;
    }
    .series{
        font-family: var(--font);
        font-weight: 900;
        color: black;
    }

    @media (max-width: 800px){
    body {
            overflow-x: hidden;
    }
    ul{
        gap: 1rem;
    }
    .title-enjoy{
        font-size: 40px;
    }
    .title{
        font-size: 30px;
    }
    .series{
        font-size: 40px;
    }
    .details{
        font-size: 18px;
    }
    }

    @media (max-width: 600px){
    body {
            overflow-x: hidden;
    }
        ul{
        gap: 0.5rem;
    }
    .bg-image{
        display: none;
    }
    }

    @media (max-width: 575px){
    body {
            overflow-x: hidden;
    }
    ul{
        gap: 0rem;
    }
    
    .title-con{
        /* border: 1px solid black; */
        width: 100%;
    }
    .footer{
        margin-top: 2rem;
    }
    .title-enjoy{
        font-size: 38px;
    }
    .title{
        font-size: 28px;
    }
    .series{
        font-size: 38px;
    }
    .details{
        font-size: 15px;
    }
    .highlights{
        width: 100% !important;
    }
    .why{
        width: 100% !important;
    }
    }

    
</style>

</html>