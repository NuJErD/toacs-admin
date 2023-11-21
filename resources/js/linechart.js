import Chart from 'chart.js/auto';

const Utils = {
    months: ({ count }) => {
      const currentMonth = 0; // Get the current month (0-indexed)
      const months = [];
  
      for (let i = 0; i < count; i++) {
        const nextMonthIndex = (currentMonth + i) ;
        // You might want to format the month names based on your requirements
        const monthName = getMonthName(nextMonthIndex);
        months.push(monthName);
      }
     // console.log(currentMonth)
      return months;
    },
  };
  
  // Function to get the name of the month
  const getMonthName = (monthIndex) => {
    const monthNames = [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
    ];
  
    return monthNames[monthIndex];
  };
  //console.log(Utils.months({ count: 12 }))
  // Example usage
const labels = Utils.months({ count: 12 });

 function getpo(){
 let a = fetch('/chartPO')
  .then(function (data){
    return data.json()
  })
    return a
}
const poprice = await getpo()
//console.log(poprice)
const data = {
    labels: labels,
    datasets: [{
        label: poprice['year'],
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: poprice['po'],
        tension: 0.1
    }
    // ,
    // {
    //     label: 'My secound dataset',
    //     backgroundColor: 'rgb(25, 99, 132)',
    //     borderColor: 'rgb(25, 99, 132)',
    //     data: [40, 5, 24, 19, 21, 34,0, 10, 5, 2, 20, 30 ],
    //     tension: 0.1
    // }
  ]
};


const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);