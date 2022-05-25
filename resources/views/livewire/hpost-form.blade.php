<div>
    <h4 class="mb-4 text-2xl font-bold">Post</h4>
    @if(session()->has('message'))
        <div class="
            px-4
            py-4
            text-white text-green-800
            bg-green-200
            border-l-4 border-green-900
            rounded
        ">
            {{ session('message') }}
        </div>
    @endif
    <div>
        <div class="container mx-auto">
            <form method="POST" wire:submit.prevent="storePost">
                @csrf
                <div>
                    <label for="start">Title</label>
                    <input type="date" wire:model.lazy="start" class="w-full py-2 rounded" />

                </div>
                <div class="mt-8">
                    <label class="block mb-2 text-xl">Description </label>
                    <input type="date" wire:model.lazy="end" rows="3" cols="20" class="w-full rounded" />

                </div>
                <div class="flex">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit" class="
                                inline-flex
                                items-center
                                px-4
                                py-2
                                text-base
                                font-medium
                                leading-6
                                text-white
                                transition
                                duration-150
                                ease-in-out
                                bg-blue-600
                                border border-transparent
                                rounded-md
                                hover:bg-blue-500
                                focus:border-blue-700
                                active:bg-blue-700
                            ">

                            <svg wire:loading wire:target="storePost" class="
                                    w-5
                                    h-5
                                    mr-3
                                    -ml-1
                                    text-white
                                    animate-spin
                                " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Submit
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
