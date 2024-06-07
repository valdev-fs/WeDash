document.addEventListener('DOMContentLoaded', function() {
    const totalViewsElement = document.getElementById('totalViews');
    const userViewsTableBody = document.getElementById('userViews').querySelector('tbody');
    const reportDetailsTableBody = document.getElementById('reportDetails').querySelector('tbody');
    const reportViewsChartCtx = document.getElementById('reportViewsChart').getContext('2d');
    let reportViewsChart; // Declare a variable to hold the chart instance

    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const filterButton = document.getElementById('filterButton');

    startDateInput.addEventListener('change', function() {
        endDateInput.min = startDateInput.value;
    });

    endDateInput.addEventListener('change', function() {
        if (endDateInput.value < startDateInput.value) {
            endDateInput.value = startDateInput.value;
        }
    });

    filterButton.addEventListener('click', function() {
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;
        fetchReportMonitoringData(startDate, endDate);
    });

    function fetchReportMonitoringData(startDate = '', endDate = '') {
        const url = `/report-monitoring-data?start_date=${startDate}&end_date=${endDate}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                updateTotalViews(data.totalViews);
                populateUserViewsTable(data.userViews);
                populateReportDetailsTable(data.reportDetails);
                renderReportViewsChart(data.dailyReportViews);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function updateTotalViews(totalViews) {
        totalViewsElement.textContent = totalViews;
    }

    function populateUserViewsTable(userViews) {
        userViewsTableBody.innerHTML = '';
        userViews.forEach(userView => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${userView.userAccount || ''}</td>
                <td>${userView.reportOpens || ''}</td>
                <td>${userView.totalPageViews || ''}</td>
            `;
            row.addEventListener('click', () => {
                showUserDetailModal(userView.userAccount);
            });
            userViewsTableBody.appendChild(row);
        });
    }

    function populateReportDetailsTable(reportDetails) {
        reportDetailsTableBody.innerHTML = '';
        reportDetails.forEach(reportDetail => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${reportDetail.reportName || ''}</td>
                <td>${reportDetail.reportViews || ''}</td>
            `;
            reportDetailsTableBody.appendChild(row);
        });
    }

    function renderReportViewsChart(dailyReportViews) {
        // Destroy existing chart instance if it exists
        if (reportViewsChart) {
            reportViewsChart.destroy();
        }

        const labels = dailyReportViews.map(view => view.date);
        const data = dailyReportViews.map(view => view.count);

        reportViewsChart = new Chart(reportViewsChartCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Daily Report Views',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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
    }

    function showUserDetailModal(userId) {
        const modal = document.getElementById('userDetailModal');
        const span = modal.querySelector('.close');
        const userDetailTableBody = document.getElementById('userDetailTable').querySelector('tbody');
        const prevPageButton = document.getElementById('prevPage');
        const nextPageButton = document.getElementById('nextPage');
        const pageInfo = document.getElementById('pageInfo');

        let currentPage = 1;
        const rowsPerPage = 10;
        let userDetailData = [];

        function fetchUserDetailData(userId, page = 1) {
            fetch(`/user-detail-data/${userId}?page=${page}`)
                .then(response => response.json())
                .then(data => {
                    userDetailData = data;
                    populateUserDetailTable();
                    updatePageInfo();
                })
                .catch(error => console.error('Error fetching user detail data:', error));
        }

        function populateUserDetailTable() {
            userDetailTableBody.innerHTML = '';
            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;
            const pageData = userDetailData.slice(startIndex, endIndex);

            pageData.forEach(detail => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${detail.report}</td>
                    <td>${detail.viewed_at}</td>
                `;
                userDetailTableBody.appendChild(row);
            });
        }

        function updatePageInfo() {
            pageInfo.textContent = `Page ${currentPage} of ${Math.ceil(userDetailData.length / rowsPerPage)}`;
            prevPageButton.disabled = currentPage === 1;
            nextPageButton.disabled = currentPage === Math.ceil(userDetailData.length / rowsPerPage);
        }

        prevPageButton.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                populateUserDetailTable();
                updatePageInfo();
            }
        });

        nextPageButton.addEventListener('click', () => {
            if (currentPage < Math.ceil(userDetailData.length / rowsPerPage)) {
                currentPage++;
                populateUserDetailTable();
                updatePageInfo();
            }
        });

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        modal.style.display = "block";
        fetchUserDetailData(userId, currentPage);
    }

    // Initial data fetch
    fetchReportMonitoringData();
});
