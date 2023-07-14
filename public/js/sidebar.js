
///////////////////////////sidebar/////////////////////////////////////////////
var mini = true;

function toggleSidebar() {
  if (mini) {
    console.log("opening sidebar");
    document.getElementById("contentmain").style.marginLeft = "250px";
    
    this.mini = false;
  } else {
    console.log("closing sidebar");
    document.getElementById("contentmain").style.marginLeft = "85px";
 
    this.mini = true;
  }
}

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
