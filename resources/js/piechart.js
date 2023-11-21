import { Chart } from "chart.js/auto";
import { get } from "lodash";



 function getPO(){
  let po = $.get('/chartPO',function(data){
   
      return data
    })       
 return po
}
  
let polist = await getPO()


const data2 = {
  name: 'Position: right',
  labels: [
    'Red',
    
    
  ],
  datasets: [{
    label: 'My First Dataset',
    data: polist['po'],
    backgroundColor: [
      'rgb(255, 99, 132)',
    ],
    hoverOffset: 4,
    

  }]
}

const config = {
  type: 'pie',
  data: data2,
  options: {   
    plugins: {
      legend: {
        display: true,
        position: 'right',
        padding:200

      }
    }
  }
}

new Chart(
  document.getElementById('pie'),
  config
)





