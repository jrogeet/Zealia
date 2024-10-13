async function fetchData(url, method = 'GET', data = null, isSSE = false) {
    if (isSSE) {
        return new EventSource(url, { withCredentials: true });
    }

    const options = {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
    };

    if (data) {
        options.body = JSON.stringify(data);
    }

    try {
        const response = await fetch(url, options);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const responseText = await response.text();
        try {
            return JSON.parse(responseText);
        } catch (e) {
            console.error('Server returned non-JSON response:', responseText);
            throw new Error('Server returned non-JSON response');
        }
    } catch (error) {
        console.error('Fetch Error:', error);
        throw error;
    }
}
