<script>
    document.addEventListener('keydown', function(event) {
        
        if (event.ctrlKey && event.key.toLowerCase() === 'u') {
            event.preventDefault();
        }
        if (event.ctrlKey && event.shiftKey && (event.key.toLowerCase() === 'j' || event.key.toLowerCase() === 'i')) {
            event.preventDefault();
        }
        if (event.key === 'F12') {
            event.preventDefault();
        }
    });

    document.addEventListener('contextmenu', function(event) {
        event.preventDefault();
    });

    function detectDevTools() {
        const before = new Date().getTime();
        debugger; // DevTools làm chậm thời gian thực thi ở đây
        const after = new Date().getTime();

        if (after - before > 100) { // Kiểm tra nếu thời gian trễ lớn hơn 100ms
            alert("DevTools đang mở. Hãy đóng nó lại!");
            window.location.href = "/"; // Chuyển hướng hoặc làm gì đó
        }
    }

    setInterval(detectDevTools, 1000);
</script>
<iframe src="data:text/html;base64,{{ $base64Content }}" height="100%" width="100%"></iframe>
