<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Vos tickets</h1>
        <a href="{{ route('Ticket.form') }}" class="bg-accent hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-plus mr-2"></i>Nouveau ticket
        </a>
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
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">OS</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Image</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($tickets as $ticket)
                    <tr class="hover:bg-gray-800">
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div>
                                <div class="font-medium">#TK-{{ str_pad($ticket->id, 3, '0', STR_PAD_LEFT) }} - {{ Str::limit($ticket->title, 30) }}</div>
                                <div class="text-sm text-gray-400">{{ Str::limit($ticket->description, 50) }}</div>
                            </div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full
                                @if($ticket->status == 'En cours') bg-yellow-500 bg-opacity-20 text-yellow-300
                                @elseif($ticket->status == 'En attente') bg-blue-500 bg-opacity-20 text-blue-300
                                @elseif($ticket->status == 'Résolu') bg-green-500 bg-opacity-20 text-green-300
                                @else bg-purple-500 bg-opacity-20 text-purple-300 @endif">
                                {{ $ticket->status ?? 'Nouveau' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full
                                @if($ticket->priority == 'Haute') bg-red-500 bg-opacity-20 text-red-300
                                @elseif($ticket->priority == 'Moyenne') bg-yellow-500 bg-opacity-20 text-orange-300
                                @else bg-green-500 bg-opacity-20 text-green-300 @endif">
                                {{ $ticket->priority }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <i class="
                                    @if($ticket->os == 'Windows') fab fa-windows
                                    @elseif($ticket->os == 'MacOS') fab fa-apple
                                    @else fab fa-linux @endif
                                    mr-2"></i>
                                <span>{{ $ticket->os }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                            {{ $ticket->created_at->format('d M Y') }}
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            @if($ticket->image)
                                <div class="w-10 h-10 relative group">
                                    <img src="{{ asset('storage/' . $ticket->image) }}" alt="Aperçu" class="w-10 h-10 object-cover rounded-md cursor-pointer">
                                    <div class="hidden group-hover:block absolute -top-1 -right-1">
                                        <a href="{{ asset('storage/' . $ticket->image) }}" target="_blank" class="bg-gray-800 p-1 rounded-full text-accent hover:text-white">
                                            <i class="fas fa-search-plus text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-500">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                            <a href="{{ route('Ticket.show', $ticket->id) }}" class="text-accent hover:text-white transition duration-200 mr-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($ticket->status !== 'Résolu')
                            <a href="{{ route('Ticket.edit', $ticket->id) }}" class="text-accent hover:text-white transition duration-200 mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endif
                            <button onclick="confirmDelete({{ $ticket->id }})" class="text-red-500 hover:text-red-400 transition duration-200">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $ticket->id }}" action="{{ route('Ticket.delete', $ticket->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-400">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-ticket-alt text-4xl mb-2"></i>
                                <p>Vous n'avez pas encore créé de tickets.</p>
                                <a href="{{ route('Ticket.form') }}" class="mt-3 bg-accent hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                    Créer votre premier ticket
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($tickets) && $tickets->count() > 0 && $tickets->hasPages())
        <div class="p-4 border-t border-gray-700 flex justify-between">
            <span class="text-sm text-gray-400">
                Affichage de {{ $tickets->firstItem() }} à {{ $tickets->lastItem() }} sur {{ $tickets->total() }} tickets
            </span>
            <div class="flex space-x-1">
                {{ $tickets->links('pagination::tailwind') }}
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce ticket? Cette action est irréversible.')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
