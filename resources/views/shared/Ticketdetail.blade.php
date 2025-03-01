

@section('contents')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Détails du ticket #{{ $ticket->id }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('Ticket.index') }}" class="px-4 py-2 border border-gray-700 rounded-lg text-gray-400 hover:bg-gray-800 transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
            @if($ticket->status !== 'Résolu')
                <a href="{{ route('Ticket.edit', $ticket->id) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                    <i class="fas fa-edit mr-2"></i>Modifier
                </a>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Ticket Information -->
        <div class="lg:col-span-2">
            <div class="bg-medium-gray rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-xl font-bold">{{ $ticket->title }}</h2>
                </div>

                <div class="p-4 space-y-4">
                    <div class="flex flex-wrap gap-4">
                        <div class="px-3 py-1 rounded-full
                            @if($ticket->priority == 'Haute') bg-red-500 bg-opacity-20 text-red-300
                            @elseif($ticket->priority == 'Moyenne') bg-orange-500 bg-opacity-20 text-orange-300
                            @else bg-green-500 bg-opacity-20 text-green-300 @endif">
                            Priorité: {{ $ticket->priority }}
                        </div>

                        <div class="px-3 py-1 rounded-full
                            @if($ticket->status == 'En cours') bg-yellow-500 bg-opacity-20 text-yellow-300
                            @elseif($ticket->status == 'En attente') bg-blue-500 bg-opacity-20 text-blue-300
                            @else bg-green-500 bg-opacity-20 text-green-300 @endif">
                            Statut: {{ $ticket->status ?? 'Nouveau' }}
                        </div>

                        <div class="px-3 py-1 rounded-full bg-gray-700 text-gray-300">
                            <div class="flex items-center">
                                <i class="
                                    @if($ticket->os == 'Windows') fab fa-windows
                                    @elseif($ticket->os == 'MacOS') fab fa-apple
                                    @else fab fa-linux @endif
                                    mr-2"></i>
                                <span>{{ $ticket->os }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Description</h3>
                        <div class="bg-gray-800 rounded-lg p-4 text-gray-300">
                            {{ $ticket->description }}
                        </div>
                    </div>

                    <!-- Image Section -->
                    @if($ticket->image)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Image jointe</h3>
                        <div class="bg-gray-800 rounded-lg p-4">
                            <img src="{{ asset('storage/' . $ticket->image) }}" alt="Image du ticket" class="max-w-full max-h-96 rounded-lg mx-auto">
                            <div class="mt-2 flex justify-center">
                                <a href="{{ asset('storage/' . $ticket->image) }}" target="_blank" class="text-accent hover:text-white transition duration-200">
                                    <i class="fas fa-external-link-alt mr-1"></i>Voir en plein écran
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="flex justify-between items-center text-sm text-gray-400 mt-4">
                        <div>
                            <i class="far fa-calendar-alt mr-1"></i>Créé le {{ $ticket->created_at->format('d M Y à H:i') }}
                        </div>
                        <div>
                            <i class="far fa-user mr-1"></i>Par {{ $ticket->client->name ?? 'Utilisateur' }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!-- Responses Section -->
            <div class="bg-medium-gray rounded-lg shadow-lg overflow-hidden mt-6">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-xl font-bold">Réponses</h2>
                </div>

                @if(isset($ticket->responses) && count($ticket->responses) > 0)
                    <div class="divide-y divide-gray-700">
                        @foreach($ticket->responses as $response)
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div class="flex items-start">
                                    <div class="bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center text-white mr-3">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">{{ $response->user->name }}</div>
                                        <div class="text-sm text-gray-400">{{ $response->created_at->format('d M Y à H:i') }}</div>
                                    </div>
                                </div>
                                <div>
                                    <span class="px-2 py-1 text-xs rounded-full bg-gray-700 text-gray-300">
                                        {{ $response->user->role ?? 'Support' }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-3 ml-13 bg-gray-800 rounded-lg p-4 text-gray-300">
                                {{ $response->content }}
                            </div>

                            @if($response->image)
                            <div class="mt-3 ml-13">
                                <img src="{{ asset('storage/' . $response->image) }}" alt="Image de réponse" class="max-w-full max-h-64 rounded-lg">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-6 text-center text-gray-400">
                        <i class="far fa-comment-dots text-4xl mb-2"></i>
                        <p>Aucune réponse pour le moment</p>
                    </div>
                @endif

                <!-- Reply Form -->
                <div class="p-4 border-t border-gray-700">
                    <form action="{{ route('Ticket.reponsestore', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-400 mb-2" for="responseContent">Votre réponse</label>
                            <textarea id="responseContent" name="content" rows="4" class="bg-gray-800 text-white rounded-lg px-4 py-2 w-full border border-gray-700 input-focus focus:outline-none" placeholder="Tapez votre réponse ici..."></textarea>
                        </div>

                        <!-- Image Upload for Response -->
                        <div class="mb-4">
                            <label class="block text-gray-400 mb-2" for="responseImage">Joindre une image (optionnel)</label>
                            <div class="flex items-center space-x-4">
                                <div class="relative w-full">
                                    <input type="file" name="image" id="responseImage" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div class="bg-gray-800 text-gray-400 border border-gray-700 rounded-lg px-4 py-2 w-full flex items-center justify-between">
                                        <span id="responseFileNameDisplay">Aucun fichier sélectionné</span>
                                        <button type="button" class="bg-gray-700 hover:bg-gray-600 text-white rounded px-4 py-1 text-sm">Parcourir</button>
                                    </div>
                                </div>
                                <button type="button" id="removeResponseImage" class="hidden px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div id="responseImagePreviewContainer" class="hidden mt-3">
                                <img id="responseImagePreview" src="#" alt="Aperçu de l'image" class="max-h-48 rounded-lg border border-gray-700">
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-accent hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                <i class="fas fa-paper-plane mr-2"></i>Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Ticket Info Card -->
            <div class="bg-medium-gray rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-lg font-bold">Informations</h2>
                </div>
                <div class="p-4">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Logiciel :</span>
                            <span>{{ $ticket->software->name ?? 'Non spécifié' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Dernière mise à jour :</span>
                            <span>{{ $ticket->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Temps d'attente :</span>
                            <span>{{ $ticket->created_at->diffForHumans(null, true) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="bg-medium-gray rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-lg font-bold">Actions</h2>
                </div>
                <div class="p-4">
                    <div class="space-y-3">
                        @if($ticket->status !== 'Résolu')
                        <a href="{{ route('Ticket.edit', $ticket->id) }}" class="block w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded text-center transition duration-200">
                            <i class="fas fa-edit mr-2"></i>Modifier
                        </a>
                        @endif

                        @if($ticket->status !== 'Résolu')
                        <button onclick="changeStatus('Résolu')" class="block w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white rounded text-center transition duration-200">
                            <i class="fas fa-check-circle mr-2"></i>Marquer comme résolu
                        </button>
                        @else
                        <button onclick="changeStatus('En cours')" class="block w-full py-2 px-4 bg-yellow-600 hover:bg-yellow-700 text-white rounded text-center transition duration-200">
                            <i class="fas fa-redo mr-2"></i>Réouvrir
                        </button>
                        @endif

                        <form id="deleteForm" action="{{ route('Ticket.delete', $ticket->id) }}" method="POST" class="block">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete()" class="block w-full py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded text-center transition duration-200">
                                <i class="fas fa-trash-alt mr-2"></i>Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status change form (hidden) -->
<form id="statusForm" action="{{ route('Ticket.update', $ticket->id) }}" method="POST" class="hidden">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" id="statusInput">
    <input type="hidden" name="title" value="{{ $ticket->title }}">
    <input type="hidden" name="description" value="{{ $ticket->description }}">
    <input type="hidden" name="priority" value="{{ $ticket->priority }}">
    <input type="hidden" name="soft_id" value="{{ $ticket->soft_id }}">
    <input type="hidden" name="os" value="{{ $ticket->os }}">
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Response image preview
        const responseFileInput = document.getElementById('responseImage');
        const responseFileNameDisplay = document.getElementById('responseFileNameDisplay');
        const responseImagePreview = document.getElementById('responseImagePreview');
        const responseImagePreviewContainer = document.getElementById('responseImagePreviewContainer');
        const removeResponseImageBtn = document.getElementById('removeResponseImage');

        responseFileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                responseFileNameDisplay.textContent = fileName;

                const reader = new FileReader();
                reader.onload = function(e) {
                    responseImagePreview.src = e.target.result;
                    responseImagePreviewContainer.classList.remove('hidden');
                    removeResponseImageBtn.classList.remove('hidden');
                }
                reader.readAsDataURL(this.files[0]);
            } else {
                resetResponseFileInput();
            }
        });

        removeResponseImageBtn.addEventListener('click', function() {
            resetResponseFileInput();
        });

        function resetResponseFileInput() {
            responseFileInput.value = '';
            responseFileNameDisplay.textContent = 'Aucun fichier sélectionné';
            responseImagePreviewContainer.classList.add('hidden');
            removeResponseImageBtn.classList.add('hidden');
        }
    });

    function changeStatus(status) {
        document.getElementById('statusInput').value = status;
        document.getElementById('statusForm').submit();
    }

    function confirmDelete() {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce ticket? Cette action est irréversible.')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endsection
