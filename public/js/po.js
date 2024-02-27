const { forEach } = require("lodash");

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
              
            }
        })
        
    }
})

$.get('/datasup', function (data) {
    console.log(data)
    let options =[]
    //= data.map(item => `<option value="${item}">${item}</option>`);
    for (var index in data){
        var item = data[index];
        options.push('<option value="' + item + '">' + item + '</option>');
        console.log(options)
    }
    // Inject the select field with options into the SweetAlert2 modal
    $('#select-container').html(`
        <select id="select-field" class="swal2-input border border-black rounded-md">
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


 function po_add_detail(po,pr){
    var selectedValues = [];
    var select = document.getElementById('product-po')
    let table = document.getElementById('POlist')
    for (const option of select.options) {
        if (option.selected) {
            selectedValues.push(option.value)
        }
      }
      //console.log(selectedValues,po,pr)
          $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/po/add/detail',
        data:{pd:selectedValues , po:po, pr:pr},
        dataType: 'json',
        success: function(data) {
        
        location.reload();
       }
       
      })
      



 }

function del_podetail(id){
// console.log(id)
podID = {
    id:id
}
$.get('/po_detail/del',podID,function(data){
    console.log(data)
    $('#PRNO').empty()
    $('#product-po').empty()
    get_po_detail(data)
    get_prlist()
    get_po_detail(data)
    location.reload();
})

}


//--------------------------------------------------------------------------edit amount po ------------------------------------------------------------------//
function openinput(id){
    button = document.getElementById('cf_po')
    button.disabled = true
    button.className = "min-w-[300px] min-h-[50px] rounded-xl bg-gray-500 text-white cursor-not-allowed"
  $('#change'+id).css("display","")
  $('#changeQTY'+id).css("display","none")
  $('#open_input'+id).css("display","none") 
  $('#save_amount'+id).css("display","")
  console.log('TT')
 }

function changeprice(id,po,amount,total,OldAmount,price,pr,p_code){
    valuePD = document.getElementById('change'+id)
    button = document.getElementById('cf_po')
    if(amount == 0 ){
        alert('ใส่จำนวนสินค้า')
        valuePD.value = amount
        valuePD.text = amount
        $("#totals"+id).text(amount*price)
       
        document.getElementById('totals'+id).textContent = amount*price
       
    }else{
        $.get('/save_amount',{po:po,amount:amount,total:total,pr:pr,p_code:p_code},function(data){
            console.log(data.amck)
            $("#totals"+id).text(data.total)
            document.getElementById('totals'+id).textContent = data.total
            valuePD.value = data.amount
            valuePD.text = data.amount
            document.getElementById('changeQTY'+id).textContent = data.amount
        })
        button.disabled = false
        button.className = "min-w-[300px] min-h-[50px] rounded-xl bg-gray-500 hover:bg-green-700 hover:ease-in-out duration-200 hover:scale-104 text-white"
        $('#change'+id).css("display","none")
        $('#changeQTY'+id).css("display","")
        $('#open_input'+id).css("display","" ) 
        $('#save_amount'+id).css("display","none")
    }
    
   
}
function change_amount(id,pr,po,amount,price,p_code){
    console.log(amount)
    valuePD = document.getElementById('change'+id)
    num = valuePD.value
    button = document.getElementById('save_amount'+id)
    total = (amount * price).toFixed(2)
    button.setAttribute("class","bg-green-600 border-none  mr-3")
    button.disabled = false
    console.log(id,pr,po,amount,price,p_code)
    $.get('/get_amount',{pr:pr,po:po,p_code:p_code},function(data){
        console.log(num,data.check,data.amount)
        if( (num - data.check) > data.amount || num < 0){
            valuePD.value = data.amount
            $total2 = (data.amount * price).toFixed(2)
           // $("#totals"+id).text($total2)
            document.getElementById('totals'+id).textContent = ($total2)
            
            
            
            alert('จำนวนเลขมากกว่าคำสั่งซื้อหรือติดลบ')
           
        }
        else{
            $("#totals"+id).text(total)
            document.getElementById('totals'+id).textContent = total
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
        $('#QTY').val(null)
        $('#unit').val(null)
        $('#price').val(null)
        $('#totalprice').val(null)
        $('#expected_date').val(null)
        console.log(data)
        let selectElement = document.getElementById('product-po') 
        selectElement.innerHTML = ''

        let option = document.createElement('option')
            
            
            

        for (var i = 0; i < data.length; i++) {
        
            let option = document.createElement('option')
            
            option.value = data[i].product_code
            option.className = "text-center"
            option.text = data[i].product_name
            selectElement.appendChild(option)
    }
       
        
    })
}

function GetProductDetail(){
//     let pr = document.getElementById('PRNO').value
//     let product = document.getElementById('product-po').value
  
//     $.get('/get_productdetail',{product:product, pr:pr},function(data){
       
//         dataP = data[0]
      
//         let qty = document.getElementById('QTY')
//         let unit = document.getElementById('unit')
//         let price = document.getElementById('price')
//         let total = document.getElementById('totalprice')
//         let exp = document.getElementById('expected_date')
//         // Create a Date object from the datetime string
//     let datetimeObject = new Date(data[1]);

// // Extract the date part as a string in "YYYY-MM-DD" format
//     let dateOnlyString = datetimeObject.toISOString().split('T')[0];
//         console.log(dateOnlyString);
//         qty.value = dataP.amount
//         unit.value = dataP.unit
//         price.value = dataP.products_price
//         unit.value = data[2]
//         exp.value = dateOnlyString
//         total.value = dataP.total
        
    


//     })
}


function get_po_detail(id,type){
//console.log(id)
    if(type == 0){
        type = 0
    }else{
        type = 1
    }
    $.get('/po/getpo/detail',{id:id},function(data){
    let polist = document.getElementById('POlist')
    let html = ``
    let sum = 0
    let vat = 0
    //set empty
    $('#SUM').empty()
    $('#VAT').empty()
    $('#TOTAL').empty()
     datapo = data.po_detail
    //loop po
    for(let i = 0;i < datapo.length;i++){
       
        let note =''
        if(datapo[i].note){
            note = datapo[i].note
        }else{
            note =''
        }

        let price = parseFloat(datapo[i].total)
        sum += price
        sumInt = parseFloat(sum)
        
        vat = ((sum*0.07).toFixed(2))*1
        total = (sumInt+vat).toFixed(2)
      //  console.log(datapo)
     //----check------------///
     if(datapo[i].deliver == 0){
        checked = `<input type="checkbox"   id="${datapo[i].id}" onclick="PoReceive(${datapo[i].id},0)" class="accent-lime-500" >`
     }else{
        checked = `<input type="checkbox"   id="${datapo[i].id}"  onclick="PoReceive(${datapo[i].id},1)" class="accent-lime-500" checked>`
     }
   
    if(type == 1){

    html +=`<tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
    <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  text-center">
    
        <p class=" w-[150px] h-[25px] text-center">PR.${datapo[i].pr_code}</p>

    </th>
    <td class="px-6 py-4 w-auto  text-center text-gray-900">
        <p class="w-[120px] h-[25px] text-center"> ${datapo[i].product_name}</p>
           
    </td>
    <td class="px-6 py-4   text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-center">${datapo[i].QTY}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-center">${datapo[i].unit}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-end">${datapo[i].price}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-end">${datapo[i].total}</p>
    </td>
    <td class="px-6 py-4   text-center text-gray-900">
        <p class="w-[110px] h-[25px]  text-center">${datapo[i].date}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-[70px] h-[25px]  text-center"> ${note}</p>
    </td>
    <td class="px-6 py-4 text-center text-gray-900" >
    <i class="fa-solid fa-trash-can fa-xl hover:cursor-pointer" onclick="del_podetail(${datapo[i].id})"></i>
    
    </td>
    
</tr>`
    }else{

        html +=`<tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
    <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  text-center">
    
        <p class=" w-[150px] h-[25px] text-center">PR.${datapo[i].pr_code}</p>

    </th>
    <td class="px-6 py-4 w-auto  text-center text-gray-900">
        <p class="w-[120px] h-[25px] text-center"> ${datapo[i].product_name}</p>
           
    </td>
    <td class="px-6 py-4   text-center text-gray-900">
        <p class="w-min-[70px] h-[25px]  text-center">${datapo[i].QTY}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-min-[70px] h-[25px]  text-center">${datapo[i].unit}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-min-[70px] h-[25px]  text-end">${datapo[i].price}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-min-[70px] h-[25px]  text-end">${datapo[i].total}</p>
    </td>
    <td class="px-6 py-4   text-center text-gray-900">
        <p class="w-min-[110px] h-[25px]  text-center">${datapo[i].date}</p>
    </td>
    <td class="px-6 py-4  text-center text-gray-900">
        <p class="w-min-[70px] h-[25px]  text-center"> ${note}</p>
    </td>
    <td class="px-6 py-4 text-center text-gray-900" >
    ${checked}
    </td>
    
</tr>`

    }
    }

    $('#POlist').html(html)
    $('#SUM').append(sumInt.toFixed(2))
    $('#VAT').append(vat)
    $('#TOTAL').append(total)
    //-----------change button confirm------------//
    button = document.getElementById('receivedBTN')
    if(data.button === "enable"){
        button.setAttribute("class","min-w-[300px] min-h-[50px] rounded-xl bg-green-500 hover:  text-white hover:scale-104 hover:ease-in-out duration-100 ")
        button.disabled = false
       
   }else{
    button.setAttribute("class","min-w-[300px] min-h-[50px] rounded-xl bg-gray-500 text-white cursor-not-allowed ")
        button.disabled = true
   }
   
    console.log(data)
    })
}
//------------------------------------------------------------------------------------------------------------------------------//

function PoReceive(id,status){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/received",
        data:{id:id , status:status},
        dataType:'json',
        success: function(data){
            
           check = document.getElementById(data.id)
           button = document.getElementById('receivedBTN')
           check.setAttribute("onclick",`PoReceive(${data.id},${data.status})`)
           console.log(data)
           
           button = document.getElementById('receivedBTN')
           if(data.button === "enable"){
               button.setAttribute("class","min-w-[300px] min-h-[50px] rounded-xl bg-green-500 hover:  text-white hover:scale-104 hover:ease-in-out duration-100 ")
               button.disabled = false
              
          }else{
           button.setAttribute("class","min-w-[300px] min-h-[50px] rounded-xl bg-gray-500 text-white cursor-not-allowed ")
               button.disabled = true
          }
          
           console.log(data)
        }
    })
  
}

//------------------------------------------delete PO-------------------------------------------------------------------//
function deletePO(poid){
    Swal.fire({
        title: 'ลบใบคำสั่งซื้อ ('+ poid+')',
        showCancelButton: true,
        icon:'warning',
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        preConfirm: () => {
            document.getElementById('delPO').submit();
           
            
        }
    })
    
}
