// Bouton afficher formulaire de donation

const donationForm = document.getElementById("donationForm");

function displayForm() {
    donationForm.style.display = "block";
    setTimeout(function(){
        donationForm.style.opacity = "1";
    }, 10)

}

const displayFormBtn = document.getElementById("displayFormBtn");
displayFormBtn.addEventListener("click", displayForm);



// Bouton afficher formulaire de commentaire

const commentForm = document.getElementById("commentForm");

function displayCommentForm() {
    commentForm.style.display = "block";
    setTimeout(function(){
        commentForm.style.opacity = "1";
    }, 10)

}

const displayCommentFormBtn = document.getElementById("displayCommentFormBtn");
displayCommentFormBtn.addEventListener("click", displayCommentForm);



// Bouton afficher formulaire de notation

const ratingForm = document.getElementById("ratingForm");

function displayRatingForm() {
    ratingForm.style.display = "block";
    setTimeout(function(){
        ratingForm.style.opacity = "1";
    }, 10)

}

const displayRatingFormBtn = document.getElementById("displayRatingFormBtn");
displayRatingFormBtn.addEventListener("click", displayRatingForm);

// Bouton afficher liste des donneurs

// const donorsList = document.getElementById("donorsList"); 

// function displayDonorsList() {
//     donorsList.style.display = "block";
//     setTimeout(function(){
//         donorsList.style.opacity = "1";
//     }, 10)
// }

// const donorsListBtn = document.getElementById("donorsListBtn");
// donorsListBtn.addEventListener("click", displayDonorsList); 