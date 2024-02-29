      		<!-- NEWSLETTER -->
              <div id="newsletter" class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="newsletter">
                                <p>Entrez votre Numéro de Téléphone ou votre adresse mail pour recevoir des notification lors de nos  <strong>PROMOTIONS.</strong></p>
                                <form>
                                    <input class="input" type="email" placeholder="Enter Your Email">
                                    <button class="newsletter-btn"><i class="fa fa-envelope"></i>S'abonner</button>
                                </form>
                                <ul class="newsletter-follow">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /NEWSLETTER -->
    
            <!-- FOOTER -->
            <footer id="footer">
                <!-- top footer -->
                <div class="section">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-3 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">A propos de nous</h3>
                                    <p>NL telecom est une boutique de vente des Telephones portables, ordinateurs, Appareils electroniques,Accessoires electroniques et bien d'autres. Notre boutique physique est 
                                         ouverte de lundi a samedi 8h-20h </p>
                                    <ul class="footer-links">
                                        <li><a href="#"><i class="fa fa-map-marker"></i>Carrefour MUTZIG Bonaberi Douala</a></li>
                                        <li><a href="#"><i class="fa fa-phone"></i>+237 650781558</a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i>nlelectro01@email.com</a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="col-md-3 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">Categories</h3>
                                    <ul class="footer-links">
                                        <li><a href="#">Bonnes Affaires</a></li>
                                        <li><a href="#">Appareils Electroniques</a></li>
                                        <li><a href="#">Telephones</a></li>
                                        <li><a href="#">Ordinateurs</a></li>
                                        <li><a href="#">Accessoires</a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="clearfix visible-xs"></div>
    
                            <div class="col-md-3 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">Informations</h3>
                                    <ul class="footer-links">
                                        <li><a href="#">A propos</a></li>
                                        <li><a href="#">Contact </a></li>
                                        <li><a href="#">Politique de confidentialité</a></li>
                                        <!--<li><a href="#">Orders and Returns</a></li>-->
                                        <li><a href="#">Termes & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="col-md-3 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">Services</h3>
                                    <ul class="footer-links">
                                        <li><a href="#">Mon Compte</a></li>
                                        <!--<li><a href="#">voir le panier</a></li>-->
                                        <!--<li><a href="#">Wishlist</a></li>-->
                                        <!--<li><a href="#">Track My Order</a></li>-->
                                        <li><a href="#">Aide</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <!-- /top footer -->
    
                <!-- bottom footer -->
                <div id="bottom-footer" class="section">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="footer-payments">
                                    <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                                    <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                                    <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                                    <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                                    <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                                    <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                                </ul>
                                <!--<span class="copyright">
                                     <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
                                </span>-->
                            </div>
                        </div>
                            <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <!-- /bottom footer -->
            </footer>
            <!-- /FOOTER -->
    
            <!-- jQuery Plugins -->
            <script src="{{asset('/frontend/js/jquery.min.js')}}"></script>
            <script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('/frontend/js/slick.min.js')}}"></script>
            <script src="{{asset('/frontend/js/nouislider.min.js')}}"></script>
            <script src="{{asset('/frontend/js/jquery.zoom.min.js')}}"></script>
            <script src="{{asset('/frontend/js/main.js')}}"></script>

            {{-- script pour gerer les message--}}
            <script>
                document.addEventListener('DOMContentLoaded',function(){
                    let successMessage=document.querySelector('.alert-success');
                    let errorMessage=document.querySelector('.alert-danger');
    
                    //afficher les message pour une durée de 2s
    
                    function hideMessage(element)  {
                        if(element){
                            successMessage.style.transition='opacity 1s';
                            successMessage.style.opacity='0.5';
                            element.addEventListener('transitionend',function(){
                                element.style.display='none';
                            });
                        }
                    }

                    setTimeout(function(){
                        hideMessage(successMessage);
                        hideMessage(errorMessage);
                        
                    }, 5);
                        
                      
                });
            </script>
 
    