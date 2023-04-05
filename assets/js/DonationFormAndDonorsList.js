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