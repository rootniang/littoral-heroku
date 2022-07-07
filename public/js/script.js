let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});

// let AddBtn = document.querySelector("#add");
// AddBtn.addEventListener("click", ()=>{
//   let html = '<div class="mb-3"><label for="subcategory" class="form-label">Nom de sous-categorie</label><input type="text" name="subcategory[]" class="form-control"></div>' ;
//   let d1 = document.querySelector("#add");
//   d1.insertAdjacentHTML('beforebegin', html);

// });

