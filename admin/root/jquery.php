<script src="./vendor/global/global.min.js"></script>
<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
<script src="./vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<!-- Apex Chart -->
<script src="./vendor/apexchart/apexchart.js"></script>
<script src="./vendor/nouislider/nouislider.min.js"></script>
<script src="./vendor/wnumb/wNumb.js"></script>

<!-- Dashboard 1 -->
<script src="./js/dashboard/dashboard-1.js"></script>

<script src="./js/custom.min.js"></script>
<script src="./js/dlabnav-init.js"></script>
<script src="./js/demo.js"></script>
<script src="./js/styleSwitcher.js"></script>

<script src="./js/main.js"></script>

<script>
    // Lấy tham chiếu đến canvas biểu đồ
    var ctx = document.getElementById('lineChart').getContext('2d');

    // Tạo biểu đồ đường
    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($ngay); ?>,
            datasets: [{
                label: 'Giá trị',
                data: <?php echo json_encode($giaTri); ?>,
                borderColor: 'blue',
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    var ctx2 = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($thang); ?>,
            datasets: [{
                label: 'Rate',
                data: <?php echo json_encode($giaTri); ?>,
                backgroundColor: 'rgb(135, 0, 255)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 12
                }
            }
        }
    });
</script>
