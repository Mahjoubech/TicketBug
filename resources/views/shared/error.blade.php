@if (session()->has('error'))
    <div id="errorAlert" class="fixed top-4 right-4 w-full max-w-md transform transition-all duration-500 ease-out bg-gradient-to-r from-gray-800 to-gray-900 text-white border-l-4 border-red-500 rounded-md shadow-lg z-50" role="alert">
        <div class="flex items-center p-4">
            <!-- Error Icon -->
            <div class="flex-shrink-0 mr-3">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <!-- Alert Content -->
            <div class="flex-grow mr-3">
                <span>{{ session('error') }}</span>
            </div>

            <!-- Close Button -->
            <button onclick="closeErrorAlert()" class="flex-shrink-0 text-gray-400 hover:text-white transition-colors focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Progress Bar -->
        <div id="errorProgressBar" class="h-1 bg-red-500 rounded-b-md" style="width: 100%;"></div>
    </div>

    <script>
        // Duration for the alert to display (in milliseconds)
        const errorAlertDuration = 5000;
        let errorAlertTimeout;
        let errorProgressInterval;

        // Elements
        const errorAlert = document.getElementById('errorAlert');
        const errorProgressBar = document.getElementById('errorProgressBar');

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            startErrorAlertTimer();
        });

        // Start the timer for auto-dismissal
        function startErrorAlertTimer() {
            // Clear any existing timeouts
            clearTimeout(errorAlertTimeout);
            clearInterval(errorProgressInterval);

            // Reset progress bar
            errorProgressBar.style.width = '100%';

            // Set timeout to hide the alert
            errorAlertTimeout = setTimeout(() => {
                closeErrorAlert();
            }, errorAlertDuration);

            // Animate progress bar
            const startTime = Date.now();
            errorProgressInterval = setInterval(() => {
                const elapsedTime = Date.now() - startTime;
                const remainingPercentage = 100 - (elapsedTime / errorAlertDuration * 100);

                if (remainingPercentage <= 0) {
                    clearInterval(errorProgressInterval);
                    errorProgressBar.style.width = '0%';
                } else {
                    errorProgressBar.style.width = remainingPercentage + '%';
                }
            }, 50);
        }

        // Function to hide the alert
        function closeErrorAlert() {
            errorAlert.classList.add('opacity-0', '-translate-y-1');

            // After animation completes, hide the element
            setTimeout(() => {
                errorAlert.remove();
            }, 500);

            clearInterval(errorProgressInterval);
            clearTimeout(errorAlertTimeout);
        }
    </script>
@endif
