// ************************************************** //
// >             FETCH LATEST DATA                  < // 
// ************************************************** //
let intervalID;
const loadingOverlay = `
    <div class="z-50 w-full h-full flex items-center justify-center justify-self-center">
        <img src="assets/images/icons/Zealia_Logo_Flat/BLUE/DARK-1/Reversed_Star_Flat_BLUEDARK_1.png" alt="loading" class="animate-spin h-32 w-32">
    </div>
`;

function fetchLatestData(params, updateFunction, interval = 5000, id = null) {
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
                    updateFunction(data.data);
                } else {
                    console.warn('No data in response or data is null.');
                }
            })
            .catch(error => {
                console.error('Error fetching latest data:', error);
            })
    }

    fetchData(); // Initial fetch
    intervalID = setInterval(fetchData, interval); // Fetch every 'interval' milliseconds
}


