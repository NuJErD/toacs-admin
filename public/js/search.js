function setpage(num){
    let setnum ={
        setpage:num
    }
    console.log(setnum)
    $.get('/product',setnum,function(data){
        location.reload()
    })
}




function search_product(search){

let input = {
    text:search
}
$.get('/search/product',input,function(data){
   
    // $('#product_index').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     columns: [
    //         { data: 'title', name: 'title' },
    //         { data: 'content', name: 'content' },
    //         // Add more columns for additional data
    //     ]
    // });
    //paginate.append(data.links)
    
    datalist = data.product
    show = data.show
    console.log(datalist)
    if (Object.keys(datalist).length > 0) {
        let items = datalist.map(function(product) {
            let active 
             
           
            if(product.Active == 0){              
                active = `<label class="relative inline-flex items-center mb-5 cursor-pointer" >
                <input type="checkbox" value="" class="sr-only peer" id="${product.id}" onclick="active('1',${product.id})" >
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
              </label>`
            }else{
                active = ` <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" id="${product.id}" checked onclick="active('0',${product.id})">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
              </label>`          
            }
            //console.log(active)
            return `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                           
            <td class="px-2 py-2 w-[130px] ">
               <div class="flex justify-center "><img src="picture/product/${product.picture}" class="w-[70px] h-[70px] p-0"  alt=""></div>
            </td>
            <td class="px-2 py-2 w-[130px]" >
                <p class="flex justify-center">{product.p_code}</p>
            </td>
            <td class="px-2 py-2 w-[130px]">
                <p class="flex justify-center">${product.category}</p>    
            </td>
            <td class="px-2 py-2 w-[350px]" >
                <p class="flex justify-center">${product.PnameTH}</p> 
            </td>
           
            <td class="px-2 py-2 w-[130px]">
                <p class="flex justify-center">${product.price}</p>
            </td>
            
              
            
            <td class="w-[250px]">
                <div class="flex justify-center">
                <div class=" ">
                <a href="http://192.168.104.43:81/product/${product.id}/edit" class="font-medium text-white dark:text-blue-500 hover:cursor-pointer mr-3 w-[60px] flex items-center justify-center bg-blue-600 h-[30px] rounded-[4px]">แก้ไข</a>
            </div>    
        </div>
            </td>
            <td>
               
            <div class="" >
            `+active+`
            </div>
          
                                      
          
            </td>
        </tr>`
        })
        //console.log(show)
        if(show === 'none'){
            $('#paginate23').hide()
        }else{
            $('#paginate23').show()
        }
      
       
        $("#product_index").html('')
        $.each(items, function(indexInArray, valueOfitems) {
            $("#product_index").append(valueOfitems)
        })
    } else {
        if(show === 'none'){
            $('#paginate23').hide()
        }else{
            $('#paginate23').show()
        }
        $("#product_index").html('')
        $("#product_index").append('<td colspan="7" class=" text-center h-[50px]">ไม่พบสินค้า</td>')
    }
    // console.log(response.data)


})
}

//------------------------------------------------------------------------------------------------------------------
function search_user(search){
    let input ={
        input:search
    }

    $.get('/search/user',input,function(data){
       
        if(Object.keys(data).length > 0){
           
            let user = data.map(function(u){
                let strA 
                let strR 
                console.log(data)
                if(u.statusA == 'Y'){
                    strA =` <i class="fa-solid fa-check text-green-500 text-[17px]"></i>`                                                                
                }else{
                    strA =`<i class="fa-solid fa-x text-red-600 text-[17px]"></i>`
                }
        
                if(u.statusR == 'Y'){
                    strR =` <i class="fa-solid fa-check text-green-500 text-[17px]"></i>`                                                                
                }else{
                    strR =`<i class="fa-solid fa-x text-red-600 text-[17px]"></i>`
                }

                return `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                  ${u.nameTH}
                </th>
                <td class="px-6 py-4 ">
                   ${u.email}
                </td>
                <td class="px-6 py-4">
                 `+strR+`
                </td>
                <td class="px-6 py-4">
                    `+strA+`
                </td>
                <td class="">
                    <div class="flex justify-center">
                    <div class=" ">
                    <a href="http://192.168.104.43:81/user/${u.id}/edit" class="font-medium text-white dark:text-blue-500 hover:cursor-pointer mr-3 w-[60px] flex items-center justify-center bg-blue-600 h-[30px] rounded-[4px]">แก้ไข</a>
                </div>
               
            </div>
                </td>
            </tr> `
            })
            console.log(user)
            $("#user_index").html('')
            $.each(user, function(indexInArray, valueOfitems) {
                $("#user_index").append(valueOfitems)
            })
            
        }else{
            $("#user_index").html('')
            $("#user_index").append('<td colspan="7" class=" text-center h-[50px]">ไม่พบผู้ใช้งาน</td>')
        }
    })


}


function search_po(num){
    // if(input == ""){
    //     input = null}
    let input = {
        input:num
    }
 $.get('/search/po',input,function(data){
    console.log(data)
    if(Object.keys(data).length > 0){
        let po = data.map(function(p){
            return `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            
            <td class="px-6 py-4 ">
              <p>${p.order_invoice}</p>
            </td>
            <td class="px-6 py-4">
               <p>${p.supplier_name}</p>
            </td>
            <td class="px-6 py-4">
                <p>${p.admin_name}</p>
            </td>
            <td class="px-6 py-4">
                <p>${p.total}</p>
            </td>
            <td class="px-6 py-4">
                <p>รอจัดส่ง</p>
            </td>
            <td class="">
                <div class="flex justify-center">
               
                <a href="http://192.168.104.43:81/checkreceive/${p.order_invoice}" class="font-medium text-white dark:text-blue-500 hover:cursor-pointer mr-3 w-[60px] flex items-center justify-center bg-blue-600 h-[30px] rounded-[4px]">แก้ไข</a>
        </div>
            </td>
        </tr>`
        })
        $("#POindex").html('')
        $.each(po, function(indexInArray, valueOfitems) {
            $("#POindex").append(valueOfitems)
        })
        console.log(po)
    }else{
        $("#POindex").html('')
        $("#POindex").append('<td colspan="7" class=" text-center h-[50px]">ไม่พบคำสั่งซื้อ</td>')
    }
  
 })

   


}