<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <title>CODE101 | Bienvenue</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Bootstrap core CSS -->
    <link href="{{asset('front_end/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel ="stylesheet" href ="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css ">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('img/logo_15_mini.ico')}}" />

  <!-- Custom fonts for this template -->
  <link href="{{asset('front_end/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('front_end/css/agency.min.css')}}" rel="stylesheet">
    
   
    

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{asset('img/logo-dark.png')}}"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
      aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
  
  <!-- Header -->
  <header class="masthead" style="background-image: url('img/homescreen_code101.jpg')">
    <div class="container page-scroll">
      <div class="intro-text">  
        <div class="intro-lead-in" data-aos="fade-up" data-aos-duration="3000" style="font-style: italic">Votre partenaire de santé</div>
        <div class="">Le bon quart de travail au bon moment</div><br><br>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" data-aos="fade-up" data-aos-duration="3000" href="#services">Rejoins-nous</a>
      </div>
    </div>
  </header>

  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container"  data-aos="flip-left" data-aos-duration="2000" data-aos-delay="500">
      
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-users" style="color: purple"></i>
          </span>
          <h4 class="service-heading">Banque de partenaire</h4>
          <p class="text-muted">Nous disposons d'une grande banque d'infirmier(e)s autorisé(e)s et infirmier(e)s auxiliaires, préposé(e)s aux bénéficiaires, aides soignant(e)s loi 90. Confiez-nous vos besoins et nous trouverons pour nous.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-bolt highlight" style="color: purple"></i>
          </span>
          <h4 class="service-heading">Simplicité & rapidité</h4>
          <p class="text-muted">Soumettez votre besoin en 5 clics. Nous le diffusons instantanément à notre réseau de professionnels de la santé.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-user" style="color: purple"></i>
          </span>
          <h4 class="service-heading">Autonomie</h4>
          <p class="text-muted">Plus besoin d'appeler! Soumettez vos besoins et nos partenaires les recevront.
Professionnels de la santé, travaillez quand vous le souhaitez.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-wallet" style="color: purple"></i>
          </span>
          <h4 class="service-heading">Revenu supplémentaire</h4>
          <p class="text-muted">Soyez votre propre patron. Travaillez lorsque vous le désirez. Gagnez plus en fonction de vos besoins!</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-book-open" style="color: purple"></i>
          </span>
          <h4 class="service-heading">Transparence</h4>
          <p class="text-muted">Consultez l'historique de vos activités passées, en cours et à venir.</p>
        </div>
          <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-life-ring" style="color: purple"></i>
          </span>
          <h4 class="service-heading">Support 24/7</h4>
          <p class="text-muted">En cas de besoin, une équipe dévouée vous assiste en tout temps.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class=" page-section" id="portfolio" style="background-color: black">
    <div class="container" data-aos="zoom-in" data-aos-duration="2000">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h2 class="section-heading text-uppercase">A propos de nous</h2>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
           <p class="text-muted">Code 101 est entreprise novatrice et technologique Québécoise en ressources de santé qui utilise les               technologies de l’information et de communication afin de mettre en contact les professionnels de la santé avec des Résidences pour   Personnes âgées du réseau de santé, public et privé.<br>
            CODE 101 veut apporter un changement marqué dans la vie des humains qui travaillent en partenariat avec elle et de toutes ces personnes qui recevront des services via son réseau.<br>
            La devise qui dirige toutes les actions de CODE 101 est : UN BESOIN COMBLÉ EST UN BONHEUR ACQUIS.</p>
            </div>
         <div class="col-lg-6">
             <p class="text-muted">
            Code 101 se veut une entreprise humaine et soucieuse de la communauté.<br><br></p>
           <p class="text-muted"> A cet effet, elle s’est engagée, dans les textes de sa convention, à donner 10% de ses profits aux centres communautaires et à l’intégration des nouveaux immigrants.</p>
      </div>
    </div>
    </div>
  </section>
    
    <!-- Nous recrutons -->
