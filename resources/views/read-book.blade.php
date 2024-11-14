{!! $content !!}
<script>
    document.addEventListener('keydown', function(event) {
        let key = event.key.toLowerCase() 

        if (event.ctrlKey && key === 'u') {
            event.preventDefault();
        }
        if (event.ctrlKey && event.shiftKey && (key === 'j' || key === 'i' || key === 'c')) {
            event.preventDefault();
        }
        
        if (key === 'f12') {
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

    function initIframe() {
    const iframe = document.querySelector('iframe');
    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

    // Ngăn chuột phải trong iframe
    iframeDoc.addEventListener("contextmenu", function(event) {
        event.preventDefault();
    });

    // Ngăn các phím tắt trong iframe
    iframeDoc.addEventListener("keydown", function(event) {
        if (event.ctrlKey && event.key.toLowerCase() === 'u' || 
            event.ctrlKey && event.shiftKey && (event.key.toLowerCase() === 'j' || event.key.toLowerCase() === 'i') || 
            event.key === 'F12') {
            event.preventDefault();
        }
    });
}
</script>