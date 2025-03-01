<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketBug - Tableau de bord client</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <style>
    .bg-dark-gray {
    background-color: #1a1a1a;
}

.bg-medium-gray {
    background-color: #2a2a2a;
}

.text-accent {
    color: #4fd1c5;
}

.border-accent {
    border-color: #4fd1c5;
}

.bg-accent {
    background-color: #4fd1c5;
}

.logo-animation {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

.input-focus:focus {
    border-color: #4fd1c5;
    box-shadow: 0 0 0 3px rgba(79, 209, 197, 0.3);
}

.sidebar {
    height: 100vh;
    position: sticky;
    top: 0;
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    font-size: 0.7rem;
    padding: 0.2rem 0.5rem;
}

.priority-high {
    background-color: #f56565;
}

.priority-medium {
    background-color: #ed8936;
}

.priority-low {
    background-color: #48bb78;
}
   </style>

</head>
<body class="bg-dark-gray text-gray-200 min-h-screen flex flex-col md:flex-row">
@include('shared.success_mssg')

 @include('layouts.nav')
 @yield('content')
 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation pour l'icône du logo
            const icon = document.querySelector('.fa-bug');
            setInterval(() => {
                icon.classList.add('fa-spin');
                setTimeout(() => {
                    icon.classList.remove('fa-spin');
                }, 1000);
            }, 5000);

            // Gestion des notifications
            const notifButtons = document.querySelectorAll('.fa-bell');
            const notifPanel = document.getElementById('notificationsPanel');
            const closeNotifButton = document.getElementById('closeNotifications');

            notifButtons.forEach(button => {
                button.addEventListener('click', () => {
                    notifPanel.classList.toggle('translate-x-full');
                });
            });

            closeNotifButton.addEventListener('click', () => {
                notifPanel.classList.add('translate-x-full');
            });

            // Gestion du modal de création de ticket
            const newTicketButton = document.querySelector('button.bg-accent');
            const newTicketModal = document.getElementById('newTicketModal');
            const closeModalButton = document.getElementById('closeModal');
            const cancelTicketButton = document.getElementById('cancelTicket');

            newTicketButton.addEventListener('click', () => {
                newTicketModal.classList.remove('hidden');
            });

            [closeModalButton, cancelTicketButton].forEach(button => {
                button.addEventListener('click', () => {
                    newTicketModal.classList.add('hidden');
                });
            });

            // Fermer les modales en cliquant en dehors
            newTicketModal.addEventListener('click', (e) => {
                if (e.target === newTicketModal) {
                    newTicketModal.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
