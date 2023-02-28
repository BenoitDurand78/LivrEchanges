<main>

<?php

if(count($messages) > 0) {
    foreach($messages as $message) {
        if($message["success"]) { ?>
            <p class="alert alert-success"><?= $message["text"] ?></p>
        <?php }
        else { ?>
            <p class="alert alert-danger"><?= $message["text"] ?></p>
        <?php }
    }
}

?>

    <section class="contact">
        <h2 id="contact">Contactez-nous :</h2>

        <form class="row g-3 m-3" action="#" method="POST">

            <div class="col-6 g-3">
                <label for="surname" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="surname" aria-describedby="nameHelp" name="surname">
            </div>
            <div class="col-6 g-3">
                <label for="name" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="firstname" aria-describedby="nameHelp" name="firstname">
            </div>
            <div class="col-6 g-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="col-6 g-3">
                <label for="subject" class="form-label">Sujet du message :</label>
                <input type="text" class="form-control" id="subject" aria-describedby="nameHelp" name="messageSubject">
            </div>
            <div class="col-md-8 g-3 offset-md-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Laissez nous votre message ici :" id="floatingTextarea2" style="height: 100px" name="message"></textarea>
                    <label for="floatingTextarea2">Laissez nous votre message ici :</label>
                </div>
            </div>

            <div class="col-6 mx-auto g-5 text-center">
                <button type="submit" class="btn btn-primary form_sub" name="submit">Envoyer</button>
            </div>
        </form>

    </section>

</main>