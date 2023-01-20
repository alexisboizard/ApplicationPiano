let cpt = 1;
document.getElementById("left").style.pointerEvents = "none"
document.getElementById("left").style.color= "rgba(0, 0, 0, 0.45)"


function next(){
    console.log("next")
    console.log("card"+cpt)
    if(cpt <= 0){
        cpt = 1;
    }else if(cpt == 3){
        cpt = 3;
        console.log("disable")
        document.getElementById("right").style.pointerEvents = "none"
        document.getElementById("right").style.color= "rgba(0, 0, 0, 0.45)"

    }
    else{
        document.getElementById("card"+cpt).style.display = "none";
        console.log(document.getElementById("card"+cpt))
        cpt++
        document.getElementById("card"+ cpt).style.display = "block";
        document.getElementById("left").style.pointerEvents = "auto"
        if(cpt == 3){
            document.getElementById("right").style.pointerEvents = "none"
            document.getElementById("right").style.color= "rgba(0, 0, 0, 0.45)"
        }else{
            document.getElementById("left").style.pointerEvents = "auto"
            document.getElementById("left").style.color= "#fff"
        }
        
    }

}
function prev(){
    console.log("prev")
    if(cpt == 0){
        //disable prev button
        cpt = 1;
    }else if(cpt > 3){
        cpt = 3;
    }
    else{
        document.getElementById("card"+cpt).style.display = "none";
        console.log(document.getElementById("card"+cpt))
        cpt--
        document.getElementById("card"+ cpt).style.display = "block";
        if(cpt == 1){
            document.getElementById("left").style.pointerEvents = "none"
            document.getElementById("left").style.color= "rgba(0, 0, 0, 0.45)"

        }else{
            document.getElementById("right").style.pointerEvents = "auto"
            document.getElementById("right").style.color= "#fff"
        }
    }
}

function closeTuto(){
    console.log("close")
    document.getElementById("tuto").style.display = "none"
    document.getElementsByClassName("foreground")[0].style.display = "none"
}