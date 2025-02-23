let stream;
    
// Get the user's camera feed
async function startCamera() {
    stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
    document.getElementById('liveVideo').srcObject = stream;
}

document.getElementById('startLive').addEventListener('click', async () => {
    const platform = document.getElementById('platformSelect').value;

    // Send stream request to backend
    const response = await fetch('/start-stream', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ platform })
    });

    const data = await response.json();
    alert(data.message);
});

document.addEventListener("DOMContentLoaded", function () {
    AOS.init();
});

startCamera(); // Start camera on page load