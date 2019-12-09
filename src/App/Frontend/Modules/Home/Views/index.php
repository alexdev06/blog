<!-- Masthead -->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

        <!-- Masthead Avatar Image -->
        <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="">

        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0">Alexandre Manteaux</h1>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Masthead Subheading -->
        <p class="masthead-subheading font-weight-bold mb-0">Développeur Web, toujours partant pour de nouveaux projets!</p>

    </div>
</header>

<section  style="background-color: #2c3e50; color: white; width: auto; padding-top: 75px; padding-bottom: 75px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Mes compétences:</h2>
            </div>
        </div>
        <br />
        <div class="row text-center my-4">
            <div class="col-lg-6 col-sm-12">
                <h4>Programmation</h4>
                <ul style="list-style-type:none;  padding-left: 0;">
                    <li>HTML/CSS</li>
                    <li>Bootstrap</li>
                    <li>WordPress</li>
                    <li>Javascript</li>
                    <li>Jquery</li>
                    <li>PHP</li>
                    <li>SQL/MySQL</li>
                    <li>Symfony</li>
                    <li>API Rest</li>
                    <li>Test Unitaires</li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <h4>Divers</h4>
                <ul style="list-style-type:none; padding-left: 0;">
                    <li>Git/Github</li>
                    <li>Méthodologie agile / séquentielle</li>
                    <li>Conception cahier des charges</li>
                    <li>Diagrammes UML</li>
                    <li>Composer</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <h4 class="col-lg-12 text-center"><a href="../files/cv_alexandre_manteaux">Télécharger mon CV</a></h4>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="page-section" id="contact">
<div class="container">

    <!-- Contact Section Heading -->
    <h2 class="text-center text-uppercase titre-pages" style="font-size: 2.5em">Me Contacter</h2>

    <!-- Icon Divider -->
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
    </div>

    <!-- Contact Section Form -->
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <p class="intro">Vous souhaitez me contacter? Remplissez le formulaire ci-dessous et je vous répondrai dans les meilleurs délais.</p>
        </div>
    </div>
    <br />

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <form method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Prénom</label>
                        <input type="text" name="name" class="form-control" placeholder="Prénom" id="name" required data-validation-required-message="Veuillez entrer votre nom.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Nom</label>
                        <input type="text" name="lastName" class="form-control" placeholder="Nom" id="lastName" required data-validation-required-message="Veuillez entrer votre prénom.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Adresse email</label>
                        <input type="email" name="email" class="form-control" placeholder="Adresse email" id="email" required data-validation-required-message="Veuillez entrer votre email.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Message</label>
                        <textarea rows="5" class="form-control" name="message" placeholder="Message" id="message" required data-validation-required-message="Veuillez entrer un message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br />
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <div class="g-recaptcha" data-sitekey="6LehGMAUAAAAAAu-G1BzjkHTyWssiMYxtuL--4bm"></div>
                    </div>
                </div>
                <br />
                <div id="success"></div>
                <div class="row">
                    <div class="form-groupc col-6">
                        <button type="submit" class="btn btn-primary btn-lg" id="sendMessageButton" onclick="return confirm('Valider votre choix?');">Envoyer</button>
                    </div>
                    <div class="form-group col-6 ">
                        <button type="reset" class="btn btn-primary btn-lg" id="sendMessageButton">Réinitialiser</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</section>