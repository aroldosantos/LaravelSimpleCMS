<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight rounded">
            {{ __("Posts") }}
        </h2>
        <nav class="flex items-center text-sm font-medium mt-1">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                Início
            </a>
            <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="{{ route('posts') }}" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                {{ 'Posts' }}
            </a>
            <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="{{ route('posts') }}" class="font-bold text-yellow-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                {{ 'Criar um novo post' }}
            </a>
        </nav>
    </x-slot>

    <div class="max-w-7xl mx-auto py-2 sm:px-6 ">

        <div class="px-4 py-6 sm:px-0">
            <div class="px-6">


                <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-9">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Cadastrar um novo post
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Nesta área você pode cadastrar um novo post no sistema
                        </p>
                    </div>

                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                                <dt class="text-sm font-medium text-gray-700">
                                    <p class="font-bold">Formulário</p>
                                    <p class="text-sm text-gray-600">Preencha os dados do post.</p>
                                </dt>

                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                    <div>
                                        @if (session()->has('status'))
                                        <div id="message" class="bg-green-100 text-green-900 p-2 mb-3 text-center">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                        
                                        @if (count($errors) > 0)
                                            <div class="rounded-md text-center w-full bg-red-100 py-2 mb-4">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="px-0">
                                        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <div class=" -space-y-px">
                                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                                <div>
                                                    <label for="titulo" class="sr-only">Título</label>
                                                    <input name="titulo" id="titulo" type="text" value="{{old('titulo')}}"
                                                        class="appearance-none rounded-t-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10  sm:text-sm"
                                                        placeholder="Título do Post" autofocus>
                                                  
                                                </div>
                                                <div>
                                                    <label for="resumo" class="sr-only">Resumo</label>
                                                    <textarea id="resumo" name="resumo" cols="30" rows="3"
                                                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm"
                                                        placeholder="Resumo do texto">{{old('resumo')}}</textarea>                                                
                                                </div>                                                
                                                <div>                                                                  
                                                   <textarea id="conteudo" name="conteudo">{{old('conteudo')}}</textarea>
                                                </div>
                                                <div>
                                                    <label for="categoria_id" class="sr-only">Categoria do post</label>
                                                    <select id="categoria_id" name="categoria_id"
                                                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm">
                                                        <option value="">Categoria do post</option>
                                                        @foreach ($categorias as $categoria)
                                                            <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                                                                {{ $categoria->categoria}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="status" class="sr-only">Status</label>
                                                    <select id="status" name="status"
                                                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm">
                                                        <option value="">Status</option>
                                                        <option value="Rascunho" @selected(old('status') == 'Rascunho')>Rascunho</option>
                                                        <option value="Publicado" @selected(old('status') == 'Publicado')>Publicado</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="py-5 mb-3">
                                                    <label for="image" class=" py-3 block "> 
                                                        <i class="fas fa-camera"></i> IMAGEM DESTACADA (Tamanho máximo: 2MB) 
                                                    </label>
                                                    <input id="image" name="image" type="file"
                                                        class="block w-full text-gray-900 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm"
                                                        >
                                                </div>
                                                
                                            </div>
                                            <div class="mt-5">
                                                <button  type="submit"
                                                        class=" w-auto flex justify-center py-2 px-4 border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    Criar post
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </dd>
                            </div>

                        </dl>
                    </div>
                </div>


            </div>


        </div>


        <!-- /End replace -->
    </div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('conteudo');  
    </script>
@endpush
</x-app-layout>

