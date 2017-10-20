<div class="contact">
  <h1>Nous contacter</h1>
  <div class="messageSent"></div>
  <form id="contactForm" method="post" action="/contact/send" <?= isset($_GET["subject"]) && $_GET["subject"] == "paypal" ? "class=\"paypal\"" : "" ?>>
    <div class="row">
      <div class="form-group col-4">
        <label for="name">Nom*</label>
        <input class="form-control" type="text" name="name" id="name" required />
      </div>
      <div class="form-group col-4">
        <label for="firstname">Prénom*</label>
        <input class="form-control" type="text" name="firstname" id="firstname" required />
      </div>
      <div class="form-group col-4">
        <label for="email">Email*</label>
        <input class="form-control" type="email" name="email" id="email" required />
      </div>
    </div>
    <div class="form-group">
      <label for="subject">Objet du message*</label>
      <select class="form-control" name="subject" id="subject" required>
        <option value="">-- Sélectionner l'objet du message --</option>
        <option value="paypal" <?= isset($_GET["subject"]) && $_GET["subject"] == "paypal" ? "selected" : "" ?>>Faire un don</option>
        <option value="question">J'ai une question</option>
        <option value="suggestion">J'ai une suggestion</option>
        <option value="job">Je souhaite rejoindre votre super entreprise</option>
        <option value="message">Autre</option>
      </select>
    </div>
    <div class="montant">
      <div class="form-group">
        <label for="don">Montant*</label>
        <input class="form-control" type="number" name="don" id="don" />
      </div>
      <div class="form-group">
        <label for="cardNumber">Numéro de carte*</label>
        <input class="form-control" type="number" name="cardNumber" id="cardNumber" />
      </div>
      <div class="form-group">
        <label for="ccv">CCV*</label>
        <input class="form-control" type="number" name="ccv" id="ccv" />
      </div>
    </div>
    <div class="form-group">
      <label for="message">Message*</label>
      <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
    </div>
    <div class="boutonAction">
      <input type="submit" class="btn btn-default" value="Envoyer" />
    </div>
  </form>
</div>
