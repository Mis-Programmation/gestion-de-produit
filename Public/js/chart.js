const chart = document.getElementById('chart').getContext('2d');


/**
 * permet de faire une requête vers l'api
 * @return {Promise<*>}
 */
const getAllProducts = async () => {
    try {
        return await axios.get('/api/list');
    }catch (e) {
        console.log(e)
    }
}


getAllProducts().then(response => {

    const productsData  = [];

    // récupérer les labels
    productsData['labels']  = response.data.map((item,index) => {
        return item.name
     })
    // récupérer l'stocks
    productsData['stock']  = response.data.map((item,index) => {
        return item.stock
    })

     new Chart(chart, {

        type: 'bar',
        data: {
            labels: productsData['labels'] ,
            datasets: [{
                label: '# of Votes',
                data: productsData['stock'],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        }
    });

})


