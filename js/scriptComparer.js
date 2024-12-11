if (document.URL.includes("comp1") && document.URL.includes("comp2")) {
  document.getElementById("btn-Couleur").addEventListener("click", modeCouleur);
  function modeCouleur(){
      let div = document.getElementById("comparaison").children;
      for(let i = 0; i <div.length; i++) { 
          let tr = div[i].children[0].children;
          for(let i = 0; i <tr.length; i++) {
              if(tr[i].classList.contains("couleur")){
                  let td = tr[i].children;
                  let nb1 = Number(td[0].innerHTML);
                  let nb2 = Number(td[2].innerHTML);
                  if(nb1 > nb2){
                      td[0].classList.toggle("vert");
                      td[2].classList.toggle("rouge");
  
                  }else if(nb2 > nb1){
                      td[2].classList.toggle("vert");
                      td[0].classList.toggle("rouge");
                  }else{
                      td[2].classList.toggle("gray");
                      td[0].classList.toggle("gray");
                  }
              }
          }
      }
  }}