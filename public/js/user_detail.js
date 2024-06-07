document.addEventListener('DOMContentLoaded', function() {
    const userId = window.location.pathname.split('/').pop(); // Assuming the user ID is the last part of the URL
    const userDetailTableBody = document.getElementById('userDetailTable').querySelector('tbody');

    fetchUserDetailData(userId);

    function fetchUserDetailData(userId) {
        fetch(`/user-detail-data/${userId}`)
            .then(response => response.json())
            .then(data => {
                populateUserDetailTable(data);
            })
            .catch(error => console.error('Error fetching user detail data:', error));
    }

    function populateUserDetailTable(userDetailData) {
        userDetailTableBody.innerHTML = '';
        userDetailData.forEach(detail => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${detail.report}</td>
                <td>${detail.viewed_at}</td>
            `;
            userDetailTableBody.appendChild(row);
        });
    }
});
