function goBack() {
    // Use the history object to navigate back
    window.history.back();
   // window.location.replace(document.referrer);
  }


function PRbar(){
    let pr = fetch('/prbar').then(function(data){
        return data.json()
    })
   return pr
    // let add = document.getElementById('PRbar')
    // add.append(pr)
}
 async function show(){
    let a = await PRbar()
    console.log(a['count'])
    let prbar = document.getElementById('PRbar')
    prbar.append(a['count'])
 }

 show()