<section class="">
    <div class="container" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500">
        <div class="region region-onepage-facts">
        <div class="block block-block">
            <div class="content">
                <h1 style="color: red; text-align: center">Nous recrutons!</h1> <br> 
                <div class="counter-row row text-center wow fadeInUp animated animated" style="visibility: visible;">
                    <div class="col-md-3 col-sm-6 fact-container">Infirmier(e)s autorisé(e)s</div>
                    <div class="col-md-3 col-sm-6 fact-container">Infirmier(e)s auxiliaires</div>
                    <div class="col-md-3 col-sm-6 fact-container">Préposé(e)s aux bénéficiares</div>
                    <div class="col-md-3 col-sm-6 fact-container">Aides soignant(e)s loi 90</div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    
    <section class="" style="background-image: url('img/9.jpg')">
    <div class="container">
        <div class="region region -onepage-facts">
        <div class="block block-block">
            <div class="content">
                <p style="text-align: center"><h3 style="color: white" data-aos="fade-left" data-aos-duration="3000"><span class="highlight" style="color: purple">"</span>La différence entre l'ordinaire et l'extraordinaire se trouve dans les détails<span class="highlight" style="color: purple">"</span></h3></p>
                 <p style="color: darkgray; text-align: center; font-size: 20px" data-aos="fade-right" data-aos-duration="3000">Equipe code101</p>
                
            </div>
        </div>
    </div>
 </section>
    
 <!-- Ce que nous faisons -->   
     <section class="page-section" id="services">
    <div class="container">
      <h2 style="color: dark; text-align: center">Ce que nous faisons.</h2> 
        <p style="color: purple; text-align: center; font-size: 20px">Combler les besoins en personnel de santé est notre raison d'être</p>
        
      <div class="row text-center" data-aos="fade-left" data-aos-duration="3000">
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <i class="fas fa-glasses"></i>
          </span>
          <h4 class="service-heading">Combler des besoins</h4>
          <p class="text-muted">Nous nous engageons à faire le maximum pour répondre à vos demandes. Comptez sur nous!</p>
        </div>
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <i class="fas fa-lock"></i>
          </span>
          <h4 class="service-heading">Créer des relations de confiance</h4>
          <p class="text-muted">Loyauté, éthique, responsabilité. Tel est notre engagement!</p>
        </div>
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <i class="far fa-gem"></i>
          </span>
          <h4 class="service-heading">Apporter de la valeur</h4>
          <p class="text-muted">Faire la différence dans les vies grâce à un service irréprochable.
L'Humain est au centre de nos préoccupations!</p>
        </div>
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <i class="far fa-life-ring"></i>
          </span>
          <h4 class="service-heading">Accompagner nos partenaires</h4>
          <p class="text-muted">Nous cheminons avec vous et demeurons disponibles pour répondre à vos interrogations.
Nous sommes là pour vous!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact" style="background-color: white">
    <div class="container" data-aos="fade-up" data-aos-duration="3000">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase" style="color: black">DES QUESTIONS?</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Votre Nom *" required="required" data-validation-required-message="Entrez votre nom.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Entrez votre adresse email.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Votre Numéro *" required="required" data-validation-required-message="Entrez votre numéro de téléphone.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Votre Message *" required="required" data-validation-required-message="Entrez votre message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyez Message</button>
              </div>
            </div>
          </form>
           <br> 
        <div class="col-md-12 text-center" style="visibility: visible; color: white;">        
            <p>Nous aimerions avoir de vos nouvelles, alors mettons-nous en contact!</p>
                <h4>CONTACTEZ NOUS AUJOURD'HUI!</h4>
            <p><i class="fas fa-map-marker-alt"></i> 1005 rue Salaberry, Suite 1, Québec, QC, G1R 2V6</p>
            <p><i class="fas fa-map-marker-alt"></i> 726 Avenue Royale, Bureau 4, Québec, QC, G1E 1Z4</p>
            <p><i class="fas fa-phone-square-alt"></i>(581) 578-3394</p>
        </div>
            
        </div>
      </div>
    </div>
  </section>
    
   <!-- bas de page --> 
    <section class="page-section"  style="background-color: gray">
    <div class="container"  data-aos="fade-up" data-aos-duration="3000">
      <div  class="row text-center">
        <div class="col-md-3">
          <h4 class="service-heading">Contrats</h4>
          <a href="#" style="color: purple">Conditions d'utilisation</a><br>
          <a href="#" style="color: purple">Politique de confidentialité</a>
        </div>
        <div class="col-md-3">
          <h4 class="service-heading">Venez passer une entrevue</h4>
            <p><i class="fas fa-map-marker-alt" style="color: purple"></i> 726 Avenue Royale, Bureau 4, Québec, QC, G1E 1Z4</p>
        </div>
        <div class="col-md-3">
          <h4 class="service-heading">Contactez-nous aujourd'hui</h4>
            <p><i class="fas fa-map-marker-alt" style="color: purple"></i> 1005 rue Salaberry, Suite 1, Québec, QC, G1R 2V6</p>
            <p><i class="fas fa-phone-square-alt" style="color: purple"></i>(581) 578-3394</p>
        </div>
        <div class="col-md-3">
          <h4 class="service-heading">A propos de code101</h4>
            <p>Code 101 se veut une entreprise humaine et soucieuse de la communauté.<br>A cet effet, elle s’est engagée, dans les textes de sa convention, à donner 10% de ses profits aux centres communautaires et à l’intégration des nouveaux immigrants.
            </p>
        </div>
      </div>
    </div>  
  </section>

  <!-- Footer -->
  <footer class="footer" style="background-color: black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; <span style="color: purple">CODE101</span> 2020</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
       
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

  
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('front_end/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('front_end/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('front_end/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    

  <!-- Contact form JavaScript -->
  <script src="{{asset('front_end/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('front_end/js/contact_me.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('front_end/js/agency.min.js')}}"></script>
     
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
   
</body>

</html>
