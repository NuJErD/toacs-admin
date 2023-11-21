function active(status, id){

  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'put',
    url: '/active/'+id,
    data:{ status:status, pid:id},
    dataType: 'json',
    success: function(data) {
       let status = document.getElementById(id)
       status.setAttribute('onclick',`active(${data[2]},${id})`)
       console.log(data)
      
        Swal.fire({
            title: data[1],
            text: '',
            icon: 'success'
          }).then(() => {
                //window.location.reload();    
        });
          
    
   }
  })
}

function checkinput(code,newcode){
  let check = Object.values(code).includes(newcode)
  let border = document.getElementById('code')
  let codecheck = document.getElementById('codecheck')

  if(check){
    border.setAttribute("class","  peer pl-3 w-[450px] ml-6 h-[35px] border border-red-500 rounded-[5px]")
    $('#codealert').css('display','flex')
  }else{
    border.setAttribute("class","valid:border-green-500 peer pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]")
    $('#codealert').css('display','none')
  }
 console.log(newcode)
}