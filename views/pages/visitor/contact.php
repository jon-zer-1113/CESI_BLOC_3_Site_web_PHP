<?php ?>
<section class="visitor__contact-page">
    <h1 class="text-center">Contact</h1>

    <article class="text-center">
        <h2 class="mt-3 mb-5 col-8 mx-auto">Informations de contact</h2>
        <h3 class="col-8 mx-auto">N'hésite pas à nous contacter ! </h3>
        <p class="col-8 mt-4 mx-auto px-3">Tu as des questions ? <span>N'hésite pas à nous appeler ou à nous envoyer un email, </span><span>nous serons ravis de pouvoir t'aider.</span></p>
        <address class="mt-4 mb-3 mx-auto px-5">
            <span>56 Cité du Geek</span>
            <span>33000 Bordeaux</span>
            <span>05 56 28 19 45</span>
        </address>
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#contact-team" title="Écris-nous !"><i class="fa-regular fa-paper-plane"></i></button>
    </article>
    <!-- MODAL CONTACT INFORMATION -->
    <div id="contact-team" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contact-visitor__modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="contact-visitor__modal"><i class="fa-regular fa-paper-plane"></i> Envoyer un email</h4>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="https://formsubmit.co/z1lk1i7di@mozmail.com" class="needs-validation" method="POST" novalidate>
                        <input type="hidden" name="_template" value="table">
                        <input type="text" name="_honey" style="display:none">
                        <input type="hidden" name="_blacklist" value="sex, porn, porno, viagra, money, cash">
                        <input type="hidden" name="_next" value="http://8bit-burger.fr/?p=contact">
                        <input type="hidden" name="_subject" value="Nouveau message d'un visiteur">
                        <input type="hidden" name="_autoresponse" value="Hello visiteur ! L'équipe de 8Bit-Burger a bien reçu ton message, nous reviendrons vers toi dans les plus brefs délais ! A bientôt 😉">
                        <div class="mb-3">
                            <label for="visitor-fname" class="form-label">Prénom:</label>
                            <input type="text" class="form-control" name="visitor-fname" id="visitor-fname" placeholder="Prénom" required>
                            <div class="invalid-feedback">
                                Prénom manquant.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="visitor-lname" class="form-label">Nom:</label>
                            <input type="text" class="form-control" name="visitor-lname" id="visitor-lname" placeholder="Nom" required>
                            <div class="invalid-feedback">
                                Nom manquant.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            <div class="invalid-feedback">
                                Email invalide.
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="visitor-message" class="form-label">Message:</label>
                            <textarea class="form-control" name="visitor-message" id="visitor-message" rows="8" placeholder="Écris ton message ici !" required></textarea>
                        </div>
                        <button type="button" class="btn btn-primary text-uppercase mx-auto d-block" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>