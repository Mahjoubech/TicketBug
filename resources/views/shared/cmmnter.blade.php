
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

