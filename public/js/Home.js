// function goBack() {
//     // Use the history object to navigate back
//     history.go(-2);
    
//    // window.location.replace(document.referrer);
//   }
//   function goBack2() {
//     // Use the history object to navigate back
//     history.go(-2);
    
//    // window.location.replace(document.referrer);
//   }


// function PRbar(){
//     let pr = fetch('/prbar').then(function(data){
//         return data.json()
//     })
//    return pr
//     // let add = document.getElementById('PRbar')
//     // add.append(pr)
// }
//  async function show(){
//     let a = await PRbar()
//     let count = a['count'].length
//     let prbar = document.getElementById('PRbar')
//     prbar.append(count + ' รายการ')
   
//  }

 
// //-------------------สินค้าที่ต้องได้รับ------------------------//
//  async function receive(){
//     let data = fetch('/dash/receive').then(function(data){
//         return data.json()
//     })
//     let count =  await data
//     let box = document.getElementById('dash_receive')
//     box.append(count['total'] + ' รายการ')
//     console.log(count['total'])
// }

// //-------------------จำนวนที่จ่ายไปทั้งหมด------------------------//
// async function dash_total(){
//     let data = fetch('/dash/total').then(function(data){
//          return data.json()
//     })
//     let total = await data
//     let box = document.getElementById('dash_total')
//     box.append(total['price_total'] + ' บาท')
// }

// show()
// receive()
// dash_total()

