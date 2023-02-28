const quote = document.getElementById("quotation");
const author = document.getElementById("author");

fetch('quotes.json',{ method: "GET", mode: 'cors', headers: { 'Content-Type': 'application/json',}})
    .then((response) => response.json())
    .then((json) => { 
        
        function randomQuote() {

            let random = json.quotes[Math.floor(Math.random() * json.quotes.length)];
            console.log(random);
            quote.innerText = random.quote;
            author.innerText = random.author;
            title.innerText = random.title;
          }
          
          randomQuote();
    });