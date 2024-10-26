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
        {{-- @dump($tokens) --}}
        @isset($tokens)
            @foreach ($tokens as $name => $token )
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-indigo-600 mb-3 capitalize">{{ $name }}</p>
                        <code class="text-sm text-white bg-gray-900 p-3 rounded-lg">{!! $token !!}</code>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>

</section>
