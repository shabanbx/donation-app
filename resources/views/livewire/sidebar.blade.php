<div x-data="{ open: @entangle('isOpen') }" class="relative z-50">
    <!-- Toggle Button -->
    <div class="flex w-full min-h-screen items-center justify-center">
        <button @click="open = true"
            class="px-10 py-1 bg-primary text-white rounded-full hover:cursor-pointer flex space-x-2 items-center group">
            <p>Donate</p> <span>
                <svg data-bbox="12.816 12.816 174.368 174.368" xmlns="http://www.w3.org/2000/svg"
                    class="w-9 h-9 text-white fill-white group-hover:rotate-45 transition-all ease-in-out"
                    viewBox="0 0 200 200" data-type="shape">
                    <g>
                        <path
                            d="M100 12.816c-48.073 0-87.184 39.111-87.184 87.184s39.11 87.184 87.184 87.184 87.184-39.111 87.184-87.184S148.073 12.816 100 12.816zm0 168.651c-44.921 0-81.467-36.546-81.467-81.467S55.079 18.533 100 18.533 181.467 55.079 181.467 100 144.921 181.467 100 181.467z">
                        </path>
                        <path
                            d="M91.832 79.142L89.3 77.815l-2.653 5.065 2.532 1.326 25.196 13.199H72.403l.17 5.714h41.973l-24.364 14.679-2.449 1.475 2.951 4.897 2.448-1.475 33.711-20.31 4.352-2.622-4.501-2.358-34.862-18.263z">
                        </path>
                    </g>
                </svg>
            </span>
        </button>
    </div>

    <!-- Overlay / Sidebar Panel -->
    <div x-show="open" x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full" @click.away="open = false"
        class="fixed inset-y-0 left-0 w-full md:w-[45%]  md:w-[35%] bg-gray-100 shadow-lg">
        <div class="p-10 flex flex-col h-full w-full justify-center items-center">
            <!-- Close button -->
            <div class="text-primary w-full flex justify-between">
                <p class="font-primary uppercase text-lg font-semibold">Donate</p>
                <button @click="open = false" class="self-end mb-4   hover:cursor-pointer text-lg text-primary">
                    ✕
                </button>
            </div>

            <div>
                <livewire:donation-form />
            </div>


        </div>
    </div>
</div>
