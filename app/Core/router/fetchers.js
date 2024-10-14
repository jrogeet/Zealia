// Assuming your PHP MVC structure is set up, let's focus on the JavaScript side

// 1. Form Submission
function submitForm(formId, url) {
    document.getElementById(formId).addEventListener('submit', function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        
        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response
            console.log(data);
            // Update the DOM as needed
        })
        .catch(error => console.error('Error:', error));
    });
}

// Usage: submitForm('myFormId', '/api/submit-form');

// 2. Real-time Search
function realTimeSearch(inputId, url, resultContainerId) {
    document.getElementById(inputId).addEventListener('input', function() {
        let searchTerm = this.value;
        
        fetch(`${url}?search=${searchTerm}`)
        .then(response => response.json())
        .then(data => {
            // Update the results container
            let container = document.getElementById(resultContainerId);
            container.innerHTML = ''; // Clear previous results
            data.forEach(item => {
                container.innerHTML += `<div>${item.name}</div>`;
            });
        })
        .catch(error => console.error('Error:', error));
    });
}

// Usage: realTimeSearch('searchInput', '/api/search', 'searchResults');

// 3. Live Update of Displayed Data
function liveUpdate(url, containerId, interval = 5000) {
    setInterval(() => {
        fetch(url)
        .then(response => response.json())
        .then(data => {
            // Update the container with new data
            let container = document.getElementById(containerId);
            container.innerHTML = ''; // Clear previous data
            data.forEach(item => {
                container.innerHTML += `<div>${item.content}</div>`;
            });
        })
        .catch(error => console.error('Error:', error));
    }, interval);
}

// Usage: liveUpdate('/api/get-latest-data', 'liveDataContainer');

// Additional Use Cases:

// 4. Infinite Scrolling
function infiniteScroll(url, containerId) {
    let page = 1;
    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
            loadMoreContent();
        }
    });

    function loadMoreContent() {
        fetch(`${url}?page=${page}`)
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById(containerId);
            data.forEach(item => {
                container.innerHTML += `<div>${item.content}</div>`;
            });
            page++;
        })
        .catch(error => console.error('Error:', error));
    }
}

// Usage: infiniteScroll('/api/get-more-content', 'contentContainer');

// 5. Like/Unlike Feature
function toggleLike(url, itemId) {
    fetch(`${url}/${itemId}`, { method: 'POST' })
    .then(response => response.json())
    .then(data => {
        // Update the like button or count
        console.log(data);
    })
    .catch(error => console.error('Error:', error));
}

// Usage: <button onclick="toggleLike('/api/toggle-like', 123)">Like</button>