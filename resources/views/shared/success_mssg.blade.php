@if (session()->has('success'))
    <div id="successAlert" class="fixed top-4 right-4 w-full max-w-md transform transition-all duration-500 ease-out bg-gradient-to-r from-gray-800 to-gray-900 text-white border-l-4 border-green-500 rounded-md shadow-lg z-50" role="alert">
        <div class="flex items-center p-4">
            <!-- Success Icon -->
            <div class="flex-shrink-0 mr-3">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <!-- Alert Content -->
            <div class="flex-grow mr-3">
                <span>{{ session('success') }}</span>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlert()" class="flex-shrink-0 text-gray-400 hover:text-white transition-colors focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Progress Bar -->
        <div id="progressBar" class="h-1 bg-green-500 rounded-b-md" style="width: 100%;"></div>
    </div>

    <script>
        // Duration for the alert to display (in milliseconds)
        const alertDuration = 5000;
        let alertTimeout;
        let progressInterval;

        // Elements
        const successAlert = document.getElementById('successAlert');
        const progressBar = document.getElementById('progressBar');

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            startAlertTimer();
        });

        // Start the timer for auto-dismissal
        function startAlertTimer() {
            // Clear any existing timeouts
            clearTimeout(alertTimeout);
            clearInterval(progressInterval);

            // Reset progress bar
            progressBar.style.width = '100%';

            // Set timeout to hide the alert
            alertTimeout = setTimeout(() => {
                closeAlert();
            }, alertDuration);

            // Animate progress bar
            const startTime = Date.now();
            progressInterval = setInterval(() => {
                const elapsedTime = Date.now() - startTime;
                const remainingPercentage = 100 - (elapsedTime / alertDuration * 100);

                if (remainingPercentage <= 0) {
                    clearInterval(progressInterval);
                    progressBar.style.width = '0%';
                } else {
                    progressBar.style.width = remainingPercentage + '%';
                }
            }, 50);
        }

        // Function to hide the alert
        function closeAlert() {
            successAlert.classList.add('opacity-0', '-translate-y-1');

            // After animation completes, hide the element
            setTimeout(() => {
                successAlert.remove();
            }, 500);

            clearInterval(progressInterval);
            clearTimeout(alertTimeout);
        }
    </script>
@endif
