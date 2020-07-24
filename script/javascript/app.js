 export class gui_display{
            constructor(){
                this.menuBtn = document.querySelector(".menu_icon");
                this.menuBox = document.querySelector(".side_menu");
                this.newsletterBtn = document.querySelector(".newsletter");
                this.newsletterSM = document.querySelector(".newsletterSM");
                this.formCarpet= document.querySelector(".form_carpet");
                this.form_close_btn = document.querySelector(".form_close_btn");
                this.subscriber = document.querySelector(".subscriber");
            }

            menu_display(){
                try {
                    this.menuBtn.addEventListener("click",()=>{
                        if (this.menuBox.classList.contains("hide")) {

                            this.menuBox.classList.replace("hide","show");

                        }
            
                        else {

                            this.menuBox.classList.replace("show","hide");
                            
                        }

                        
                    })
                } catch (error) {
                    console.error("the error caused was " + error);
                }
            }

            newsletter_form(){
                try {
                    this.newsletterBtn.addEventListener("click",()=>{
                        if (this.formCarpet.classList.contains("hide")) {
                            this.formCarpet.classList.replace("hide","show");
                        }
            
                        else {
                            this.formCarpet.classList.replace("show","hide");
                        }

                        
                    })
                } catch (error) {
                    console.error("the error caused was " + error);
                }

                // Another try catch for the big close button 
                try {
                    this.form_close_btn.addEventListener('click',()=>{

                        if (this.formCarpet.classList.contains("hide")) {

                            this.formCarpet.classList.replace('hide','show');

                        } else {

                            this.formCarpet.classList.replace('show','hide');

                        }
                    })
                    
                } catch (error) {
                    console.error("ERROR OCCURED HERE >> " + error);
                }

                // Another try catch for newsletter in side menu

                try {
                    this.newsletterSM.addEventListener('click',()=>{
                        if (this.formCarpet.classList.contains("hide")) {

                            this.formCarpet.classList.replace('hide','show');

                            this.menuBox.classList.replace("show","hide");
            
                        } else {

                            this.formCarpet.classList.replace('show','hide');
                            this.menuBox.classList.replace('show','hide');

                        } 
                    })
                } catch (error) {
                    console.log("ERROR OCCURED WHILE RUNNING SIDE MENU NEWSLETTER POP UP");
                }

            }
}

let gui_controller = new gui_display();

gui_controller.menu_display();
gui_controller.newsletter_form();


class cardSelections{
    constructor(){
        this.measurement = document.querySelector('.measurement');
        this.cutting = document.querySelector('.cutting');
        this.techniques = document.querySelector('.techniques'); 
    }

    // this method is fired when card of measurement is clicked
    measurementClicked (){
        this.measurement.addEventListener('click',()=>{
            window.open("././links/measurement/measurement.htm");
        },false);
    }

    // this metthod is fired when card of cutting is clicked
    cuttingClicked (){
        this.cutting.addEventListener('click',()=>{
            window.open("././links/cutting/cutting.htm");
        },false);
    }

    // this metthod is fired when card of sewing is clicked
    techniquesClicked (){
        this.techniques.addEventListener('click',()=>{
            window.open("././links/advance_techniques/techniques.htm");
        },false);
    }


}


const cardClicked = new cardSelections();

cardClicked.cuttingClicked();
cardClicked.measurementClicked();
cardClicked.techniquesClicked();

class newsletter_subscription extends gui_display{
    constructor(){
        super();
        this.username = document.querySelector('.formUsername');
        this.email = document.querySelector('.formEmail');
        this.commentPost = document.querySelector('.comment_box');
        this.commentusername = document.querySelector('#commentusername');
        this.loader = document.querySelector('.main_loader');
    }

    passemail(event){
        event.preventDefault();
        let params = 'email=' + this.email.value + '&username= ' + this.username.value;
        const xhr = new XMLHttpRequest();
        
        xhr.open('POST','script/php/subscribe.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


        xhr.onload = function () {
                
                if (this.status === 200) {

                    let notify = document.querySelector('.submit_notice');
    
                    notify.innerHTML = xhr.responseText;
    
                    console.log(xhr.responseText);
    
                } else if (this.status === 404) {

                    let notify = document.querySelector('.submit_notice');
    
                    notify.innerHTML = xhr.responseText;
    
                    alert("PAGE NOT FOUND");

                    console.error ("THE PHP FILE DIRECTORY PASSED IS INCORRECT");
    
                }
            
        }

        xhr.onerror = (error)=>{
            console.error("error found: "+ error);
            alert("error found: " + error);
        };

        xhr.send(params);
    }

    passcomments(event){
        event.preventDefault();
        let params = 'commentpost= ' + this.commentPost.value;

        let xhr = new XMLHttpRequest();
        xhr.open('POST','script/php/comment.php', true);
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded')

        xhr.onload = function () {
            if (this.status === 200) {
                console.log(xhr.responseText);

            } else if (this.status === 404) {

                console.error("ERROR WAS NOT FOUND");

            }
        }

        xhr.send(params);
        
    }


    fetchcomments(event){
        event.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'script/php/fetchcomments.php',true);

        xhr.onloadstart = ()=>{
            this.loader.style.display = 'block';
        }

        xhr.onloadend = ()=>{
            this.loader.style.display = 'none';
        }

        xhr.onload = function () {
            if (this.status === 200) {
                let comments = JSON.parse(this.responseText);

                // alert(comments);
                let commentBox = document.querySelector(".commentators"); 
                let passer = '';

                for (let i in comments) {
                    passer += ` 
                    <article class="comment_name"> ${comments[i].username} 
                        <li class="time">${comments[i].timeofpost}</li></article>
                    <article class="comment_post">${comments[i].comments}</article> `;
                }

                commentBox.innerHTML = passer;
        
            } else if(this.status === 404) {
                alert("page not found ");
            }
            
        }

        xhr.send();

    }

    
}

let databaseSubmission = new newsletter_subscription();

document.querySelector('.formSubmit').addEventListener('click',()=>{
    databaseSubmission.passemail(event);
});

document.querySelector(".submit_btn").addEventListener('click', (e)=>{
    e.preventDefault();
    databaseSubmission.passcomments(event);
    databaseSubmission.fetchcomments(event);
},false);

window.addEventListener('load', ()=>{
    databaseSubmission.fetchcomments(event);
}); 

