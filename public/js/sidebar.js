
///////////////////////////sidebar/////////////////////////////////////////////
var mini = true
///////////////////////////showpicupload///////////////////////////////
function readURL(input) {
  if (input.files && input.files[0]) {
     var reader = new FileReader();

       reader.onload = function (e) {
           $('#blah')
               .attr('src', e.target.result);
           $('#blah')
               .attr('class', 'w-[240px] h-[130px]');
       };
      
      reader.readAsDataURL(input.files[0]);
      console.log(reader)
  }
  
}

//////////////////toggle import////////////////////
var importbtn = true;
function openimport(){
  
  if (importbtn) {
    console.log(importbtn);
    document.getElementById("importbtn").style.display = "flex";
    
    this.importbtn = false;
  } else {
    console.log(importbtn);
    document.getElementById("importbtn").style.display = "none";
 
    this.importbtn = true;
  }
}


var mini = true;

function toggleSidebar() {
  if (mini) {
    console.log("opening sidebar");
    document.getElementById("contentmain").style.marginLeft = "250px";
    document.getElementById("contentmain").style.transitionDuration = '0.3s';
    console.log(1)
    this.mini = false;
  } else {
    console.log("closing sidebar");
    document.getElementById("contentmain").style.marginLeft = "85px";
    document.getElementById("contentmain").style.transitionDuration = '0.3s';
  console.log(2)
    this.mini = true;
  }
}

function aa(){
  console.log(111)
}
