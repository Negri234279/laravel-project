<x-layout>
    <div
        class="w-full mx-auto max-w-lg bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                Sign up to your account
            </h1>
            <form
                class="space-y-4 md:space-y-6"
                method="POST"
                action="{{ route('register.custom') }}"
            >
                @csrf
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Your name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name"
                    >
                    @if ($errors->has('name'))
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Your email
                    </label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@company.com"
                    >
                    @if ($errors->has('email'))
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        value="{{ old('password') }}"
                        id="password"
                        placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                    @if ($errors->has('password'))
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                id="remember"
                                aria-describedby="remember"
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <p class="mt-2 text-red-600 dark:text-red-400">
                        {{ session('success') }}
                    </p>
                @endif
                <button
                    type="submit"
                    class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                >
                    Sign up
                </button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Have an account yet?
                    <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>
