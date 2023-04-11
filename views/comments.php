<h2>Commentaires </h2>


<div class="comment">
    <div class="commentIntro">
        <button class="btn btn-primary" id="displayCommentFormBtn">Cliquez ici pour laisser un commentaire</button>
    </div>

    <div id="commentForm" style="display:none; opacity:0; transition: opacity 1s">
    <?php

    if(isset($_SESSION["id_user"])){ ?>
        <form action="#" method="POST" >
        <div class="commentForm">
            <label for="comment">Ecrivez ici votre commentaire : </label>
            <textarea id="comment" name="comment" rows="5" cols="40"></textarea>    
        </div>
        <div class="submitComment">
            <button type="submit" class="btn btn-primary" name="submitComment">Poster le commentaire</button>
        </div>
    </form> <?php
    } else {
        ?> <p class="verifyLogin">Vous devez être connecté pour laisser un commentaire. Rendez-vous à la page de connexion <a href="/connexion.php">ici</a>.</p>
        <?php 
    }
       ?>
    </div>
</div>

<?php 

if ($allComments == false) { ?>
        <p>Aucun commentaire n'a été posté pour ce livre jusqu'à maintenant. Soyez le premier à le faire !</p> <?php
    } else { 
        foreach ($allComments as $comment) {
        ?>
            <div class="comments">
                <div class="col-12 m-2">
                    <div class="card commentsCard">
                        <div class="card-body card-comments">
                            <div class="card-head commentsCardHead">
                                <img class="commentPicture" src="/../assets/img/users/<?= $comment->user->picture ?>" alt="Illustration de <?= $comment->user->picture ?>">
                                <p class="card-title"><?= $comment->user->firstname ?> a écrit : </p>
                                <p class="card-text">le <?= $comment->displayDate() ?></p>
                            </div>
                            <div class="card-info commentsCardInfo">
                                <p class="card-text"><?= $comment->comment ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
?>