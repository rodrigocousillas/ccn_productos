fetch("https://api.fastly.com/public-ip-list", {
    method: "GET",
    headers: {
        "Accept": "application/json"
    }
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error("Error:", error));
