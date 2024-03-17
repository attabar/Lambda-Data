document.addEventListener('DOMContentLoaded', function () {
    // Sample data (replace with your actual data)
    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'August'];
    const data = [50, 80, 60, 120, 100, 140, 160];

    // Create a line chart
    const ctx = document.getElementById('transactionChart').getContext('2d');
    const transactionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Transaction Volumes',
                data: data,
                borderColor: '#3498db',
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                borderWidth: 2,
                pointRadius: 5,
                pointBackgroundColor: '#3498db',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: [{
                    grid: {
                        display: false,
                    }
                }],
                y: [{
                    ticks: {
                        beginAtZero: true,
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)',
                    }
                }]
            },
        }
    });
});
