 <!-- New ticket modal (hidden by default) -->
 <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50" id="newTicketModal">
    <div class="bg-medium-gray rounded-lg shadow-lg p-6 w-full max-w-lg mx-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold">Créer un nouveau ticket</h3>
            <button id="closeModal" class="text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="{{route('Ticket.create',Auth::id())}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-400 mb-2" for="ticketTitle">Titre</label>
                <input type="text" name="title" id="ticketTitle" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none" placeholder="Décrivez brièvement le problème">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-400 mb-2" for="ticketDescription">Description</label>
                <textarea id="ticketDescription" name="description" rows="5" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none" placeholder="Fournissez tous les détails nécessaires..."></textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload Section -->
            <div class="mb-4">
                <label class="block text-gray-400 mb-2" for="ticketImage">Image</label>
                <div class="flex items-center space-x-4">
                    <div class="relative w-full">
                        <input type="file" name="image" id="ticketImage" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="bg-gray-800 text-gray-400 border border-gray-700 rounded-lg px-4 py-2 w-full flex items-center justify-between">
                            <span id="fileNameDisplay">Aucun fichier sélectionné</span>
                            <button type="button" class="bg-gray-700 hover:bg-gray-600 text-white rounded px-4 py-1 text-sm">Parcourir</button>
                        </div>
                    </div>
                    <button type="button" id="removeImage" class="hidden px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Image Preview Container -->
                <div id="imagePreviewContainer" class="hidden mt-3 relative">
                    <img id="imagePreview" src="#" alt="Aperçu de l'image" class="max-h-64 rounded-lg border border-gray-700">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-400 mb-2" for="ticketPriority">Priorité</label>
                    <select id="ticketPriority" name="priority" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none">
                        <option value="Basse">Basse</option>
                        <option value="Moyenne">Moyenne</option>
                        <option value="Haute">Haute</option>
                    </select>
                    @error('priority')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-400 mb-2" for="ticketOS">Système d'exploitation</label>
                    <select id="ticketOS" name="os" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none">
                        <option value="Windows">Windows</option>
                        <option value="MacOS">MacOS</option>
                        <option value="Linux">Linux</option>
                    </select>
                    @error('os')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-400 mb-2" for="ticketSoftware">Logiciel concerné</label>
                <select id="ticketSoftware" name="soft_id" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none">
                    <option value="1">Application 1</option>
                    <option value="2">Application 2</option>
                    <option value="3">Application 3</option>
                </select>
                @error('soft_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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
