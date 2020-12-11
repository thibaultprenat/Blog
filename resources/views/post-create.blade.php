@extends('layouts.app')

<body>


    <div class="mx-auto container flex items-center" id="nav">
        <div class="w-full pt-2 p-4">

            <div class="mx-auto md:p-6 md:w-1/2">
                <div class="flex flex-wrap justify-between">
                    <h1 class="text-2xl text-orange-500 hover:text-orange-500 transition duration-500 p-4">
                        <i class="fas fa-sign-in-alt fa-fw fa-lg"></i>
                        Créer un article
                    </h1>
                    <a href="{{ URL::action('PostController@index') }}"
                        class="mt-8 text-orange-400 hover:text-orange-600 transition duration-500">
                        <svg class=" w-6 h-6 inline-block align-bottom" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        Retour à la liste
                        <i class="fas fa-chevron-circle-left fa-fw"></i>
                    </a>
                </div>

                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <form action="{{ URL::action('PostController@create')}}" method='POST'>
                        @csrf
                        <div class="mb-8">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                                Titre
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="title"
                                    class="block pr-10 shadow appearance-none border-2 border-orange-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-orange-500 transition duration-500 ease-in-out"
                                    placeholder="titre" />
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                Article
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">

                                </div>
                                <TEXTAREA name="content" placeholder="Contenu"
                                    class="block pr-10 shadow appearance-none border-2 border-orange-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-orange-500 transition duration-500 ease-in-out"
                                    rows=4 cols=40></TEXTAREA>

                            </div>
                        </div>

                        <div class="mb-4 text-center">
                            <input type="submit"
                                class="transition duration-500 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                value="Créer">
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</body>

</html>