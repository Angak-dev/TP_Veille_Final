
let LirePlusBtn = document.getElementById("ReadMoreBtn");
let PostContainer = document.getElementById("PostContainer");

if (LirePlusBtn) {
    LirePlusBtn.addEventListener("click", function() {
        let maRequete = new XMLHttpRequest();
        maRequete.open('GET', 'http://localhost/wordpress_tp2/wp-json/wp/v2/posts?categories=3&order=asc');
        maRequete.onload = function() {
            if (maRequete.status >= 200 && maRequete.status < 400) {
                let data = JSON.parse(maRequete.responseText);
                createHTML(data);
                LirePlusBtn.remove();
            }
            else {
                console.log("Cela n'a pas fonctionné.");
            }
        };

        maRequete.onerror = function() {
            console.log("Erreur de connection");
        };

        maRequete.send();
    });
}

function createHTML(postsData) {
    let notreStringHTML = '';
    for (i = 0; i < postsData.length; i++) {
        notreStringHTML += '<h2>' + postsData[i].title.rendered + '</h2>';
        notreStringHTML += postsData[i].content.rendered;
    }

    PostContainer.innerHTML = notreStringHTML;
}
