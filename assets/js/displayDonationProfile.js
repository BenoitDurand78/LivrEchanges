const donationsList = document.getElementById("donationsList");

function displayDonationsList() {
    donationsList.style.display = "block";
    setTimeout(function(){
        donationsList.style.opacity = "1";
    }, 10)

}

const displayDonationsBtn = document.getElementById("displayDonationsBtn");

displayDonationsBtn.addEventListener("click", displayDonationsList);