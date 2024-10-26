<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Access Token') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Find the permissions to use the Rest API here.') }}
        </p>
    </header>
    <div class="mt-6 space-y-6">
    @dump($user->tokens)

    </div>

</section>
