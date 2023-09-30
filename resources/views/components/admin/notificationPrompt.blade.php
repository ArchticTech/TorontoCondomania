@if (session()->has('message') && session('message') != null)
    <div id="myNotification" class="fixed-top start-50 translate-middle-x text-white text-center p-4"
        style="z-index: 2000; border-radius: 0.375rem; box-shadow: rgb(135 148 163 / 30%) 0px 0px 0.75rem 0.25rem; top: 50px;
                max-width: 450px; background-color: #5f61e69e; font-weight: bold; text-transform: capitalize; font-size: 19px;">
        <p id="message" style="margin-bottom: 0">{{ session('message') }}</p>
    </div>
    @endif
    {{-- Clear the message --}}
    {{-- @php
        session()->forget('message');
    @endphp --}}



{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const notification = document.getElementById("myNotification");

        // Function to show the notification
        function showNotification() {
            notification.style.display = "block";

            // Hide the notification after 3 seconds
            setTimeout(() => {
                notification.style.display = "none";
            }, 3000);
        }

        // Initialize the notification
        showNotification();
    });
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const notification = document.getElementById("myNotification");

        // Function to show the notification
        function showNotification() {
            notification.style.display = "block";

            // Hide the notification after 3 seconds
            setTimeout(() => {
                notification.style.display = "none";

                // Clear the session message via AJAX
                // clearSessionMessage();
            }, 2000);
        }

        // Initialize the notification
        showNotification();

        // Function to clear the session message via AJAX
        // function clearSessionMessage() {
        //     fetch('/clear-session-message', {
        //             method: 'POST',
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //                 'Content-Type': 'application/json',
        //             },
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             console.log('Session message cleared:', data);
        //         })
        //         .catch(error => {
        //             console.error('Failed to clear session message:', error);
        //         });
        // }
    });
</script>

