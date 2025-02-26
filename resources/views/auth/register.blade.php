<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFlow - Inscription</title>
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

        #ff {
            color: #4fd1c5;

        }

        .border-accent {
            border-color: #4fd1c5;
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

        .role-card {
            transition: all 0.3s ease;
        }

        .role-card:hover {
            transform: translateY(-5px);
        }

        .role-radio:checked+.role-card {
            border-color: #4fd1c5;
            background-color: rgba(79, 209, 197, 0.1);
        }

        @keyframes errorAppear {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-error-appear {
            animation: errorAppear 0.3s ease forwards;
        }
    </style>
</head>

<body class="bg-dark-gray text-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-medium-gray rounded-lg shadow-lg p-8 w-full max-w-4xl">
        <div class="text-center mb-8">
            <div class="logo-animation inline-block">
                <i class="fas fa-bug text-accent text-5xl mb-2"></i>
                <span class="block text-3xl font-bold">Ticket<span class="text-accent">Bug</span></span>
            </div>
            <p class="text-gray-400 mt-2">Système de gestion de tickets</p>
        </div>

        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div>
                    <div class="mb-6">
                        <label class="block text-gray-400 mb-2" for="first-name">Prénom</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                            <input type="text" name="frst_name" id="first-name"
                                class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-3 w-full border border-gray-700 input-focus focus:outline-none"
                                placeholder="Votre prénom">
                            @error('frst_name')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-6">
                        <label class="block text-gray-400 mb-2" for="email">Adresse e-mail</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-500"></i>
                            </div>
                            <input type="email" name="email" id="email"
                                class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-3 w-full border border-gray-700 input-focus focus:outline-none"
                                placeholder="votre@email.com">
                            @error('email')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-400 mb-2" for="password">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-500"></i>
                            </div>
                            <input type="password" name="password" id="password"
                                class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-3 w-full border border-gray-700 input-focus focus:outline-none"
                                placeholder="••••••••">
                            @error('password')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <div class="mb-6">
                        <label class="block text-gray-400 mb-2" for="last-name">Nom</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                            <input type="text" name="last_name" id="last-name"
                                class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-3 w-full border border-gray-700 input-focus focus:outline-none"
                                placeholder="Votre nom">
                            @error('last_name')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-400 mb-2" for="phone">Téléphone</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-500"></i>
                            </div>
                            <input type="tel" name="phone" id="phone"
                                class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-3 w-full border border-gray-700 input-focus focus:outline-none"
                                placeholder="Votre numéro">
                            @error('phone')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-400 mb-2" for="confirm-password">Confirmer le mot de
                            passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-500"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="confirm-password"
                                class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-3 w-full border border-gray-700 input-focus focus:outline-none"
                                placeholder="••••••••">
                            @error('password')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role Selection -->
            <div class="mb-6">
                <label class="block text-gray-400 mb-2">Sélectionnez votre rôle</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Client Role -->
                    <div class="relative">
                        <input type="radio" id="role-client" name="role" value="3"
                            class="sr-only role-radio">
                        <label for="role-client"
                            class="role-card block cursor-pointer bg-gray-800 border border-gray-700 rounded-lg p-4 text-center hover:bg-gray-700">
                            <i class="fas fa-user-tie text-accent text-3xl mb-2"></i>
                            <div class="font-medium text-white">Client</div>
                            <div class="text-sm text-gray-400">Créer et suivre des tickets</div>
                        </label>
                        @error('role')
                            <span
                                class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Developer Role -->
                    <div class="relative">
                        <input type="radio" id="role-developer" name="role" value="2"
                            class="sr-only role-radio">
                        <label for="role-developer"
                            class="role-card block cursor-pointer bg-gray-800 border border-gray-700 rounded-lg p-4 text-center hover:bg-gray-700">
                            <i class="fas fa-code text-accent text-3xl mb-2"></i>
                            <div class="font-medium text-white">Développeur</div>
                            <div class="text-sm text-gray-400">Résoudre les tickets assignés</div>
                            @error('role')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                    </div>

                    <!-- Admin Role -->
                    <div class="relative">
                        <input type="radio" id="role-admin" name="role" value="1"
                            class="sr-only role-radio">
                        <label for="role-admin"
                            class="role-card block cursor-pointer bg-gray-800 border border-gray-700 rounded-lg p-4 text-center hover:bg-gray-700">
                            <i class="fas fa-user-shield text-accent text-3xl mb-2"></i>
                            <div class="font-medium text-white">Administrateur</div>
                            <div class="text-sm text-gray-400">Gérer les tickets et utilisateurs</div>
                            @error('role')
                                <span
                                    class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 opacity-0 transform translate-y-2 animate-error-appear flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                    </div>
                </div>
            </div>

            <!-- Terms and Submit -->
            <div class="flex items-center mb-6">
                <input type="checkbox" id="terms"
                    class="rounded bg-gray-800 border-gray-700 text-accent focus:ring-accent">
                <label for="terms" class="ml-2 text-gray-400">J'accepte les <a href="#"
                        class="text-accent hover:underline">conditions d'utilisation</a></label>
            </div>

            <button type="submit"
                class="w-full bg-gray-500 hover:bg-opacity-90 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                S'inscrire
            </button>
        </form>

        <div class="mt-6 text-center text-gray-400">
            <p>Vous avez déjà un compte? <a href="{{ route('login') }}" class="text-accent hover:underline">Se
                    connecter</a></p>
        </div>
    </div>

    <script>
        // Animation pour les icônes
        document.addEventListener('DOMContentLoaded', function() {
            const icon = document.querySelector('.fa-bug');

            setInterval(() => {
                icon.classList.add('fa-spin');
                setTimeout(() => {
                    icon.classList.remove('fa-spin');
                }, 1000);
            }, 5000);

            // Highlight selected role
            const roleRadios = document.querySelectorAll('.role-radio');
            roleRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelectorAll('.role-card').forEach(card => {
                        card.classList.remove('border-accent', 'bg-opacity-10');
                    });
                    if (this.checked) {
                        this.nextElementSibling.classList.add('border-accent', 'bg-opacity-10');
                    }
                });
            });
        });
    </script>
</body>

</html>
