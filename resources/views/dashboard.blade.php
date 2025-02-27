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

    <!-- Sidebar -->
    <div class="bg-medium-gray md:w-64 md:sidebar md:flex-shrink-0">
        <div class="p-4 flex flex-col h-full">
            <div class="flex items-center justify-center p-4">
                <div class="logo-animation inline-block text-center">
                    <i class="fas fa-bug text-accent text-3xl mb-2"></i>
                    <span class="block text-xl font-bold">Ticket<span class="text-accent">Bug</span></span>
                </div>
            </div>
            <nav class="mt-6 flex-grow">
                <ul>
                    <li class="mb-2">
                        <a href="#" class="flex items-center py-2 px-4 rounded-lg bg-gray-800 text-white">
                            <i class="fas fa-home mr-3 text-accent"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-200">
                            <i class="fas fa-ticket-alt mr-3"></i>
                            <span>Mes tickets</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-200 relative">
                            <i class="fas fa-bell mr-3"></i>
                            <span>Notifications</span>
                            <span class="notification-badge bg-accent rounded-full text-xs text-white">3</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-200">
                            <i class="fas fa-user-circle mr-3"></i>
                            <span>Mon profil</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="mt-auto border-t border-gray-700 pt-4">
                <a href="#" class="flex items-center py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-200 text-gray-400">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Déconnexion</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex-grow p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Tableau de bord</h1>
            <div class="flex items-center">
                <div class="relative mr-4">
                    <button class="text-gray-400 hover:text-white relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="notification-badge bg-accent rounded-full text-xs text-white">3</span>
                    </button>
                </div>
                <div class="bg-medium-gray rounded-full h-10 w-10 flex items-center justify-center">
                    <span class="font-bold text-accent">JD</span>
                </div>
            </div>
        </div>

        <!-- Stats cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-medium-gray rounded-lg p-6 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-400 text-sm font-medium">Total de tickets</h3>
                        <p class="text-3xl font-bold mt-1">12</p>
                    </div>
                    <div class="bg-gray-800 p-3 rounded-lg">
                        <i class="fas fa-ticket-alt text-accent text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    <span class="text-green-400"><i class="fas fa-arrow-up mr-1"></i>8%</span>
                    <span class="text-gray-400 ml-2">depuis le mois dernier</span>
                </div>
            </div>
            <div class="bg-medium-gray rounded-lg p-6 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-400 text-sm font-medium">Tickets en cours</h3>
                        <p class="text-3xl font-bold mt-1">4</p>
                    </div>
                    <div class="bg-gray-800 p-3 rounded-lg">
                        <i class="fas fa-spinner text-accent text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    <span class="text-red-400"><i class="fas fa-arrow-down mr-1"></i>3%</span>
                    <span class="text-gray-400 ml-2">depuis le mois dernier</span>
                </div>
            </div>
            <div class="bg-medium-gray rounded-lg p-6 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-400 text-sm font-medium">Tickets résolus</h3>
                        <p class="text-3xl font-bold mt-1">8</p>
                    </div>
                    <div class="bg-gray-800 p-3 rounded-lg">
                        <i class="fas fa-check-circle text-accent text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    <span class="text-green-400"><i class="fas fa-arrow-up mr-1"></i>12%</span>
                    <span class="text-gray-400 ml-2">depuis le mois dernier</span>
                </div>
            </div>
        </div>

        <!-- New ticket button and search -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <button class="bg-accent hover:bg-opacity-90 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center mb-4 md:mb-0 w-full md:w-auto">
                <i class="fas fa-plus-circle mr-2"></i>
                Nouveau ticket
            </button>
            <div class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-500"></i>
                </div>
                <input type="text" class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-2 w-full border border-gray-700 input-focus focus:outline-none" placeholder="Rechercher un ticket...">
            </div>
        </div>

        <!-- Ticket filters -->
        <div class="bg-medium-gray rounded-lg p-4 mb-6 flex flex-wrap items-center">
            <span class="text-gray-400 mr-4">Filtrer par:</span>
            <div class="flex space-x-2 flex-wrap">
                <select class="bg-gray-800 text-white rounded-lg px-3 py-2 border border-gray-700 input-focus focus:outline-none">
                    <option>Tous les statuts</option>
                    <option>En attente</option>
                    <option>En cours</option>
                    <option>Résolu</option>
                    <option>Fermé</option>
                </select>
                <select class="bg-gray-800 text-white rounded-lg px-3 py-2 border border-gray-700 input-focus focus:outline-none">
                    <option>Toutes les priorités</option>
                    <option>Haute</option>
                    <option>Moyenne</option>
                    <option>Basse</option>
                </select>
                <select class="bg-gray-800 text-white rounded-lg px-3 py-2 border border-gray-700 input-focus focus:outline-none">
                    <option>Tous les logiciels</option>
                    <option>Windows</option>
                    <option>MacOS</option>
                    <option>Linux</option>
                </select>
                <select class="bg-gray-800 text-white rounded-lg px-3 py-2 border border-gray-700 input-focus focus:outline-none">
                    <option>Date (plus récent)</option>
                    <option>Date (plus ancien)</option>
                    <option>Priorité</option>
                </select>
            </div>
        </div>

        <!-- Recent tickets -->
        <div class="bg-medium-gray rounded-lg shadow-lg overflow-hidden">
            <div class="p-4 border-b border-gray-700">
                <h2 class="text-xl font-bold">Tickets récents</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-800">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Ticket</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Statut</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Priorité</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Logiciel</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <tr class="hover:bg-gray-800">
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div>
                                    <div class="font-medium">#TK-001 - Problème de connexion</div>
                                    <div class="text-sm text-gray-400">Impossible de se connecter à l'application</div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-500 bg-opacity-20 text-yellow-300">En cours</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-red-500 bg-opacity-20 text-red-300">Haute</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fab fa-windows mr-2"></i>
                                    <span>Windows 10</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                                24 Fév 2023
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                                <button class="text-accent hover:text-white transition duration-200 mr-2">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-accent hover:text-white transition duration-200">
                                    <i class="fas fa-comment-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-800">
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div>
                                    <div class="font-medium">#TK-002 - Erreur lors de l'impression</div>
                                    <div class="text-sm text-gray-400">L'imprimante affiche une erreur 404</div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-500 bg-opacity-20 text-blue-300">En attente</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-orange-500 bg-opacity-20 text-orange-300">Moyenne</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fab fa-apple mr-2"></i>
                                    <span>MacOS</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                                22 Fév 2023
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                                <button class="text-accent hover:text-white transition duration-200 mr-2">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-accent hover:text-white transition duration-200">
                                    <i class="fas fa-comment-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-800">
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div>
                                    <div class="font-medium">#TK-003 - Mise à jour échouée</div>
                                    <div class="text-sm text-gray-400">La mise à jour s'arrête à 80%</div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-500 bg-opacity-20 text-green-300">Résolu</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-500 bg-opacity-20 text-green-300">Basse</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fab fa-linux mr-2"></i>
                                    <span>Ubuntu 20.04</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                                18 Fév 2023
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                                <button class="text-accent hover:text-white transition duration-200 mr-2">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-accent hover:text-white transition duration-200">
                                    <i class="fas fa-comment-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-gray-700 flex justify-between">
                <span class="text-sm text-gray-400">Affichage de 1 à 3 sur 12 tickets</span>
                <div class="flex space-x-1">
                    <button class="bg-gray-800 text-white px-3 py-1 rounded disabled:opacity-50" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="bg-accent text-white px-3 py-1 rounded">1</button>
                    <button class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-700">2</button>
                    <button class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-700">3</button>
                    <button class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-700">4</button>
                    <button class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-700">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications panel (hidden by default) -->
    <div class="fixed right-0 top-0 bottom-0 w-80 bg-medium-gray shadow-lg transform translate-x-full transition-transform duration-300 z-50" id="notificationsPanel">
        <div class="p-4 border-b border-gray-700 flex justify-between items-center">
            <h3 class="text-xl font-bold">Notifications</h3>
            <button id="closeNotifications" class="text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-4 overflow-y-auto h-full">
            <div class="mb-4 p-3 bg-gray-800 rounded-lg border-l-4 border-accent">
                <div class="flex justify-between items-start">
                    <p class="font-medium">Mise à jour de statut</p>
                    <span class="text-xs text-gray-400">Il y a 10 min</span>
                </div>
                <p class="text-sm text-gray-400 mt-1">Votre ticket #TK-001 est maintenant en cours de traitement.</p>
            </div>
            <div class="mb-4 p-3 bg-gray-800 rounded-lg border-l-4 border-accent">
                <div class="flex justify-between items-start">
                    <p class="font-medium">Nouveau commentaire</p>
                    <span class="text-xs text-gray-400">Il y a 2h</span>
                </div>
                <p class="text-sm text-gray-400 mt-1">Le développeur a ajouté un commentaire sur votre ticket #TK-002.</p>
            </div>
            <div class="mb-4 p-3 bg-gray-800 rounded-lg border-l-4 border-green-500">
                <div class="flex justify-between items-start">
                    <p class="font-medium">Ticket résolu</p>
                    <span class="text-xs text-gray-400">Hier</span>
                </div>
                <p class="text-sm text-gray-400 mt-1">Votre ticket #TK-003 a été marqué comme résolu.</p>
            </div>
        </div>
    </div>

    <!-- New ticket modal (hidden by default) -->
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50" id="newTicketModal">
        <div class="bg-medium-gray rounded-lg shadow-lg p-6 w-full max-w-lg mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Créer un nouveau ticket</h3>
                <button id="closeModal" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2" for="ticketTitle">Titre</label>
                    <input type="text" id="ticketTitle" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none" placeholder="Décrivez brièvement le problème">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2" for="ticketDescription">Description</label>
                    <textarea id="ticketDescription" rows="5" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none" placeholder="Fournissez tous les détails nécessaires..."></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-400 mb-2" for="ticketPriority">Priorité</label>
                        <select id="ticketPriority" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none">
                            <option value="low">Basse</option>
                            <option value="medium">Moyenne</option>
                            <option value="high">Haute</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 mb-2" for="ticketOS">Système d'exploitation</label>
                        <select id="ticketOS" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none">
                            <option value="windows">Windows</option>
                            <option value="macos">MacOS</option>
                            <option value="linux">Linux</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-400 mb-2" for="ticketSoftware">Logiciel concerné</label>
                    <select id="ticketSoftware" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none">
                        <option value="app1">Application 1</option>
                        <option value="app2">Application 2</option>
                        <option value="app3">Application 3</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" id="cancelTicket" class="px-4 py-2 border border-gray-700 rounded-lg text-gray-400 hover:bg-gray-800 transition duration-200">
                        Annuler
                    </button>
                    <button type="submit" class="bg-accent hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Créer le ticket
                    </button>
                </div>
            </form>
        </div>
    </div>

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
