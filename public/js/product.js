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