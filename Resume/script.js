/*--toggle icon navbar--*/ 
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}


/*--scroll section active link--*/ 
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () =>{
    sections.forEach(sec =>{
        let top = window.scrollY;
        let offset = sec.offsetTop-150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' + id + ']').classList.add('active');        
            });
        };
    });

   /*--sticky navbar--*/  
   let header = document.querySelector('header');

   header.classList.toggle('sticky', window.scrollY > 100);

   /*--remove toggle icon and navbar when click navbar link--*/
   menuIcon.classList.remove('bx-x');
   navbar.classList.remove('active');

};

/*--scroll reveal--*/
ScrollReveal({
    reset: true,
    distance: '80px',
    duration: 2000,
    
});

window.addEventListener('scroll', reveal);

function reveal(){
    var reveals = document.querySelectorAll('.reveal');
    
    for(var i = 0; i < reveals.length; i++){
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
        }
    }
}

//changine text in home page
var text = ["Front-end Developer", "Back-end Developer", "Full Stack Developer"];
var counter = 0;
var elem = document.getElementById("developer");
var inst = setInterval(change, 3000);

function change() {
  elem.innerHTML = text[counter];
  counter++;
  if (counter >= text.length) {
    counter = 0;
    // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
  }
}

//download the CV button
function downloadFile() {
    window.open("https://docs.google.com/document/d/15rvIWN-WML938RGd1eF0vGfAY_IF9i3q/edit?usp=share_link&ouid=106202717263835961189&rtpof=true&sd=true")
 }

