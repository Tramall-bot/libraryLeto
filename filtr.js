const fltr = document.getElementById("flt")
const head = document.getElementsByClassName("listRowStatic")[0]

let fltrMode = Number(fltr.value) 
let headlength = head.children.length -1 

if(fltrMode >0){
  if(fltrMode > headlength){
    fltrMode-=headlength
    head.children[fltrMode-1].innerHTML += "&uarr;"
    const elem = head.children[fltrMode-1].firstElementChild
    elem.href = elem.href.replace("A", "D")

  }else{
    head.children[fltrMode-1].innerHTML += "&darr;"
  }
}