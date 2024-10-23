// ************************************************** //
// >             FETCH LATEST DATA                  < // 
// ************************************************** //
let intervalID;

function fetchLatestData(params, updateFunction, interval = 5000) {
    function fetchData() {
        let url = `/api/get-latest-data`;
        const queryParams = new URLSearchParams(params).toString();
        url += `?${queryParams}`;

        window.fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data && data.data) {
                    // window.allRooms = data.data;
                    // if (window.isSearching || isFilterActive()) {
                    //     applyFilters(); // This will update the filtered results
                    // } else {
                        updateFunction(data.data);
                    // }
                } else {
                    console.warn('No data in response or data is null.');
                }
            })
            .catch(error => {
                console.error('Error fetching latest data:', error);
            });
    }

    fetchData(); // Initial fetch
    intervalID = setInterval(fetchData, interval); // Fetch every 'interval' milliseconds
}


