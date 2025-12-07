// les cours
fetch("./dataJsonForGraphe/coursJson.php")
    .then(response => response.json())
    .then(data => {

        const labels = data.map(ele => ele.catégorie);

        const values = data.map(ele => ele.total);

        new Chart(document.getElementById("myChart"), {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Nombre de cours par categorie",
                    data: values,
                    backgroundColor: "rgb(12 83 200)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks:{
                            stepSize:1
                        }
                     }
                }
            }
        });
    });

// les equipement selon type

fetch('./dataJsonForGraphe/EquipementsJson.php').then(res=>res.json()).then(data=>{
    const labelEqui=data.map(ele=>ele.typeEqui);
    const valuesEqui=data.map(ele=>ele.total);

    new Chart(document.getElementById("myChartEquipement"),{
        type:'bar',
        data:{
            labels:labelEqui,
            datasets:[
                {
                    label:"Nombre de Equipement par type",
                    data:valuesEqui,
                    backgroundColor:"rgb(12 83 200)",
                    borderColor:"rgba(75, 192, 192, 1)",
                    borderWidth:1,
                }]
        },
        options:{
            response:true,
            scales:{
                y:{
                    beginAtZero:true,
                    ticks:{
                        stepSize:1
                    }
                }
            }
        }
    }

    )
})