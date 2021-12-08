$(window).on("load", function () {
    var a = ["#7367F0", "#28C76F", "#EA5455", "#FF9F43", "#1E1E1E"], e = $("#line-chart"), o = (new Chart(e, {
        type: "line",
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            legend: {position: "top"},
            hover: {mode: "label"},
            scales: {
                xAxes: [{display: !0, gridLines: {color: "#dae1e7"}, scaleLabel: {display: !0}}],
                yAxes: [{display: !0, gridLines: {color: "#dae1e7"}, scaleLabel: {display: !0}}]
            },
            title: {display: !0, text: "World population per region (in millions)"}
        },
        data: {
            labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
            datasets: [{
                label: "Africa",
                data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
                borderColor: "#7367F0",
                fill: !1
            }, {
                data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
                label: "Asia",
                borderColor: "#28C76F",
                fill: !1
            }, {
                data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
                label: "Europe",
                borderColor: "#EA5455",
                fill: !1
            }, {
                data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
                label: "Latin America",
                borderColor: "#FF9F43",
                fill: !1
            }, {data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433], label: "North America", borderColor: "#1E1E1E", fill: !1}]
        }
    }), $("#bar-chart")), i = (new Chart(o, {
        type: "bar",
        options: {
            elements: {rectangle: {borderWidth: 2, borderSkipped: "left"}},
            responsive: !0,
            maintainAspectRatio: !1,
            responsiveAnimationDuration: 500,
            legend: {display: !1},
            scales: {
                xAxes: [{display: !0, gridLines: {color: "#dae1e7"}, scaleLabel: {display: !0}}],
                yAxes: [{display: !0, gridLines: {color: "#dae1e7"}, scaleLabel: {display: !0}, ticks: {stepSize: 1e3}}]
            },
            title: {display: !0, text: "Predicted world population (millions) in 2050"}
        },
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{
                label: "Population (millions)",
                data: [2478, 5267, 734, 784, 433],
                backgroundColor: a,
                borderColor: "transparent"
            }]
        }
    }), $("#horizontal-bar")), r = (new Chart(i, {
        type: "horizontalBar",
        options: {
            elements: {rectangle: {borderWidth: 2, borderSkipped: "right", borderSkipped: "top"}},
            responsive: !0,
            maintainAspectRatio: !1,
            responsiveAnimationDuration: 500,
            legend: {display: !1},
            scales: {
                xAxes: [{display: !0, gridLines: {color: "#dae1e7"}, scaleLabel: {display: !0}}],
                yAxes: [{display: !0, gridLines: {color: "#dae1e7"}, scaleLabel: {display: !0}}]
            },
            title: {display: !0, text: "Predicted world population (millions) in 2050"}
        },
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{
                label: "Population (millions)",
                data: [2478, 5267, 734, 784, 433],
                backgroundColor: a,
                borderColor: "transparent"
            }]
        }
    }), $("#simple-pie-chart")), t = (new Chart(r, {
        type: "pie",
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            responsiveAnimationDuration: 500,
            title: {display: !0, text: "Predicted world population (millions) in 2050"}
        },
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{label: "My First dataset", data: [2478, 5267, 734, 784, 433], backgroundColor: a}]
        }
    }), $("#simple-doughnut-chart")), l = (new Chart(t, {
        type: "doughnut",
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            responsiveAnimationDuration: 500,
            title: {display: !0, text: "Predicted world population (millions) in 2050"}
        },
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{label: "My First dataset", data: [2478, 5267, 734, 784, 433], backgroundColor: a}]
        }
    }), $("#radar-chart")), s = (new Chart(l, {
        type: "radar",
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            responsiveAnimationDuration: 500,
            legend: {position: "top"},
            tooltips: {
                callbacks: {
                    label: function (a, e) {
                        return e.datasets[a.datasetIndex].label + ": " + a.yLabel
                    }
                }
            },
            title: {display: !0, text: "Distribution in % of world population"},
            scale: {reverse: !1, ticks: {beginAtZero: !0, stepSize: 10}}
        },
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{
                label: "1950",
                fill: !0,
                backgroundColor: "rgba(179,181,198,0.2)",
                borderColor: "rgba(179,181,198,1)",
                pointBorderColor: "#fff",
                pointBackgroundColor: "rgba(179,181,198,1)",
                data: [8.77, 55.61, 21.69, 6.62, 6.82]
            }, {
                label: "2050",
                fill: !0,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                pointBorderColor: "#fff",
                pointBackgroundColor: "rgba(255,99,132,1)",
                data: [25.48, 54.16, 7.61, 8.06, 4.45]
            }]
        }
    }), $("#polar-chart")), n = (new Chart(s, {
        type: "polarArea",
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            responsiveAnimationDuration: 500,
            legend: {position: "top"},
            title: {display: !0, text: "Predicted world population (millions) in 2050"},
            scale: {ticks: {beginAtZero: !0, stepSize: 2e3}, reverse: !1},
            animation: {animateRotate: !1}
        },
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{label: "Population (millions)", backgroundColor: a, data: [2478, 5267, 734, 784, 433]}]
        }
    }), $("#bubble-chart")), d = (new Chart(n, {
        type: "bubble",
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            scales: {
                xAxes: [{
                    display: !0,
                    gridLines: {color: "#dae1e7"},
                    scaleLabel: {display: !0, labelString: "GDP (PPP)"}
                }],
                yAxes: [{
                    display: !0,
                    gridLines: {color: "#dae1e7"},
                    scaleLabel: {display: !0, labelString: "Happiness"},
                    ticks: {stepSize: .5}
                }]
            },
            title: {display: !0, text: "Predicted world population (millions) in 2050"}
        },
        data: {
            animation: {duration: 1e4},
            datasets: [{
                label: ["China"],
                backgroundColor: "rgba(255,221,50,0.2)",
                borderColor: "rgba(255,221,50,1)",
                data: [{x: 21269017, y: 5.245, r: 15}]
            }, {
                label: ["Denmark"],
                backgroundColor: "rgba(60,186,159,0.2)",
                borderColor: "rgba(60,186,159,1)",
                data: [{x: 258702, y: 7.526, r: 10}]
            }, {
                label: ["Germany"],
                backgroundColor: "rgba(0,0,0,0.2)",
                borderColor: "#000",
                data: [{x: 3979083, y: 6.994, r: 15}]
            }, {
                label: ["Japan"],
                backgroundColor: "rgba(193,46,12,0.2)",
                borderColor: "rgba(193,46,12,1)",
                data: [{x: 4931877, y: 5.921, r: 15}]
            }]
        }
    }), $("#scatter-chart"));
    new Chart(d, {
        type: "scatter",
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            responsiveAnimationDuration: 800,
            title: {display: !1, text: "Chart.js Scatter Chart"},
            scales: {
                xAxes: [{
                    position: "top",
                    gridLines: {color: "#f3f3f3", drawTicks: !1},
                    scaleLabel: {display: !0, labelString: "x axis"}
                }],
                yAxes: [{
                    position: "right",
                    gridLines: {color: "#f3f3f3", drawTicks: !1},
                    scaleLabel: {display: !0, labelString: "y axis"}
                }]
            }
        },
        data: {
            datasets: [{
                label: "My First dataset",
                data: [{x: 65, y: 28}, {x: 59, y: 48}, {x: 80, y: 40}, {x: 81, y: 19}, {x: 56, y: 86}, {
                    x: 55,
                    y: 27
                }, {x: 40, y: 89}],
                backgroundColor: "rgba(209,212,219,.3)",
                borderColor: "transparent",
                pointBorderColor: "#D1D4DB",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4
            }, {
                label: "My Second dataset",
                data: [{x: 45, y: 17}, {x: 25, y: 62}, {x: 16, y: 78}, {x: 36, y: 88}, {x: 67, y: 26}, {
                    x: 18,
                    y: 48
                }, {x: 76, y: 73}],
                backgroundColor: "rgba(81,117,224,.6)",
                borderColor: "transparent",
                pointBorderColor: "#5175E0",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4
            }]
        }
    })
});
