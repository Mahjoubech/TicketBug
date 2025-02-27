
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFlow - Connexion</title>
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
    </style>
</head>
<body class="bg-dark-gray text-gray-200 min-h-screen flex items-center justify-center">
@include('shared.success_mssg')

    <div class="bg-medium-gray rounded-lg shadow-lg p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <div class="logo-animation inline-block">
                <i class="fas fa-bug text-accent text-5xl mb-2"></i>
                <span class="block text-3xl font-bold">Ticket<span class="text-accent">Bug</span></span>
            </div>
            <p class="text-gray-400 mt-2">Système de gestion de tickets</p>
        </div>

        <form action="{{ route('login') }}" method="post">
            @csrf

           

            <!-- Email Input -->
            <div class="mb-6">
                <label class="block text-gray-400 mb-2" for="email">Adresse e-mail</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-500"></i>
                    </div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-3 w-full border border-gray-700 input-focus focus:outline-none"
                        placeholder="votre@email.com">

                    @error('email')
                        <span class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 flex items-center">
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

            <!-- Password Input -->
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
                        <span class="absolute left-0 -bottom-6 text-xs font-medium text-red-600 flex items-center">
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

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="rounded bg-gray-800 border-gray-700 text-accent focus:ring-accent">
                    <label for="remember" class="ml-2 text-gray-400">Se souvenir de moi</label>
                </div>
                <a href="#" class="text-accent hover:underline">Mot de passe oublié?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-accent hover:bg-opacity-90 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                Se connecter
            </button>
        </form>


        <div class="mt-6 text-center text-gray-400">
            <p>Vous n'avez pas de compte? <a href="{{route('register')}}" class="text-accent hover:underline">Créer un compte</a></p>
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
        });
    </script>
</body>
</html>
