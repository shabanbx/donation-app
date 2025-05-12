<div x-data="{ donationType: @entangle('donationType') }" class="max-w-lg mx-auto  bg-white shadow rounded-xl">
    {{-- Step 1 --}}
    @if ($step === 1)
        <div wire:key="step-1">
            {{-- Tabs --}}
            <div class="p-4">
                <p class="font-semibold">Missionary Donation</p>
            </div>
            <div class="border-b border-gray-200"></div>
            <div class="flex justify-center items-center mt-4 w-full cursor-pointer">
                <div class="mb-6 flex w-full px-4 cursor-pointer">
                    <button wire:click.prevent="$set('donationType','one_time')"
                        class="px-4 py-2 -mb-px font-semibold border-1 border-primary w-full rounded-l cursor-pointer hover:bg-primary hover:text-white text-primary"
                        :class="donationType === 'one_time' ? ' text-white bg-primary bg-opacity-10' :
                            ' text-gray-600'">One-Time</button>
                    <button wire:click.prevent="$set('donationType','monthly')"
                        class="px-4 py-2 -mb-px font-semibold  w-full border-1 border-primary rounded-r cursor-pointer hover:bg-primary hover:text-white text-primary"
                        :class="donationType === 'monthly' ? ' text-white bg-primary bg-opacity-10' :
                            ' text-gray-600'">Monthly</button>
                </div>
            </div>
            {{-- Name & Email --}}
            <div class="grid grid-cols-2 gap-4 px-4">
                <div>
                    @error('name')
                        <span class="text-red-600 text-sm">*{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    @error('email')
                        <span class="text-red-600 text-sm">*{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4 px-4">
                <div>
                    <input wire:model.defer="name" type="text" placeholder="Donor's Name"
                        class="border border-primary rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/40 w-full" />
                </div>
                <div>
                    <input wire:model.defer="email" type="email" placeholder="Donor's Email"
                        class="border border-primary rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/40 w-full" />
                </div>
            </div>
            <div class="px-4">
                {{-- Campaign selector --}}
                <select wire:model.defer="campaign"
                    class="w-full border border-primary rounded  py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-primary/40">
                    <option value="Andrii Kuchkuda">Andrii Kuchkuda</option>
                    <option value="Annu ss">Annu ss</option>
                    <option value="Brandon Croley">Brandon Croley</option>
                    <option value="Chris Sheppler">Chris Sheppler</option>
                    <option value="Dan Johnson">Dan Johnson</option>
                    <option value="Dave and Patti Schatzmann">Dave and Patti Schatzmann</option>
                    <option value="Dephney Pukienei">Dephney Pukienei</option>
                    <option value="Dipti Test 2">Dipti Test 2</option>
                    <option value="Don Butera">Don Butera</option>
                    <option value="Edward Nye">Edward Nye</option>
                    <option value="Fakhar Zaman">Fakhar Zaman</option>
                    <option value="Fro Cro">Fro Cro</option>
                    <option value="Gayoy Cybtric">Gayoy Cybtric</option>
                    <option value="Hillary and Jeff Thompson">Hillary and Jeff Thompson</option>
                    <option value="Janell Wallace">Janell Wallace</option>
                    <option value="Joel &amp; Laci Fields">Joel &amp; Laci Fields</option>
                    <option value="Johnny &amp; Kayti Toms">Johnny &amp; Kayti Toms</option>
                    <option value="Johnny &amp; Kayti Toms">Johnny &amp; Kayti Toms</option>
                    <option value="Joyce Maiyene">Joyce Maiyene</option>
                    <option value="Julie Ann Abayan">Julie Ann Abayan</option>
                    <option value="Kamran Hussain">Kamran Hussain</option>
                    <option value="Lauren Morgan">Lauren Morgan</option>
                    <option value="Loknath Pradhan">Loknath Pradhan</option>
                    <option value="Luke Junior Kasindimi">Luke Junior Kasindimi</option>
                    <option value="Marty Vanderzanden">Marty Vanderzanden</option>
                    <option value="Mitchell Stevens">Mitchell Stevens</option>
                    <option value="NOMAN MUREED">NOMAN MUREED</option>
                    <option value="NOMAN MUREED">NOMAN MUREED</option>
                    <option value="Nicolas Wallace">Nicolas Wallace</option>
                    <option value="Nicole Summers">Nicole Summers</option>
                    <option value="Night Bright">Night Bright</option>
                    <option value="Rome and Kate Johnson">Rome and Kate Johnson</option>
                    <option value="Ronald &amp; Esther Marcotte">Ronald &amp; Esther Marcotte</option>
                    <option value="Rory and Nicole Donaldson">Rory and Nicole Donaldson</option>
                    <option value="Stephen Cahill">Stephen Cahill</option>
                    <option value="Steven Hylland">Steven Hylland</option>
                    <option value="Steven Sundheim">Steven Sundheim</option>
                    <option value="Stu Shipper">Stu Shipper</option>
                    <option value="Test Member">Test Member</option>
                    <option value="Umair Ali">Umair Ali</option>
                    <option value="Vandana Gaikwad">Vandana Gaikwad</option>
                    <option value="Web Strives">Web Strives</option>
                    <option value="Wogal Apklamp">Wogal Apklamp</option>
                    <option value="komal Rajpure">komal Rajpure</option>
                    <option value="mike john">mike john</option>
                    <option value="shayan nasir">shayan nasir</option>
                    <option value="shayan nasir">shayan nasir</option>
                    <option value="undefined undefined">undefined undefined</option>
                </select>
            </div>
            {{-- Amount buttons --}}
            <div class="px-4">
                @error('amount')
                    <span class="text-red-600 text-sm">*{{ $message }}</span>
                @enderror
                <div class="grid grid-cols-4 gap-2 mb-4">
                    @foreach ([10, 25, 50, 100, 250, 500, 1000] as $amt)
                        <button type="button" wire:click="$set('amount', {{ $amt }})"
                            class="px-4 py-2 border rounded text-sm font-medium cursor-pointer
                               {{ $amount == $amt ? 'bg-primary text-white' : 'border-primary text-primary hover:bg-primary hover:text-white' }}">
                            ${{ $amt }}
                        </button>
                    @endforeach
                    {{-- Other amount --}}
                    <input wire:model="amount" type="number" placeholder="Other"
                        class="border border-primary text-primary rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/40" />
                </div>
            </div>
            <div class="px-4">
                {{-- Optional message --}}
                @if ($showMessage)
                    <input wire:model.defer="message" rows="3"
                        class="w-full border border-primary rounded p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-primary/40"
                        placeholder="Your message…" />
                @else
                    <button wire:click="toggleMessage" type="button"
                        class="text-sm font-medium text-primary mb-4 hover:underline">
                        + Add a message
                    </button>
                @endif
            </div>
            <div class="border-b border-gray-200"></div>
            <div class="flex justify-between items-center px-4 py-4">
                {{-- Anonymous checkbox --}}
                <div class="flex items-center">
                    <input wire:model="anonymous" id="anon" type="checkbox"
                        class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary/40" />
                    <label for="anon" class="ml-2 text-sm text-gray-700">Stay Anonymous</label>
                </div>
                {{-- Continue button --}}
                <button wire:click="nextStep"
                    class="w-40 bg-primary text-white font-semibold px-4 py-2 rounded-lg hover:bg-primary-dark focus:ring-2 focus:ring-primary/40">
                    Continue
                </button>
            </div>

        </div>
    @endif


    {{-- Step 2 --}}
    @if ($step === 2)
        <div wire:key="step-2">
            {{-- Header with back arrow --}}
            <div class="flex items-center p-4">
                <button wire:click="previousStep" class="p-1">
                    <!-- simple left arrow -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h2 class="text-xl font-semibold ml-2">Final Details</h2>
            </div>
            <div class="border-b border-gray-200"></div>
            {{-- Donation summary --}}
            <div class="flex justify-between p-4 font-semibold">
                <span>Donation</span>
                <span class="font-medium">${{ number_format($amount, 2) }}</span>
            </div>
            {{-- Payment method --}}
            <div class="p-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        @error('paymentMethod')
                            <span class="text-red-600 text-sm">*{{ $message }}</span>
                        @enderror
                        <label class="block text-sm font-semibold mb-1">Credit card processing fees</label>
                        <select name="paymentMethod" wire:model.live="paymentMethod"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/40">
                            <option value="">Select Payment Method</option>
                            <option value="0.039">AMEX Card</option>
                            <option value="0.055">Visa &amp; Others</option>
                            <option value="0.09">US Bank Account</option>
                            <option value="0.062">Cash App Pay</option>

                        </select>
                        <p class="text-xs text-gray-400 mt-5">You pay the CC fee so 100% of your donation goes to your
                            chosen
                            missionary or cause.</p>
                    </div>
                    <div class="text-xs text-gray-500 mt-1 flex justify-end items-center">
                        <p class="font-semibold">${{ $paymentMethod }}</p>
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-200"></div>
            {{-- Tip section --}}
            <div class="bg-[#fefedf] p-4 rounded my-4">
                <div class="grid grid-cols-6 gap-4">
                    <label class="block text-sm font-medium mb-1 col-span-4">
                        Add a tip to support {{ $campaign }}
                    </label>
                    <select wire:model.live="tip"
                        class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/40 col-span-2">
                        <option value="0.00">0%</option>
                        <option value="0.12">12%</option>
                        <option value="0.15">15%</option>
                        <option value="0.18">18%</option>
                        <option value="0.20">20%</option>
                    </select>
                    <p class="text-xs text-gray-500 mt-2 col-span-4">
                        <span class="text-primary">Why Tip?</span> {{ $campaign }} does not charge any platform
                        fees
                        and relies on your generosity to
                        support
                        this free service.
                    </p>
                </div>
            </div>
            {{-- Contact checkbox --}}
            <div class="flex items-center p-4">
                <input wire:model="allowContact" id="contact" type="checkbox"
                    class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary/40" />
                <label for="contact" class="ml-2 text-sm text-gray-700">
                    Allow {{ $campaign }} Inc to contact me
                </label>
            </div>
            <div class="border-b border-gray-200"></div>
            {{-- Finish button --}}
            <div class="flex justify-end p-4">
                <button wire:click="submit"
                    class="w-52 bg-primary text-white font-semibold px-4 py-2 my-4 rounded-lg hover:bg-primary-dark focus:ring-2 focus:ring-primary/40">
                    Finish ( ${{ number_format($total, 2) }} )
                </button>
            </div>

        </div>
    @endif

</div>
