var c = 0
function selectSP(){

Swal.fire({
    title: 'Select an Option',
    html: '<div id="select-container"></div>',
    showCancelButton: true,
    confirmButtonText: 'Submit',
    cancelButtonText: 'Cancel',
    preConfirm: () => {
        let selectedOption = $('#select-field').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/po/create2', // Replace with your controller route
            type: 'post', // Use the appropriate HTTP method
            data:{sup:selectedOption},
            success: function (data) {
                window.location.href = '/po/create'
            }
        })
        
    }
})



$.get('/datasup', function (data) {
    console.log(data)
    const options = data.map(item => `<option value="${item}">${item}</option>`);

    // Inject the select field with options into the SweetAlert2 modal
    $('#select-container').html(`
        <select id="select-field" class="swal2-input">
            ${options.join('')}
        </select>
    `)
})

}
function PoAdd(){
    console.log(c)
     if(c == 0){
         $("#POadd").css("display","")
         c = 1
     }else{
         $("#POadd").css("display","none")
         c = 0
     }
    
 }

//------------------------------------------------- Make an AJAX request to fetch the data  GET DATA--------------------------------------------------------------------------------------------------------------------//
function get_prlist(){
    $.get('/get_prlist',function(data){
        console.log(data)

    let selectElement = document.getElementById('PRNO') 
    let option = document.createElement('option')
        
    option.value = ''
    option.className = "text-center"
    option.text = "เลือกใบ PR"
    selectElement.appendChild(option)
// Loop through the data array and create options
    for (var i = 0; i < data.length; i++) {
        
        let option = document.createElement('option')
        
        option.value = data[i]
        option.className = "text-center"
        option.text = "PR."+data[i]
        selectElement.appendChild(option)
}
    })
}


function  getproduct(){
    let pr = document.getElementById('PRNO').value
   
    pr = {
        prno:pr
    }

    $.get('/getproduct',pr,function(data){
        console.log(data)
        let selectElement = document.getElementById('product-po') 
        selectElement.innerHTML = ''
        for (var i = 0; i < data.length; i++) {
        
            let option = document.createElement('option')
            
            option.value = data[i].id
            option.className = "text-center"
            option.text = "PR."+data[i].PnameTH
            selectElement.appendChild(option)
    }
    })
}

function GetProductDetail(){
    let pr = document.getElementById('PRNO').value
    let product = document.getElementById('product-po').value
  
    $.get('/get_productdetail',{product:product, pr:pr},function(data){
       
        dataP = data[0]
      
        let qty = document.getElementById('QTY')
        let unit = document.getElementById('unit')
        let price = document.getElementById('price')
        let total = document.getElementById('totalprice')
        let exp = document.getElementById('expected_date')
        console.log(dataP);
        qty.value = dataP.amount
        unit.value = dataP.unit
        price.value = dataP.products_price
        unit.value = data[2]
        total.value = dataP.total
        
    


    })
}
//------------------------------------------------------------------------------------------------------------------------------//



