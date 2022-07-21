<div class="p-4">
    <div class="card">
        <div class="card-body">
            <button class="btn btn-info" id="btn-download">
                Download
            </button>
            <div>
                <canvas id="myChart" width="100" height="30"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    const labels = [
        'Nombre de ressources crées',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Nombre de ressources',
            backgroundColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: <?= json_encode($ressource_avec_id) ?>,
        }],


    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    var image = myChart.toBase64Image();
    console.log(image);

    document.getElementById('btn-download').onclick = function() {
            // Trigger the download
            var a = document.createElement('a');
            a.href = myChart.toBase64Image();
            a.download = 'my_file_name.png';
            a.click();
    }
</script>