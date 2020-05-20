
class gui_display{
    constructor(){
        this.menuBtn = document.querySelector(".menu_icon");
        this.menuBox = document.querySelector(".side_menu");
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
            console.log("the error caused was " + error);
        }
    }
}

let gui_controller = new gui_display();

gui_controller.menu_display();