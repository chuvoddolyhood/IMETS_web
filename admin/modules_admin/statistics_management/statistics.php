<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main>
    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Số liệu kinh doanh</h1>
                <p>Quản lý thông tin tình hình tổng quát bệnh viện</p>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- CHARTS STARTS HERE -->
        <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                    <h1>Biểu đồ doanh số tháng</h1>
                    <p>IMETS</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <canvas id="myChart" width="200" height="100"></canvas>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                    <h1>Báo cáo tài chính</h1>
                    <p>Trong năm 2022</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

            <div class="charts__right__cards">
                <div class="card1">
                    <h1>Income</h1>
                    <p>$75,300</p>
                </div>

                <div class="card2">
                    <h1>Sales</h1>
                    <p>$124,200</p>
                </div>

                <div class="card3">
                    <h1>Users</h1>
                    <p>3900</p>
                </div>

                <div class="card4">
                    <h1>Orders</h1>
                    <p>1881</p>
                </div>
              </div>
            </div>
        </div>
        <!-- CHARTS ENDS HERE -->
    </div>
</main>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
                borderWidth: 1
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