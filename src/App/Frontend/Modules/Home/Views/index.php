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
      <p class="masthead-subheading font-weight-light mb-0">Développeur Web</p>

    </div>
  </header>

 <!-- Contact Section -->
 <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Me Contacter</h2>

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
            <div class="col-lg-8 mx-auto">
                <p class="lead">Vous souhaitez me contacter? Remplissez le formulaire ci-dessous et je vous répondrai dans les meilleurs délais.</p>
            </div>
        </div>
        <br />

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
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
                    <input type="text" name="last_name" class="form-control" placeholder="Nom" id="last_name" required data-validation-required-message="Veuillez entrer votre prénom.">
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
            <br>
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


