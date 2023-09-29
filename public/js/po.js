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
                window.location.href = '/popage/'+data
               console.log(data)
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


 function po_add_detail(id){

    PRNO = document.getElementById('PRNO').value
    product = document.getElementById('product-po').value
    QTY = document.getElementById('QTY').value
    unit = document.getElementById('unit').value
    price = document.getElementById('price').value
    total = document.getElementById('totalprice').value
    date = document.getElementById('expected_date').value
    note = document.getElementById('note').value
//console.log(PRNO,product,QTY)
    console.log(PRNO,product,QTY,unit,price,total,date,note);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/po/add/detail',
        data:{ poID:id, PRNO:PRNO, product:product, QTY:QTY, unit:unit, price:price, total:total, date:date, note:note },
        dataType: 'json',
        success: function(data) {
            location.reload();
           console.log(data)
        
       }
      })

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

        let option = document.createElement('option')
            
            option.value = ''
            option.className = "text-center"
            option.text = "เลือกสินค้า"
            selectElement.appendChild(option)

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
        // Create a Date object from the datetime string
    let datetimeObject = new Date(data[1]);

// Extract the date part as a string in "YYYY-MM-DD" format
    let dateOnlyString = datetimeObject.toISOString().split('T')[0];
        console.log(dateOnlyString);
        qty.value = dataP.amount
        unit.value = dataP.unit
        price.value = dataP.products_price
        unit.value = data[2]
        exp.value = dateOnlyString
        total.value = dataP.total
        
    


    })
}


function get_po_detail(id){
//console.log(id)
    $.get('/po/getpo/detail',{id:id},function(data){
    let polist = document.getElementById('POlist')
    let html = ``
    let sum = 0
    let vat = 0
    //set empty
    $('#SUM').empty()
    $('#VAT').empty()
    $('#TOTAL').empty()
    //loop po
    for(let i = 0;i < data.length;i++){
        let note =''
        if(data[i].note){
            note = data[i].note
        }else{
            note =''
        }

        let price = parseFloat(data[i].total)
        sum += price
        vat = ((sum*0.07).toFixed(2))*1
        total = sum+vat
        console.log(price)
       
    html +=`<tr id="POadd" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
    <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  text-center">
    
        <p class=" w-[150px] h-[25px] text-center">PR.${data[i].pr_code}</p>

    </th>
    <td class="px-6 py-4 w-auto  text-center text-gray-900">
        <p class="w-[120px] h-[25px] text-center"> ${data[i].product_name}</p>
           
    </td>
    <td class="px-6 py-4   text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-center">${data[i].QTY}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-center">${data[i].unit}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-end">${data[i].price}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-end">${data[i].total}</p>
    </td>
    <td class="px-6 py-4   text-center text-gray-900">
        <p class="w-[110px] h-[25px]  text-center">${data[i].date}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-center"> ${note}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        
    </td>
    
</tr>`
       
    }

    $('#POlist').html(html)
    $('#SUM').append(sum)
    $('#VAT').append(vat)
    $('#TOTAL').append(total)
    //console.log(vat,sum,total)
    })
}
//------------------------------------------------------------------------------------------------------------------------------//



