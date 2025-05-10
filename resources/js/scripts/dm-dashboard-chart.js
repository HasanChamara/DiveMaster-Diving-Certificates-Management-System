// Donut Chart
const donutCtx = document.getElementById('trpMonthlySalesChart').getContext('2d');
const donutChart = new Chart(donutCtx, {
    type: 'doughnut',
    data: {
        labels: ['Scuba', 'Open Dive', 'Snorkling', 'Training'],
        datasets: [{
            data: [900000, 500000, 500000, 500000],
            backgroundColor: ['#101828', '#475467', '#98A2B3', '#D0D5DD'],
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '55%',
        plugins: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    boxWidth:16,
                    padding: 16,
                    usePointStyle: true, 
                    pointStyle: 'circle', 
                    // pointStyleWidth: 15,  
                    font: {
                        size: 12,
                        family: "'DM-Sans', sans-serif"
                    }
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.label || '';
                        let value = context.raw || 0;
                        return `${label}: Rs ${value.toLocaleString()}`;
                    }
                }
            },
            datalabels: {
                color: '#fff',
                font: {
                    weight: 'bold',
                    size: 11
                },
                formatter: (value, ctx) => {
                    const sum = ctx.dataset.data.reduce((a, b) => a + b, 0);
                    const percentage = (value * 100 / sum).toFixed(1) + '%';
                    return percentage;
                },
                display: function(context) {
                    return context.dataset.data[context.dataIndex] > 200000; // Only show for segments above a threshold
                }
            }
        }
    }
});


// Bar Chart
const barCtx = document.getElementById('trpWeeklyChart').getContext('2d');

// Create gradient
const barGradient = barCtx.createLinearGradient(0, 0, 0, 300);
barGradient.addColorStop(0, '#101828');
barGradient.addColorStop(1, '#475467');

const barChart = new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Dives',
            data: [3, 2, 5, 1, 1, 0, 0],
            backgroundColor: barGradient,
            borderRadius: 4,
            barThickness: 50,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    drawBorder: false
                },
                title: {
                    display: true,
                    text: 'Dives',
                    font: {
                        size: 14
                    },
                    padding: {
                        bottom: 10
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Day',
                    font: {
                        size: 14
                    },
                    padding: {
                        top: 10
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});